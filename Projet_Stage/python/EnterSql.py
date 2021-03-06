import os
try:
    import mysql.connector
except:
    os.system('pwy -m pip install mysql-connector')
finally:
    import mysql.connector as SQLConnect

import time
time.sleep(1)
mydb = SQLConnect.connect(
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
        try:
            mycursor.execute(sql)
        except:
            print(sql)
            exit()
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
        # print(emailBDD)
        passBDD = (SQL(type="select", preset="multiple", table="password", column="password,using_site,id_email"))
        passwordActif = []
        for LIST in passBDD:
            # print(LIST['password'])
            # print(LIST['id_email'])
            passwordActif.append([LIST['password'], LIST['id_email']])
        # print(passBDD)
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
        # print(emailActif)
        # print(passwordActif)
        for line in dataToComit:
            # print(line)
            ID = -1
            if "email" in toComit:
                insertEmail = f"INSERT INTO email (email) VALUES ('{line['email']}')"
                # print(line["email"] not in emailActif)
                if line["email"] not in emailActif:
                    comit(insertEmail, line["email"], comit=False)
                    ID = mycursor.lastrowid
                else:
                    ID = SQL(type="select", preset="unique", table='email', column='id_email', where=f"email = '{line['email']}'")[0]['id_email']
            if "password" in toComit:
                # print([line["password"], ID])
                # print([line["password"], ID] not in passwordActif)
                if [line["password"], ID] not in passwordActif:
                    line['password'] = line['password'].replace('"', "??x02/").replace("'", "??x01/").replace("\\", "??x03/")
                    if "using_site" in toComit:
                        line['using_site'] = line['using_site'].replace('"', "??x02/").replace("'", "??x01/")
                        insertPass = f"INSERT INTO password (password, id_email, using_site) VALUES ('{line['password']}', {ID}, '{line['using_site']}'')"
                    else:
                        insertPass = f"INSERT INTO password (password, id_email) VALUES ('{line['password']}', {ID})"
                    # print(f"comit {insertPass} for email {line['email']}")
                    # print(ID)
                    comit(insertPass, comit=False)
        mydb.commit()
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

try:
    with open('testfile.txt', 'r') as file:
        read = (file.read())
        contentLine = read.split('*????')
        NumSep = len(contentLine)-2
        Sep = read.split('*????')[0]
except Exception as e:
    print(e)
    exit()
try:
    os.remove('testfile.txt')
except:
    pass
    
os.chdir("fileToComit")

try:
    with open(os.listdir()[0], 'r') as file:
        DICT = []
        for line in file.read().split('\n'):
            if line:
                line = line.split(Sep)
                ret = {}
                for sep in range(NumSep):
                    sep += 1
                    # print(sep)
                    # print(contentLine)
                    # print(line)
                    sort = sep
                    ret[contentLine[sep]] = line[sep-1]
                DICT.append(ret)
except Exception as e:
    print(e)
    exit()
os.remove(os.listdir()[0])
print('good')
SQL("insert", dataToComit=DICT)
