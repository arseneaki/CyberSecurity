#!/usr/local/bin/python

import hashlib,string,itertools,re,requests,sys

count =0 
#chars=string.lowercase + string.digits + string.uppercase
chars=string.digits

for words in itertools.imap(''.join, itertools.product(chars,repeat=9)):
#	print words+"@"+e
	hash=hashlib.md5("%s" % words).hexdigest()
#	print hash
#	print words
	if re.match(r'0+[eE]+\d+$',hash):
		print "Password : "+words
		print hashs
print "(+)Found 0e\d$ pattern %d" %count
count=count+1

