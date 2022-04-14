<?php include_once "session.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "header.php";  
            include_once "style.php";
            include_once "scripts.php";
        ?>
        <title><?php echo $title['password'] ?></title>
    </head>
    <body>
        <?php include_once "navbar.php";?>
			<div class="container py-4">
				<div class="text-center py-4">
					<h2><i class="fas fa-lock"></i> <?php echo $password['oublie'] ?></h2>
                </div>
				<form action="" method="POST" class="pb-3">
					<div id="password">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card card-position">
									<div class="card-header text-center link-font">
										<h3><i class="fas fa-lock"></i> <?php echo $password['oublie'] ?></h3>
									</div>
									<div class="card-body py-5">
										<div class="row mb-3">
											<label for="motdepasse" class="col-md-4 col-form-label text-md-end"><?php echo $password['nouveau'] ?></label>
											<div class="col-md-6">
												<div class="d-flex">
													<i class="fas fa-key position-awesome"></i>
													<input type="password" class="form-control pl-5" id="exampleInputPassword" placeholder="Mot de Passe" name="password" required>
												</div>
												<p id="error"></p>
												<div class="form-group form-check px-4">
													<input type="checkbox" class="form-check-input" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1" id="exampleCheck1"><?php echo $password['afficher'] ?></label>
												</div>
												<div class="pt-2">
													<input type="button" class="btn btn-primary" value="<?php echo $password['suivant'] ?>" id="password-btn">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="email" style="display:none;">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card card-position">
									<div class="card-header text-center link-font">
										<div class="d-flex">
											<i class="fa-solid fa-arrow-left"></i>
											<div class="w-75 mx-auto">
												<h3><i class="fas fa-envelope"></i> <?php echo $password['emailcheck'] ?></h3>
											</div>
										</div>
									</div>
									<div class="card-body py-5">
										<div class="row mb-3">
											<label for="email" class="col-md-4 col-form-label text-md-end"><?php echo $password['email'] ?></label>
											<div class="col-md-6">
												<div class="d-flex">
													<i class="fas fa-at position-awesome"></i>
													<input type="email" class="form-control pl-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" required>
												</div>
												<br>
												<div class="pt-2">
													<button type="submit" class="btn btn-primary" id="id-submit"> <?php echo $password['envoyer'] ?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
        <script>
            $(document).ready(function(){
                $("#exampleCheck1").click(function(){
		if($("#exampleCheck1").is(':checked')){
	     	$('#exampleInputPassword').get(0).type = 'text';
		}else{
	    	$('#exampleInputPassword').get(0).type = 'password';
	    }
	})
	$("#password-btn").click(function(){
		if($("#exampleInputPassword").val() == false){
			$("#error").html("<b>* Veuillez inserer votre mot de passe</b>").css("color", "#DC3545");
		}else{
			$("#error").hide();
			$("#password").hide();
			$("#email").show();
		}
	})
	$(".fa-arrow-left").click(function(){
		$("#email").hide();
		$("#password").show();
		$("#exampleInputPassword1").val("");
	})
            })
        </script>
    </body>
</html>