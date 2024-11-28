from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/run_python', methods=['GET'])
def run_python():
    # Pythonで実行したいコードをここに書く
    # 例: 数学的な計算、ファイル操作、データ処理など
    result = "Hello from Python! Here is your result."
    
    # 結果をJSON形式で返す
    return jsonify({'result': result})

if __name__ == '__main__':
    app.run(debug=True)
