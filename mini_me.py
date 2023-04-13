import ast
import os
import subprocess
import openai
import shutil
import nltk
import configparser 
nltk.download('punkt')


def read_config():
    """
    Reads the parameters from the config.ini file and returns them as a dictionary
    """
    config = configparser.ConfigParser()
    config.read('config.ini')
    
    params = {
        'api_key': config['DEFAULT']['API_KEY'],
        'model_id': config['DEFAULT']['MODEL_ID'],
        'dir_path': config['DEFAULT']['DIR_PATH'],
        'new_repo_path': config['DEFAULT']['NEW_REPO_PATH'],
        'system_message_length': int(config['DEFAULT']['SYSTEM_MESSAGE_LENGTH']),
        'user_prompt_length': int(config['DEFAULT']['USER_PROMPT_LENGTH']),
        'average_chunk_length': int(config['DEFAULT']['AVERAGE_CHUNK_LENGTH'])
    }
    
    return params


def initialize_repo(dir_path):
    """
    Initialize a new Git repository or check if it's already a Git repository
    """
    try:
        subprocess.run(['git', 'init'], cwd=dir_path, check=True)
    except subprocess.CalledProcessError as e:
        print(f'Error initializing Git repository: {e}')
        exit(1)


def traverse_files(dir_path):
    """
    Traverse the directory and read in the code files
    """
    code_files = []
    for root, dirs, files in os.walk(dir_path):
        for filename in files:
            if filename.endswith('.py'):
                code_files.append(os.path.join(root, filename))
    return code_files

                
class CodeReplacer(ast.NodeTransformer):

    def __init__(self, placeholder, code_snippets):
        self.placeholder = placeholder
        self.code_snippets = code_snippets

    def visit_Expr(self, node):
        new_node = self.generic_visit(node)
        if isinstance(node.value, ast.Str) and node.value.s == self.placeholder:
            # Replace the placeholder comment with the code snippets
            new_node.value = ast.parse(self.code_snippets).body[0].value
        elif isinstance(node.value, ast.Str) and node.value.s == self.placeholder.replace('<', '</'):
            # Remove the placeholder comment
            new_node = None
        return new_node


params = read_config()

# Set up the OpenAI API key and model ID
openai.api_key = params['api_key']
model_id = params['model_id']

# Set the directory path where the code files are located
dir_path = params['dir_path']

# Define the placeholder comment
placeholder = "# <IMPROVEMENTS>"

# Define the new Git repository path
new_repo_path = params['new_repo_path']

# Create the new Git repository directory if it doesn't exist
if not os.path.exists(new_repo_path):
    os.makedirs(new_repo_path)

initialize_repo(new_repo_path)

# Traverse the directory and read in the code files
code_files = traverse_files(dir_path)

# Iterate over the code files and replace the code snippets
for file_path in code_files:
    with open(file_path) as f:
        original_code = f.read()

    # Get the maximum number of tokens that can be processed by the API
    model_info = openai.Model.retrieve(model_id)
    max_tokens = model_info["parameters"]["max_tokens"]

    # Define the length of the system message and user prompt
    system_message_length = params['system_message_length']
    user_prompt_length = params['user_prompt_length']

    # Define the average length of the input code chunks
    average_chunk_length = params['average_chunk_length']

    # Calculate the maximum number of chunks that can be processed in a single call to the API
    max_chunks = int((max_tokens - system_message_length - user_prompt_length) / average_chunk_length)

    code_snippets = ''

    # Break the code down into multiple chunks if it exceeds the maximum number of tokens
    chunks = nltk.sent_tokenize(original_code)
    total_chunks = len(chunks)
    chunk_counter = 0

    while chunks:
        # Get the next chunk
        chunk = chunks.pop(0)

        # Add the chunk to the code snippets
        code_snippets += chunk

        # If the code snippets exceed the maximum number of tokens, replace the snippets and reset the counters
        if len(code_snippets.split()) >= max_chunks or (not chunks and code_snippets != ''):
            # Prompt the user for a commit message
            commit_message = input(f"Please enter a commit message for file {file_path} chunk {chunk_counter+1}/{total_chunks}: ")

            # Instantiate the CodeReplacer class and replace the code snippets
            cr = CodeReplacer(placeholder, code_snippets)
            new_code = cr.visit(ast.parse(original_code))

            # Write the new code to the file
            with open(os.path.join(new_repo_path, os.path.basename(file_path)), 'w') as f:
                f.write(astor.to_source(new_code))

            # Add the file to the Git repository and commit the changes
            try:
                subprocess.run(['git', 'add', os.path.basename(file_path)], cwd=new_repo_path, check=True)
                subprocess.run(['git', 'commit', '-m', commit_message], cwd=new_repo_path, check=True)
            except subprocess.CalledProcessError as e:
                print(f'Error adding file {file_path} to Git repository: {e}')
                exit(1)

            code_snippets = ''
            chunk_counter += 1

            # Print the progress
            progress = int((chunk_counter/total_chunks) * 100)
            print(f'{file_path}: Commit {chunk_counter}/{total_chunks} ({progress}%) completed.')