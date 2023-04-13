import ast
import logging
import os
import subprocess
from pathlib import Path
import openai

openai.api_key = 'shdkdaa'
model_id = 'gpt-3.5-turbo'
root_path = Path('/Users/paul/AI/AGI')

def replace_code(node, suggestions, original_code):
    """
    Takes a node, suggestion and original code as arguments.
    Replaces the suggestion within the original code starting at the start index and ending at the end index.
    Returns the new code with the suggestion replaced.
    """
    if isinstance(node, ast.AST):
        for (field, value) in ast.iter_fields(node):
            if isinstance(value, list):
                for item in value:
                    replace_code(item, suggestions, original_code)
            elif isinstance(value, ast.AST):
                replace_code(value, suggestions, original_code)
            elif isinstance(value, str) and value == suggestions:
                start_index = node.col_offset
                end_index = start_index + len(suggestions)
                new_code = original_code[:start_index] + suggestions + original_code[end_index:]
                return new_code
    return original_code

def analyze_code(file_path):
    """
    Takes a path to a Python file as an argument.
    Reads the original code from the file and sends it to OpenAI for analysis.
    Returns any suggestions made by OpenAI for code improvement.
    """
    with open(file_path) as f:
        original_code = f.read()
    system_message = 'You analyze code and make actionable suggestions to improve it.'
    prompt = original_code
    completion = openai.Completion.create(engine=model_id, prompt=[system_message, prompt], max_tokens=1024, n=1, stop=None, temperature=0.7)
    suggestions = completion.choices[0].text.strip()
    return suggestions

def run_code(file_path):
    """
    Takes a path to a Python file as an argument.
    Executes the file and returns the output.
    """
    result = subprocess.run([sys.executable, file_path], capture_output=True, text=True, check=True)
    output = result.stdout
    if result.stderr:
        output += result.stderr
    return output

def improve_code(root_path):
    """
    Takes a path to a root directory as an argument.
    Walks through all python files within the directory and any subdirectories.
    Analyzes the code for each file and replaces any suggestions made by OpenAI.
    Executes the improved code and logs the output.
    """
    logging.basicConfig(level=logging.INFO, format='%(asctime)s:%(levelname)s:%(message)s')
    suggestions_log = set()
    for file_path in root_path.glob('**/*.py'):
        suggestions = analyze_code(file_path)
        if suggestions not in suggestions_log:
            suggestions_log.add(suggestions)
            logging.info(f'Suggestions for {file_path.name}: {suggestions}')
            tree = None
            try:
                tree = ast.parse(original_code)
            except SyntaxError as e:
                logging.error(f'Error parsing "{file_path}": {e}')
                continue
            new_code = replace_code(tree, suggestions, original_code)
            with open(file_path, 'w') as f:
                f.write(new_code)
            output = run_code(file_path)
            logging.info(f'Output for {file_path.name}:')
            logging.info('-' * 20)
            logging.info(output)

if __name__ == '__main__':
    improve_code(root_path)