import os
import mysql.connector
import time
time.sleep(1)
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="project_leak"
)
mycursor = mydb.cursor()
def comit(sql, val=None, comit=True, fetch=None):
    if val:
        mycursor.execute(sql, val)
    else:
        mycursor.execute(sql)
    if comit:
        mydb.commit()
    if fetch:
        return mycursor.fetchall()
def SQL(type, preset=None, dataToComit=None, table=None, column=None, join='', where=''):
    if join:
        join = f"JOIN {join}"
    if where:
        where = f"WHERE {where}"
    if type in ("insert"):
        if not dataToComit:
            return False
        emailBDD = (SQL(type="select", preset="multiple", table="email", column="email,id_email"))
        emailActif=[]
        for DICT in emailBDD:
            emailActif.append(DICT['email'])
        passBDD = (SQL(type="select", preset="multiple", table="password", column="password,using_site,id_email"))
        passwordActif = []
        print(passBDD)
        for LIST in passBDD:
            print(LIST['password'])
            print(LIST['id_email'])
            passwordActif.append([LIST['password'], LIST['id_email']])
        loop = 0
        toComit = []
        try:
            dataToComit[0]['email']
            toComit.append("email")
        except:
            pass
        try:
            dataToComit[0]['password']
            toComit.append('password')
        except:
            pass
        for line in dataToComit:
            print(line)
            ID = -1
            if "email" in toComit:
                insertEmail = f"INSERT INTO email (email) VALUES ('{line['email']}')"
                if line["email"] not in emailActif:
                    comit(insertEmail, line["email"])
                    ID = mycursor.lastrowid
                else:
                    ID = SQL(type="select", preset="unique", table='email', column='id_email', where=f"email = '{line['email']}'")[0]['id_email']
            if "password" in toComit:
                if [line["password"], ID] not in passwordActif:
                    line['password'] = line['password'].replace('"', '')
                    if "using_site" in toComit:
                        insertPass = f"INSERT INTO password (password, id_email, using_site) VALUES ('{line['password']}', {ID}, '{line['using_site']}'')"
                    else:
                        insertPass = f"INSERT INTO password (password, id_email) VALUES ('{line['password']}', {ID})"
                    print(f"comit {insertPass} for email {line['email']}")
                    print(ID)
                    comit(insertPass)
                

                
        # ! mydb.commit()
    if type in ("select"):
        if preset in (1, "1", "unique") and table and column:
            sql = f"SELECT {column} from {table} {join} {where}"
            ret = []
            for email in comit(sql, comit=False, fetch=True):
                ret.append({column: email[0]})
            return ret
        if preset in (2, "2", "multiple"):
            sql = f"SELECT {column} from {table} {join} {where}"
            ret = []
            for sort in comit(sql, comit=False, fetch=True):
                DICT = {}
                for i in range(len(column.split(","))):
                    DICT[column.split(",")[i]] = sort[i]
                ret.append(DICT)
            return ret
with open('testfile.txt', 'r') as file:
    read = (file.read())
    contentLine = read.split('*Âµ')
    NumSep = len(contentLine)-2
    Sep = read.split('*Âµ')[0]
os.remove('testfile.txt')
    
os.chdir("fileToComit")
with open(os.listdir()[0], 'r') as file:
    DICT = []
    for line in file.read().split('\n'):
        line = line.split(Sep)
        ret = {}
        for sep in range(NumSep):
            sep += 1
            ret[contentLine[sep]] = line[sep-1]
        DICT.append(ret)
os.remove(os.listdir()[0])

SQL("insert", dataToComit=DICT)

# test = {"test" : 4}
# print(test["test"])


# ret = (SQL("select", 1))
# for result in ret:
#     print(result)
# SQL([["tes", "pass"], ["other", "password"]], "insert", 1)

# sql = "INSERT INTO user (name_user, password_user, role_user) VALUES (%s, %s, %s)"
# val = ("John", "password", "a")
# sql = "SELECT email from email"
# for email in comit(sql, comit=False, fetch=True):
#     print(email[0])

# for i in os.listdir():
#     with open(i, "r") as file:
#         for line in file.read().splitlines():
#             data = line.split(":")
