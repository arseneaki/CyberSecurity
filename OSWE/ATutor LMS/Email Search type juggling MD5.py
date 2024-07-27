#!/usr/local/bin/python

import hashlib,string,itertools,re,requests,sys

data="2016-03-10 16:00:00"
id ="1"
e = sys.argv[1]
count =0 
chars=string.lowercase + string.digits
for words in itertools.imap(''.join, itertools.product(chars,repeat=8)):
        hash=hashlib.md5("%s@%s" % (words,e) + data + id).hexdigest()[:10]
#        hashs=hashlib.md5("%s@%s" % (words,e) + data + id).hexdigest()
        if re.match(r'0+[e]+\d+$',hash):
                print "Email : "+words+"@"+e
                print hash
print "(+)Found 0e\d$ pattern %d" %count
count=count+1