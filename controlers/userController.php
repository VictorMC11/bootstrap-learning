<?php 
    
    include_once "config.php";
    include_once "connectionController.php";

    Class userController{
    	function get(){
    		$con = connect();
    		if($con->connect_error){

    			$query = "SELECT * FROM users";
    			$prepared_query = $con->prepare($query);
    			$prepared_query->execute();

    			$status = $prepared_query->get_result();
    			$users = $results->fetch_all(MYSQL_ASSOC);

    			if($users){
    				return $users;
    			}
    		}
    	}
    }
    
?>