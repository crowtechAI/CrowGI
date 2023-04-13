import ast
import os
import subprocess
import openai
import shutil

# Set up the OpenAI API key and model ID
openai.api_key = os.environ.get('OPENAI_API_KEY')
model_id = 'gpt-3.5-turbo'

# Set the directory path where the code files are located
dir_path = '/Users/paul/AI/AGI/CrowGI'

# Define a class to traverse the AST and replace the relevant code
class ASTModifier(ast.NodeTransformer):

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
for root, dirs, files in os.walk(dir_path):
    for filename in files:
        if filename.endswith('.py'):
            with open(os.path.join(root, filename)) as file:
                original_code = file.read()

            # Use OpenAI GPT-3 to analyze the code and generate suggestions for improvement
            try:
                response = openai.Completion.create(
                    engine=model_id,
                    prompt=original_code + '\n\n---\n\n' + ASTModifier.__doc__,
                    max_tokens=1024,
                    n=1,
                    stop=None,
                    temperature=0.5,
                )
                suggestions = response.choices[0].text.strip().split('\n')
            except openai.error.OpenAIError as e:
                print(f'Error generating suggestions from OpenAI: {e}')
                continue

            # Process the suggestions to replace or add code snippets
            code_modifier = ASTModifier(placeholder, '')
            for suggestion in suggestions:
                if '<SAVE:' in suggestion:
                    # Save the suggested code snippet to a new file
                    save_filename = suggestion.split('<SAVE:')[1].rstrip('>')
                    save_filepath = os.path.join(new_repo_path, save_filename)
                    with open(save_filepath, 'w') as file:
                        file.write(code_modifier.code_snippets)
                else:
                    # Add the suggested code snippet to the AST modifier
                    code_modifier.code_snippets += '\n' + suggestion

            # Modify the code file using the AST modifier
            modified_code = ast.parse(original_code).body
            modified_code = code_modifier.visit(modified_code)
            modified_code = ast.fix_missing_locations(modified_code)
            modified_code = ast.Module(modified_code)
            modified_code = ast.unparse(modified_code)

            # Write the modified code to the new repository
            new_filepath = os.path.join(new_repo_path, os.path.relpath(os.path.join(root, filename), dir_path))
            with open(new_filepath, 'w') as file:
                file.write(modified_code)

            # Copy any non-code files to the new repository
            if not filename.endswith(('.py', '.pyc')):
                shutil.copyfile(os.path.join(root, filename), os.path.join(new_repo_path, os.path.relpath(os.path.join(root, filename), dir_path)))