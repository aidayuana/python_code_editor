from flask import Flask, request, jsonify
from flask_cors import CORS
import subprocess
import os

app = Flask(__name__)
CORS(app)

@app.route('/run', methods=['POST'])
def run_code():
    data = request.get_json()
    code = data['code']

    jawaban = 'hello world'
    
    try:
        # Save the code to a temporary file
        with open('temp_code.py', 'w') as f:
            f.write(code)

        # Execute the code
        result = subprocess.run(['python', 'temp_code.py'], capture_output=True, text=True)
        output = result.stdout + result.stderr
        
        
        
    except Exception as e:
        output = str(e)

    return jsonify({'output': output})

if __name__ == '__main__':
    app.run(debug=True)
