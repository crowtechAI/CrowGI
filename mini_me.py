import ast
import os
import subprocess
import openai

# Set up the OpenAI API key and model ID
openai_api_key = os.environ['OPENAI_API_KEY']
model_id = 'gpt-3.5-turbo'

# Set the directory path where the code files are located
dir_path = '/Users/paul/AI/AGI/CrowGI'

# Define a class to traverse the AST and replace the relevant code
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


# Define the placeholder comment
placeholder = "# <IMPROVEMENTS>"

# Define the new Git repository path
new_repo_path = '/Users/paul/AI/AGI/CrowGI-updated'

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
            with open(os.path.join(root, filename)) as f:
                original_code = f.read()

            # Use GPT-3.5-Turbo to analyze the code and generate suggestions for improvement
            system_message = "Analyze the code and respond with just a list of improvements. If any of