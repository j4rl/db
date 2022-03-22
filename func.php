<?php
    session_start();


    function server(){
        return $_SERVER['HTTP_HOST'];
    }

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
    function setIcon($intLevel, $myPath=""){
        
        if($intLevel>=100){
            return '<img src="'.$myPath.'admin.png">&nbsp;';
        }else if($intLevel<100 && $intLevel>=10){
            return '<img src="'.$myPath.'green.png">&nbsp;';
        }else if($intLevel==9){
            return '<img src="'.$myPath.'yellow.png">&nbsp;';
        }else if($intLevel==8){
            return '<img src="'.$myPath.'orange.png">&nbsp;';
        }else if($intLevel==7){
            return '<img src="'.$myPath.'red.png">&nbsp;';
        }else if($intLevel<=6){
            return '<img src="'.$myPath.'skull.png">&nbsp;';
        }
    }
    function setStatus($intStatus){
        switch($intStatus) {
            case 1:
                return "This is saved for evidence";
                break;
            case 2:
                return "Hate speech";
                break;
            case 3: 
                return "Offensive language";
                break;
            case 4: 
                return "Spam";
                break;
            case 5:
                return "Banned for violation of rules";
                break;
            case 6:
                return "Sexual content";
                break;
            case 7: 
                return "Violent or repulsive content";
                break;
            case 8: 
                return "Set on watchlist by user";
                break;
            case 9: 
                return "Awaiting to be published";
                break;                
            case 10:
                return "Published";
                break;
            default:
                return "Unvalid status value";
                break;
        }
    }


?>