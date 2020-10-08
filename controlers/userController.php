<?php 
    
    include_once "config.php";
    include_once "connectionController.php";

    if(isset($_POST) && isset($_POST['action'])){
        $userController = new UserController();     
        switch ($_POST['action']) {
            case 'store':

                    $name = strip_tags($_POST['name']);
                    $email = strip_tags($_POST['email']);
                    $pass = strip_tags($_POST['pass1']);

                    $userController->store($name,$email,$pass);

            break;

            case 'update':

                    $name = strip_tags($_POST['name']);
                    $email = strip_tags($_POST['email']);
                    $pass = strip_tags($_POST['pass1']);
                    $id = strip_tags($_POST['id']);

                    $userController->update($name,$email,$pass, $id);

            break;
        }
    }

    Class UserController{
    	
        function get(){
    		$con = connect();
    		if(!$con->connect_error){

    			$query = "select * from users";
    			$prepared_query = $con->prepare($query);
    			$prepared_query->execute();

    			$results = $prepared_query->get_result();
    			$users = $results->fetch_all(MYSQLI_ASSOC);
    			if($users){
    				return $users;
    			}else{
                    return array();
                }
    		}else
                return array();
    	}

        public function update($name, $email, $password, $id){
            $con = connect();
            if(!$con->connect_error){

                if($name!="" && $email!="" && $password!="" && $id!=""){
                    $query = "update users set nombre = ?, correo = ?, password = ? where id = ?";
                    $prepared_query = $con->prepare($query);
                    $prepared_query->bind_param('sssi',$name,$email,$password,$id);
                    if($prepared_query->execute()){
                       
                        $_SESSION['status'] = "success";
                        $_SESSION['message'] = "El reigstro se ha actualizado correctamente";

                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        
                    }else{
                        $_SESSION['error'] = "success";
                        $_SESSION['message'] = "El registro no se ha actualizado.";

                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }else{
                    $_SESSION['error'] = "error";
                    $_SESSION['message'] = "Verifique la información mandada.";

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }else{
                $_SESSION['error'] = "success";
                $_SESSION['message'] = "Error durante la conexión.";

                header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
        }

        public function store($name, $email, $password){
            $con = connect();
            if(!$con->connect_error){

                if($name!="" && $email!="" && $password!=""){
                    $query= "insert into users (nombre, correo, password) values (?,?,?)";
                    $prepared_query = $con->prepare($query);
                    $prepared_query->bind_param('sss',$name,$email,$password);
                    if($prepared_query->execute()){
                        $_SESSION['status'] = "success";
                        $_SESSION['message'] = "El reigstro se ha guardado correctamente";

                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }else{
                        $_SESSION['error'] = "success";
                        $_SESSION['message'] = "El registro no se ha guardado.";

                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }else{
                    $_SESSION['error'] = "error";
                    $_SESSION['message'] = "Verifique la información mandada.";

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }else{
                $_SESSION['error'] = "success";
                $_SESSION['message'] = "Error durante la conexión.";

                header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
        }
    }   
?>