from flask import Flask, json
from flask import request

from app import convert

app = Flask(__name__)

@app.route('/summarizer/', methods=['POST'])
def summarizer_data():
    text = request.form["text"]
    data = convert(text=text)
    return {'result': data.strip()}


if __name__ == "__main__":
    app.run(debug=True)