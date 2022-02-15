<?php
    session_start();

    function makeConn($dbname, $dbserver="localhost", $dbuser="root", $dbpass=""){
        $conn=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
        return $conn;
    }

    function isLevel($level){
        $succ=false;
        if(isset($_SESSION["level"])){
            $sessLevel=intval($_SESSION["level"]);
            if($sessLevel<$level){
                $succ=false;
            }else{
                $succ=true;
            }
        }
        return $succ;
    }

    function isLoggedIn(){
        
    }

?>