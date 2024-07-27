

<?php
error_reporting(0);
include("../exercises.php");

class Bar {
    public $className;
    public $args;

    public function __construct() {
        $this->bar = 'foobar';
    }

    public function _hack(){
        if (eval($this->args) === NULL){
       	    print "<p>Congrats you redirected execution to controlled PHP code!</p>";
        }
    }
}

class Foo {
    public $file;
    public $className;
    public $lolargs;

    public function __construct() {
        $this->bar = 'foobar';
    }
    public function setFile($fileName){
        $this->file = $fileName;
    }

    public function __call($name, $arguments) {
        call_user_func_array(array($this->className,"_$name"), $arguments);
    }

    public function __destruct(){
        $this->hack();
    }
}

print '<p> Your goal is to construct a POP chain that will execute injected php code.</p>';
print "<p> $quotes[$rand_key] </p>";

if(isset($_GET['object'])){
    unserialize(base64_decode($_GET['object']));
}
?>

