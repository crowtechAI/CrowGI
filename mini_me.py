import ast
import logging
import os
import subprocess
from pathlib import Path
import openai
openai.api_key = 'shdkdaa'
model_id = 'gpt-3.5-turbo'
root_path = '/Users/paul/AI/AGI'

def replace_code(node, suggestions, original_code):
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
for (root, dirs, files) in os.walk(root_path):
    for filename in files:
        if filename.endswith('.py'):
            file_path = os.path.join(root, filename)
            with open(file_path) as f:
                original_code = f.read()
            system_message = 'You analyze code and make actionable suggestions to improve it.'
            prompt = original_code
            completion = openai.Completion.create(engine=model_id, prompt=[system_message, prompt], max_tokens=1024, n=1, stop=None, temperature=0.7)
            suggestions = completion.choices[0].text.strip()
            print(f'Suggestions for {filename}:')
            print(suggestions)
            tree = None
            try:
                tree = ast.parse(original_code)
            except SyntaxError as e:
                logging.error(f'Error parsing "{file_path}": {e}')
                continue
            new_code = replace_code(tree, suggestions, original_code)
            with open(file_path, 'w') as f:
                f.write(new_code)
            try:
                result = subprocess.run(['/usr/local/bin/python3', file_path], capture_output=True, text=True, check=True)
                output = result.stdout
                if result.stderr:
                    output += result.stderr
                print(f'Output for {filename}:')
                print('-' * 20)
                print(output)
                logging.basicConfig(filename=f'{os.path.splitext(file_path)[0]}.log', level=logging.INFO, format='%(asctime)s:%(levelname)s:%(message)s')
                logging.info(f'Output for {filename}:')
                logging.info('-' * 20)
                logging.info(output)
            except subprocess.CalledProcessError as e:
                logging.error(f'Error executing "{file_path}": {e}')