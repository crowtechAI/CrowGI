import ast
import os
import subprocess
import openai
import shutil
import re

def has_unterminated_string_literal(code):
    matches = re.findall('([\'\\"])(?:(?=(\\\\?))\\2.)*?\\1', code)
    return len(matches) != len(re.findall('\'\'\'|\\"\\"\\"', code))
openai_api_key = os.environ['OPENAI_API_KEY']
model_id = 'gpt-3.5-turbo'
dir_path = '/Users/paul/AI/AGI/CrowGI'

class CodeReplacer(ast.NodeTransformer):

    def __init__(self, placeholder, code_snippets):
        self.placeholder = placeholder
        self.code_snippets = code_snippets

    def visit_Expr(self, node):
        new_node = self.generic_visit(node)
        if isinstance(node.value, ast.Str) and node.value.s == self.placeholder:
            new_node.value = ast.parse(self.code_snippets).body[0].value
        elif isinstance(node.value, ast.Str) and node.value.s == self.placeholder.replace('<', '</'):
            new_node = None
        return new_node
placeholder = '# <IMPROVEMENTS>'
for (root, dirs, files) in os.walk(dir_path):
    for filename in files:
        if filename.endswith('.py'):
            with open(os.path.join(root, filename)) as f:
                original_code = f.read()
            if has_unterminated_string_literal(original_code):
                print(f'Skipping {filename} due to unterminated string literal')
                continue
                print(f'Generating suggestions for {filename}')
                system_message = "You Analyze code for bugs issues and improvements and make actionable suggestions to improve it. respond with just a list of improvements. if any of the suggestions require a new file add this tag '<SAVE:filename>' with an appropriate filename relevant to the suggestion."
                prompt = original_code
                completion = openai.ChatCompletion.create(model=model_id, messages=[{'role': 'system', 'content': system_message}, {'role': 'user', 'content': prompt}])
                suggestions = completion.choices[0].message.content.strip()
                print(f'Generating code snippets for {filename}')
                system_message = f'generate code snippets that implement the improvements listed here: {suggestions} and indicate where the changes should be made in the original code.'
                prompt = f'{suggestions}'
                completion = openai.ChatCompletion.create(model=model_id, messages=[{'role': 'system', 'content': system_message}, {'role': 'user', 'content': prompt}])
                code_snippets = completion.choices[0].message.content.strip()
            print(f'Replacing original code with generated code snippets for {filename}')
            replacer = CodeReplacer(placeholder, code_snippets)
            updated_ast = replacer.visit(ast.parse(original_code))
            updated_code = ast.unparse(updated_ast)
            print(f'Saving updated code to the original file for {filename}')
            with open(os.path.join(root, filename), 'w') as f:
                f.write(updated_code)
            print(f'Committing and pushing changes to the Git repository for {filename}')
            add_output = subprocess.run(['git', 'add', os.path.join(root, filename)], cwd=dir_path, capture_output=True, text=True)
            if add_output.returncode != 0:
                print(f'Error adding {filename} to Git index')
            else:
                status_output = subprocess.run(['git', 'status', '--porcelain'], cwd=dir_path, capture_output=True, text=True)
                if status_output.stdout.strip():
                    commit_message = f'Updated {filename} with {suggestions}'
                    subprocess.run(['git', 'commit', '-m', commit_message], cwd=dir_path)
                    subprocess.run(['git', 'push'], cwd=dir_path)
                else:
                    print(f'No changes to commit for {filename}')