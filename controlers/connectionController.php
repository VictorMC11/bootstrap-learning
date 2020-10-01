<?php 
    
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DBNM", "crud");

    function connect(){
    	$con = new mysqli(HOST, USER, PASS, DBNM);
    	if($con){
    		return $con;
    	}else{
    		return null;
    	}
    }
?>