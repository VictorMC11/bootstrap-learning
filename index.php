<?php
	include "controlers/UserController.php";
	$userController = new UserController();
	$users = $userController->get();
	echo json_encode($users);
?>

<!DOCTYPE html>
<html>

<head>

	<title>Bootstrap</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">


</head>

<body>

	<div class="wrap">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  			<a class="navbar-brand" href="#">Tacos</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  		 	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
     				 <li class="nav-item active">
        				<a class="nav-link" href="#">Inicio</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="#">Link</a>
      				</li>
    			</ul>
    			<form class="form-inline my-2 my-lg-0">
      				<input class="form-control mr-sm-2" type="search" placeholder="Escribe aquí..." aria-label="Search">
      				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    			</form>
  			</div>
		</nav>
		
		<nav aria-label="breadcrumb">
  			<ol class="breadcrumb">
    			<li class="breadcrumb-item active" aria-current="page">Inicio</li>
  			</ol>
		</nav>

		<?php if(isset($_SESSION['status'])&&$_SESSION['status']=="success"):?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Correcto!</strong><?=$_SESSION['message']?>. 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php unset($_SESSION['status']);?>
		<?php endif ?>

		<?php if(isset($_SESSION['status'])&&$_SESSION['status']=="error"):?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Error!</strong><?=$_SESSION['message']?>. 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php unset($_SESSION['status']);?>
		<?php endif ?>
		
		<div class="jumbotron">
		  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="alice.jpg" class="d-block w-100" alt="...">
			      <div class="carousel-caption d-none d-md-block">
			        <h5>Alice</h5>
			        <p>La caballera dorada con fuerza que rompe los limites.</p>
			      </div>
			    </div>
			    <div class="carousel-item">
			      <img src="kirito.jpg" class="d-block w-100" alt="...">
			      <div class="carousel-caption d-none d-md-block">
			        <h5>Kirito</h5>
			        <p>Leyenda del espadachin negro infundada en el juego Sword Art Online.</p>
			      </div>
			    </div>
			    <div class="carousel-item">
			      <img src="asuna.jpg" class="d-block w-100" alt="...">
			      <div class="carousel-caption d-none d-md-block">
			        <h5>Asuna</h5>
			        <p>La espadachina más rapida de cualquier juego.</p>
			      </div>
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="card-deck">
				  	<div class="card mb-4">
				    <img src="kirito.jpg" class="card-img-top" alt="...">
				    <div class="card-body">
				      <h5 class="card-title">Kazuto Kirigaya</h5>
				      <p class="card-text">Most overpowered protagonist ever created.</p>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>
				  <div class="card mb-4">
				    <img src="alice.jpg" class="card-img-top" alt="...">
				    <div class="card-body">
				      <h5 class="card-title">Alice Synthesis Thirty</h5>
				      <p class="card-text">Best waifu ever created.</p>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>
				  <div class="card mb-4">
				    <img src="asuna.jpg" class="card-img-top" alt="...">
				    <div class="card-body">
				      <h5 class="card-title">Asuna Yuuki</h5>
				      <p class="card-text">Just a cute girl.</p>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="card mb-14">
  					<div class="card-header">
   					 Lista de usuarios registrados
   					 <button type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-primary float-right">Añadir Usuario</button>
  					</div>
  					<div class="card-body">
   						<table class="table table-striped table-bordered">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Nombre</th>
						      <th scope="col">Correo Electronico</th>
						      <th scope="col">Estatus</th>
						      <th scope="col">Acciones</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php if(isset($users)&& count($users)>0): ?>
						  	<?php foreach($users as $user): ?>
						    <tr>
						      <th scope="row">
						      	<?= $user['id'] ?>
						      </th>
						      <td>
						      	<?= $user['nombre'] ?>
						      </td>
						      <td>
						      	<a href="malito:<?=$user['email']?>">
						      	<?= $user['correo'] ?>
						      	</a>
						      </td>
						      <td>
						      	<?php if($user['status']): ?>
						      		<span class="badge badge-success">
						      			Activo
						      		</span>	
						      	<?php else: ?>	
						      		<span class="badge badge-warining">
						      			Inactivo
						      		</span>	
						      	<?php endif ?>
						      </td>
						      <td>
						      	<button data-info='<?=json_encode($user) ?>'data-toggle="modal" data-target="#staticBackdrop" type="button" class="btn btn-warning" onclick="editar(this)" ><i class="fa fa-pencil">Editar</i></button>
						      	<button onclick="remove(1)" type="button" class="btn btn-danger"><i class="fa fa-trash">Eliminar</i></button>
						      </td>
						    </tr>
							<?php endforeach ?>
						  	<?php endif ?>
						  </tbody>
						</table>
  					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm">
				<h1>
					Titulo del post
				</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="">Leer más</a>
			</div>
			<div class="col-sm">
				<h1>
					Titulo del post
				</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="">Leer más</a>
			</div>
			<div class="col-sm">
				<h1>
					Titulo del post
				</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="">Leer más</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
     	 	<div class="modal-header">
       		<h5 class="modal-title" id="staticBackdropLabel">Agregar Usuario</h5>
       	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
         		<span aria-hidden="true">&times;</span>
       	 	</button>
     	 	</div>
     	 	<form method="POST" action="controlers/UserController.php" onsubmit="return validateRegister()">
	     		<div class="modal-body">
	       			<div class="form-group">
					    <label for="name">Nombre completo</label>
					    <div class="input-group mb-3">
  							<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i>
    						</span>
  							</div>
  						<input type="text" class="form-control" id="name" name="name" placeholder="Username" aria-label="Username" requiered="" aria-describedby="basic-addon1">
						</div>
					  </div>
					  <div class="form-group">
					    <label for="name">Correo Electronico</label>
					    <div class="input-group mb-3">
  							<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i>
    						</span>
  							</div>
  						<input type="email" class="form-control" id="email" name="email" placeholder="example@hotmail.com" required="" aria-label="correo" aria-describedby="basic-addon1">
						</div>
					  </div>
					  <div class="form-group">
					    <label for="name">Contraseña</label>
					    <div class="input-group mb-3">
  							<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i>
    						</span>
  							</div>
  						<input type="password" class="form-control" name="pass1" id="pass1"placeholder="*******" required="" aria-label="pass" aria-describedby="basic-addon1">
						</div>
					  </div>
					   <div class="form-group">
					    <label for="name">Confirmar contraseña</label>
					    <div class="input-group mb-3">
  							<div class="input-group-prepend">
    						<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i>
    						</span>
  							</div>
  						<input type="password" class="form-control" name="pass2" id="pass2"placeholder="*******" aria-label="pass2" aria-describedby="basic-addon1">
						</div>
					  </div>		 
	      		</div>
	     		<div class="modal-footer">
	       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      			<button type="submit" class="btn btn-primary">Ok</button>
	      			<input type="hidden" name="action" value="store">
	      			<input type="hidden" name="id" value="id">
	     		</div>
    		</form>	
    	</div>
 	 </div>
</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script type="text/javascript">
		function validateRegister(){
			if($("#pass1").val() == $("#pass2").val()){
				return true;
			}else{
				$("#pass1").addClass('is-invalid');
				$("#pass2").addClass('is-invalid');
				swal("Contraseña erronea", "Vuelva a escribir su contraseña", "error");

				return false;
			}
		}
		function remove(id){
			swal({
			  title: "¿Estas seguro?",
			  text: "Una vez eliminado, ya no podrá recuperarlo.",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			  buttons:["Cancelar", "Eliminar"],
			})
			.then((willDelete) => {
			  if (willDelete) {
			    swal("¡Ha sido eliminado con éxito!", {
			      icon: "success",
			    });
			  }
			});
		}

		function editar(target){
			var info = $(target).data('info');

			$("#name").val(info.nombre);
			$("#email").val(info.correo);
			$("#pass1").val(info.password);
			$("#pass2").val(info.password);
			$("#id").val(id);
		}

	</script>

</body>

</html>