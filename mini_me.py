import ast
import logging
import os
import subprocess
from pathlib import Path
import openai

openai.api_key = 'shdkdaa'
model_id = 'gpt-3.5-turbo'

python_root = Path('/Users/paul/AI/AGI')

def replace_suggestion(node, suggestions, original_code):
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
                    replace_suggestion(item, suggestions, original_code)
            elif isinstance(value, ast.AST):
                replace_suggestion(value, suggestions, original_code)
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

def execute_code(file_path):
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

def improve_python_files(root_path: Path, engine: str, model_id: str) -> None:
    """
    Walks through all Python files within the directory and any subdirectories, analyzes the code for each file
    and replaces any suggestions