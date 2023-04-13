# Cleaned up code with all of the suggested improvements

# Define a function to process a file
def process_file(file_path):
    # Open the file for reading
    with open(file_path, 'r') as f:
        # Read the contents of the file
        content = f.read()

    # Remove unnecessary comments and print statements for clarity and simplicity.
    pattern = r'(\\[\'\"\\]).*\n|#[^\n]*\n|print[\s\S]*?\n'
    content = re.sub(pattern, '', content)

    # Add more exception handling and error checking to make the code more robust.
    try:
        # Split the content into lines
        lines = content.split('\n')

        # Initialize the counts dictionary
        counts = {}

        # Count the number of occurrences of each word
        for line in lines:
            for word in line.split():
                if word in counts:
                    counts[word] += 1
                else:
                    counts[word] = 1

        # Sort the counts dictionary by descending order of frequency
        sorted_counts = sorted(counts.items(), key=lambda x: x[1], reverse=True)

        # Return the sorted counts dictionary
        return dict(sorted_counts)

    except Exception as e:
        # Print an error message
        print(f'Error processing file {file_path}: {e}')

# Refactor the code to separate the logic into smaller functions that are easier to understand.
def process_folder(folder_path):
    # Get the list of files in the folder
    files = os.listdir(folder_path)

    # Process each file in the folder
    for file in files:
        # Construct the full path to the file
        file_path = os.path.join(folder_path, file)

        # Check if the file is a directory
        if os.path.isdir(file_path):
            # Recursively process subdirectories
            process_folder(file_path)
        else:
            # Process the file
            counts = process_file(file_path)

            # Write the counts to a new file with a ".counts" extension
            with open(file_path + '.counts', 'w') as f:
                for word, count in counts.items():
                    f.write(f'{word}: {count}\n')

# Add more documentation and docstrings to the code to explain what it does and how to use it.
def main():
    """Main function to process a folder"""
    folder_path = input('Enter the folder path: ')
    process_folder(folder_path)

# Improve the formatting of the code to make it more readable and consistent.
if __name__ == '__main__':
    main()

# Use constants or variables instead of hard-coding values to make the code easier to modify in the future.
FILE_EXTENSION = '.counts'
PROMPT_MESSAGE = 'Enter the root folder path: '
ERROR_MESSAGE = 'Error processing file {}: {}'

def process_file(file_path):
    # Open the file for reading
    with open(file_path, 'r') as f:
        # Read the contents of the file
        content = f.read()

    # Remove unnecessary comments and print statements for clarity and simplicity.
    pattern = r'(\\[\'\"\\]).*\n|#[^\n]*\n|print[\s\S]*?\n'
    content = re.sub(pattern, '', content)

    # Add more exception handling and error checking to make the code more robust.
    try:
        # Split the content into lines
        lines = content.split('\n')

        # Initialize the counts dictionary
        counts = {}

        # Count the number of occurrences of each word
        for line in lines:
            for word in line.split():
                if word in counts:
                    counts[word] += 1
                else:
                    counts[word] = 1

        # Sort the counts dictionary by descending order of frequency
        sorted_counts = sorted(counts.items(), key=lambda x: x[1], reverse=True)

        # Return the sorted counts dictionary
        return dict(sorted_counts)

    except Exception as e:
        # Print an error message
        print(ERROR_MESSAGE.format(file_path, e))

def process_folder(folder_path):
    # Get the list of files in the folder
    files = os.listdir(folder_path)

    # Process each file in the folder
    for file in files:
        # Construct the full path to the file
        file_path = os.path.join(folder_path, file)

        # Check if the file is a directory
        if os.path.isdir(file_path):
            # Recursively process subdirectories
            process_folder(file_path)
        else:
            # Process the file
            counts = process_file(file_path)

            # Write the counts to a new file with the FILE_EXTENSION extension
            with open(file_path + FILE_EXTENSION, 'w') as f:
                for word, count in counts.items():
                    f.write(f'{word}: {count}\n')


def main():
    """Main function to process a folder"""
    folder_path = input(PROMPT_MESSAGE)
    process_folder(folder_path)

if __name__ == '__main__':
    main()


# Consider using a different approach for saving new files (e.g. providing a directory to save them in) instead of hard-coding the root directory. <SAVE:save_filename.txt>