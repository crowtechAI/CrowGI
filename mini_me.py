import ast
import os
import subprocess
import openai

# Set up the OpenAI API key and model ID
openai_api_key = os.environ['OPENAI_API_KEY']
model_id = 'gpt-3.5-turbo'

# Set the directory path where the code files are located
code_directory_path = '/Users/paul/AI/AGI/CrowGI'

# Define a function to traverse the AST and replace the relevant code
def replace_code(placeholder, code_snippets, file_path):
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

    # Read the code from the file and parse it with ast
    with open(file_path) as f:
        code = f.read()
    ast_tree = ast.parse(code)

    # Transform the AST
    transformed_ast = CodeReplacer(placeholder, code_snippets).visit(ast_tree)

    # Reconstruct the code from the transformed AST and write it back to the file
    new_code = ast.unparse(transformed_ast)
    with open(file_path, 'w') as f:
        f.write(new_code)


# Define the placeholder comment
placeholder = "# <IMPROVEMENTS>"

# Define the new Git repository path
new_repo_path = '/Users/paul/AI/AGI/CrowGI'

# Create the new Git repository directory if it doesn't exist
if not os.path.exists(new_repo_path):
    os.makedirs(new_repo_path)

# Initialize a new Git repository or check if it's already a Git repository
try:
    subprocess.run(['git', 'init'], cwd=new_repo_path, check=True)
except subprocess.CalledProcessError as e:
    print(f'Error initializing Git repository: {e}')
    exit(1)

# Traverse the directory and read in the code files
for root, dirs, files in os.walk(code_directory_path):
    for filename in files:
        if filename.endswith('.py'):
            file_path = os.path.join(root, filename)

            # Use GPT-3.5-Turbo to analyze the code and generate suggestions for improvement
            system_message = "You Analyze code for bugs issues and improvments and make actionable suggestions to improve it. respond with just a list of improvements. if any of the suggestions require a new file add this tag '<SAVE:filename>' with an approrpiate filename relevent to the suggestion."
            with open(file_path) as f:
                prompt = f.read()
            completion = openai.Completion.create(
                engine=model_id,
                prompt=prompt + "\n\n" + system_message,
                max_tokens=1024,
                n=1,
                stop=None,
                temperature=0.7
            )
            suggestions = completion['choices'][0]['text'].strip()

            # Print the suggestions