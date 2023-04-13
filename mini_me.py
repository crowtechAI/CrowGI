import ast
import os
import subprocess
import openai
import shutil
import nltk
import argparse

nltk.download('punkt')


# Set up the OpenAI API key and model ID
openai.api_key = os.environ['OPENAI_API_KEY']
model_id = 'gpt-3.5-turbo'

# Define a function to get suggestions for a code chunk
def get_code_suggestions(chunk):
    system_message = "You analyze code for bugs issues and improvments and make actionable suggestions to improve it. Respond with just a list of improvements. If any of the suggestions require a new file add this tag '<SAVE:filename>' with an appropriate filename relevant to the suggestion."
    prompt = f"{chunk}\n{placeholder}\n{system_message}"
    response = openai.Completion.create(
        engine=model_id,
        prompt=prompt,
        max_tokens=200,
        n=1,
        stop=None,
        temperature=0.5,
    )

    # Process the response and extract the suggestions
    suggestions = response.choices[0].text
    suggestions = suggestions.replace(placeholder, '')
    suggestions = suggestions.strip().split('\n')
    suggestions = [s.strip() for s in suggestions if s.strip() != '']
    return suggestions

# Set up command line argument parser
parser = argparse.ArgumentParser(description='Generates suggestions for improving code and creates a new Git repository with the improved code.')
parser.add_argument('dir_path', type=str, help='Path to directory containing the code files to be improved.')
parser.add_argument('new_repo_path', type=str, help='Path for the new Git repository.')
args = parser.parse_args()

# Define the placeholder comment
placeholder = "# <IMPROVEMENTS>"

# Create the new Git repository directory if it doesn't exist
if not os.path.exists(args.new_repo_path):
    os.makedirs(args.new_repo_path)

# Initialize a new Git repository or check if it's already a Git repository
try:
    subprocess.run(['git', 'init'], cwd=args.new_repo_path, check=True)
except subprocess.CalledProcessError as e:
    print(f'Error initializing Git repository: {e}')
    exit(1)

# Traverse the directory and read in the code files
for root, dirs, files in os.walk(args.dir_path):
    for filename in files:
        if filename.endswith('.py'):
            with open(os.path.join(root, filename)) as f:
                original_code = f.read()

            # Use GPT-3.5-Turbo to analyze the code and generate suggestions for improvement
            suggestions = get_code_suggestions(original_code)

            # Create a new file with the suggested filename and write the suggested code to it
            for suggestion in suggestions:
                if suggestion.startswith('<SAVE:'):
                    filename = suggestion.split(':', 1)[1].strip('>')
                    new_filepath = os.path.join(args.new_repo_path, filename)
                    with open(new_filepath, 'w') as f:
                        f.write(suggestion)
                        print(f'Created new file at {new_filepath}')

            # Update the original code with the suggestions
            for suggestion in suggestions:
                if not suggestion.startswith('<SAVE:'):
                    replacer = CodeReplacer(placeholder, suggestion)
                    new_code = ast.fix_missing_locations(replacer.visit(ast.parse(original_code)))
                    original_code = ast.unparse(new_code)

            # Write the improved code to the new Git repository
            new_filepath = os.path.join(args.new_repo_path, filename)
            with open(new_filepath, 'w') as f:
                f.write(original_code)
                print(f'Copied {filename} to {new_filepath}')

            # Add the file to the Git repository
            try:
                subprocess.run(['git', 'add', new_filepath], cwd=args.new_repo_path, check=True)
            except subprocess.CalledProcessError as e:
                print(f'Error adding file {new_filepath} to Git repository: {e}')