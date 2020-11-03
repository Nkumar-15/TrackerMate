from flask import Flask, render_template,request,redirect,url_for
import create_data, time
from flask_mysqldb import MySQL
from sim import connection
from face_recognize import face
import datetime
from predict import predict_redirect
from speech_rec import speech_pred
import pymysql

app = Flask(__name__)

user=0
a1=[]
# total_place=["A_Barrack","GYM","Medical","Canteen"]
place=["A-Block","B-Block","Canteen","Medical","GYM"]


@app.route('/')
def index(name=None):
    return render_template('index.html',name=name)

@app.route('/prisoner_reco')
def parse2(name=None):
    return render_template('prisoner_rec.html',name=name)


@app.route('/add_prisoner',methods=["GET","POST"])
def parse3():
    import create_data
    if request.method == "POST":
        user= request.form["u"]
        print(user)
        create_data.pass_variable(user)
    return render_template('add_prisoner.html')


@app.route('/exec')
def parse(name=None):
    while(True):
        num = face()
        if(num == 0):
            continue
        else:
            break
    print("done")
    a1.append(num)
    print(num)
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='TOOR',
                             db='prisoner',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

    try:
        with connection.cursor() as cursor:
            sql = "select blind from tracked where id=%s"
            cursor.execute(sql,(num,))
            blind = cursor.fetchall()
    finally:
        connection.close()        

    print(blind[0]["blind"])

    if(blind [0]["blind"]== "s"):
        return render_template('speech.html',data=place)
    else:
        return render_template('number.html',data=place)
    # #schedular
    #print(A_Block,B_Block,C_Block)
    #destroy1(a1)
    return render_template('emotion.html',data=place)
    # return render_template('number.html',data=place)

# @app.route('/destroy1')
# def destroy1(a1):
#     return render_template('number.html',data=a1)

@app.route('/access_emotion')    
def class1():
    numer_num=predict_redirect()
    if(numer_num==1):
        destination=place[0]
    if(numer_num==2):
        destination=place[1]
    if(numer_num==3):
        destination=place[2]
    if(numer_num==4):
        destination=place[3]
    if(numer_num==5):
        destination=place[4]        
    
    database_connection(a1[0],destination)

    return render_template('emotion.html',data=numer_num)  
@app.route('/speech_access_emotion')    
def class2():
    numer_num=speech_pred()
    if(numer_num==1):
        destination=place[0]
    if(numer_num==2):
        destination=place[1]
    if(numer_num==3):
        destination=place[2]
    if(numer_num==4):
        destination=place[3]
    if(numer_num==5):
        destination=place[4]        
    
    database_connection(a1[0],destination)

    return render_template('emotion.html',data=numer_num)

@app.route('/acess')
def class3():
    return render_template('acess.html') 


def database_connection(id_num,destination):
    # source="A-Block"
    destination=destination
    prisoner_id=id_num
    out_time = datetime.datetime.now()
    in_time = out_time + datetime.timedelta(minutes = 5)
    print(in_time)
    connection = pymysql.connect(host='localhost',
                             user='root',
                             password='TOOR',
                             db='prisoner',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

    
    try:
        with connection.cursor() as cursor:
            sql = "UPDATE tracked SET destination=%s,start_at=%s,end_at=%s where id=%s"
            cursor.execute(sql,(destination,out_time.strftime('%H:%M:%S'),in_time.strftime('%H:%M:%S'),prisoner_id))
            connection.commit()
    finally:
        connection.close()
    # print(done)    
    return 0


@app.route('/session')
def destroy(name=None):
    # a1=[]
    # destroy1(a1)
    # global a1.clear
    user=0
    return render_template('index.html',name=name)

if __name__ == '__main__':
    app.run(debug=True)