from utils.features import (
    playerp
)

from flask import Flask, request, jsonify
from flask_cors import CORS
import requests
import numpy as np

#create the app
app = Flask(__name__)
CORS(app)

#endpoints
@app.route('/profile', methods=['GET'])
def make_profile():
    headers = {
        'X-API-KEY':'6a23ceffa8a69a8fed5fc4d15427580da14ab34f883336685ca5d7074604912f'
    }
    #Get the data
    try:
        response = requests.get('http://localhost:8080/v1/players/bc29233c-caa6-4c41-a6f1-d31b965eadde', headers=headers)
        print(response)
        if response.status_code == 200:
            data = response.json()
            return jsonify(data)
        else:
            return jsonify(data)
    
    except Exception as e:
        print(str(e))
        return jsonify({'error':str(e)}), 400
    




if __name__ == "__main__":
    app.run(port=3000, debug = True)