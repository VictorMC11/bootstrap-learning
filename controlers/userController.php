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
        public function store($name, $email, $password){
            $con = connect();
            if(!$con->connect_error){

                if($name!="" && $email!="" && $password!=""){
                    $query= "insert into users (nombre, correo, password) values (?,?,?)";
                    $prepared_query = $con->prepare($query);
                    $prepared_query->bind_param('sss',$name,$email,$password);
                    if($prepared_query->execute()){
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
        }
    }   
?>