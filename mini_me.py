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
    Replaces a suggestion within the original code using its start and end indices.

    Args:
        node (ast.AST): A node object in the abstract syntax tree of the code
        suggestions (str): The suggestion recommended by OpenAI to replace a portion of the original code
        original_code (str): The code to be improved

    Returns:
        str: The improved code with the suggestion replaced
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

def analyze_code(file_path, engine, model_id):
    """
    Analyzes Python code using OpenAI's GPT-3 and returns any suggestions for improvement.

    Args:
        file_path (str): The path to a Python file
        engine (str): The OpenAI engine to be used for code analysis
        model_id (str): The ID for the GPT-3 model to be used for code analysis

    Returns:
        str: Any suggested improvements for the code
    """
    with open(file_path) as f:
        original_code = f.read()
    system_message = 'You analyze code and make actionable suggestions to improve it.'
    prompt = original_code
    try:
        completion = openai.Completion.create(engine=engine, prompt=[system_message, prompt], max_tokens=1024, n=1, stop=None, temperature=0.7)
    except openai.error.AuthenticationError:
        logging.error("OpenAI API key invalid.")
        raise
    except openai.error.APIError as e:
        logging.error("Error analyzing code: %s", e)
        raise
    suggestions = completion.choices[0].text.strip()
    return suggestions

def run_code(file_path):
    """
    Executes and returns the output of a Python file.

    Args:
        file_path (str): The path to a Python file

    Returns:
        str: The output of the executed Python file
    """
    result = subprocess.run([sys.executable, file_path], capture_output=True, text=True, check=True)
    output = result.stdout
    if result.stderr:
        output += result.stderr
    return output

def improve_code(root_path, engine, model_id):
    """
    Walks through all Python files within the directory and any subdirectories, analyzes the code for each file
    and replaces any suggestions made by OpenAI, executes the improved code and logs the output.

    Args:
        root_path (str): The root directory containing the Python files to be improved
        engine (str): The OpenAI engine to be used for code analysis
        model_id (str): The ID for the GPT-3 model to be used for code analysis
    """
    logging.basicConfig(level=logging.INFO, format='%(asctime)s:%(levelname)s:%(message)s')
    suggestions_log = set()
    for file_path in root_path.glob('**/*.py'):
        suggestions = analyze_code(file_path, engine, model_id)
        if suggestions not in suggestions_log:
            suggestions_log.add(suggestions)
            logging.info(f'Suggestions for {file_path.name}: {suggestions}')
            try:
                with open(file_path, 'r') as f:
                    original_code = f.read()
            except FileNotFoundError as e:
                logging.error(f'{file_path} not found: {e}')
                continue
            try:
                tree = ast.parse(original_code)
            except SyntaxError as e:
                logging.error(f'Error parsing "{file_path}": {e}')
                continue
            new_code = replace_code(tree, suggestions, original_code)
            try:
                with open(file_path, 'w') as f:
                    f.write(new_code)
            except PermissionError as e