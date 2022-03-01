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
        return isLevel(10);
    }

    function setNewUserLoginTime($ID){
        $conn=makeConn('can');
        $stamp=date("U");
        $sql="UPDATE tbluser SET lastlogin=".$stamp." WHERE id='$ID'";
        $result=mysqli_query($conn, $sql);
        return $result;
    }

    function lastLogin($userid){
        $conn=makeConn('can');
        $sql="SELECT * FROM tbluser WHERE id=$userid";
        $result=mysqli_query($conn, $sql);
        $raden=mysqli_fetch_assoc($result);
        if($raden['lastlogin']){
            return date('Y-m-d H:i', $raden['lastlogin']);
        }else{
            return "Never logged in!";
        }
    }

    function fixDate($var){
        $date=date('Y-m-d H:i', $var);
        return $date;
    }
    
    function getRealName($id){
        $conn=makeConn('can');
        $sql="SELECT * FROM tbluser WHERE id=$id";
        $result=mysqli_query($conn, $sql);
        $raden=mysqli_fetch_assoc($result);
        return $raden['realname'];
    }
?>