import MySQLdb
import pymysql
 

def connection():
    conn =pymysql.connect(host="localhost",
                           user = "root",
                           passwd = "TOOR",
                           db = "prisoner")
    c = conn.cursor()

    return c, conn
