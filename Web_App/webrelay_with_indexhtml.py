@app.route('/WebRelay/', methods=['GET'])
def index():
    return render_template('Index.html');