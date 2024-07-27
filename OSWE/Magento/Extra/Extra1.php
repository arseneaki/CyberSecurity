<?php 
    class PHPObjectInjection{
        public $inject;
        function __construct(){
        }
        function __wakeup(){
            if(isset($this->inject)){
                echo "aaabb";
                eval($this->inject);
            }
        }
    }
    if(isset($_GET['r'])){  
        $var1=unserialize($_GET['r']);
        echo $var1;
        if(is_array($var1)){
        echo "aaa";
            echo "<br/>".$var1[0]." - ".$var1[1];
        }
    }
    else{
        echo "abc"; # nothing happens here
    }
?>
