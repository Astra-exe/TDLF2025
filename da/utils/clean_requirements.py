import os
#Clean my requiremetns.txt file to avoid anything related with Jupyter Notebook and ipykernel
excluded_packages = {
    "ipykernel", "ipython", "jupyter", "debugpy", "pyzmq", 
    "matplotlib-inline", "prompt_toolkit", "traitlets",
    "pywin32", "tornado", "colorama", "asttokens", "comm",
    "wcwidth", "stack-data", "nest-asyncio", "parso", "psutil",
    "pure_eval", "jedi", "jupyter_client", "jupyter_core", "ipython_pygments_lexers"
}

requirements_path = os.path.abspath(os.path.join(os.path.dirname(__file__), "../requirements_local.txt"))
output_path = os.path.abspath(os.path.join(os.path.dirname(__file__), "../requirements.txt"))

with open(requirements_path, "r", encoding="utf-16") as f:
    lines = f.readlines()

clean_lines = [
    line for line in lines 
    if line.split("==")[0].lower() not in excluded_packages  # Compara solo el nombre
]

with open(output_path, "w") as f:
    f.writelines(clean_lines)