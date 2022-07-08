<?php include_once "../session.php";?>
<?php
	if(isset($_POST['submit_pwd'])){
		$admins = $admin->getAdmin();
		foreach($admins as $item){
			if($_POST['email'] == ''){
				$message = "Veuillez saisir votre email";
			}else if($item['adm_email'] != $_POST['email']){
				$message = "Email ".$_POST['email']." n'existe pas dans nos données";
			}else{
				$admin->updatePassword();
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../images/view/logo.png" type="image/x-icon">
        <?php 
            include_once "../includes/header.php";  
            include_once "../includes/style.php";
            include_once "../includes/scripts.php";
        ?>
        <title>Mot de passe oublié</title>
    </head>
    <body>
		<div class="container py-4">
			<?php
            	if(isset($_SESSION['status'])){
            ?>
            <div class='alert alert-success text-center' role='alert'><?php echo $_SESSION['status']?></div>
            <?php
                    unset($_SESSION['status']);
                }else if(isset($message)){
			?>
			<div class="alert alert-danger text-center" role="alert"><?php echo $message?></div>
			<?php		
				}else{
					unset($message);
				}
			?>
			<div class="text-center py-5">
                <h2><i class="fas fa-lock"></i> Mot de passe oublié</h2>
            </div>
			<form action="" method="POST" class="pb-3">
				<div id="password">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card card-position" style="box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.2);">
								<div class="card-header text-center link-font">
									<h3>
										<i class="fas fa-lock"></i> Mot de passe oublié
									</h3>
								</div>
								<div class="card-body py-5">
									<div class="row mb-3 justify-content-center">
										<label for="motdepasse" class="col-md-8 col-form-label">Nouveau mot de passe</label>
										<div class="col-md-8">
											<div class="d-flex">
												<i class="fas fa-key position-awesome"></i>
												<input type="password" class="form-control pl-5 input-check" id="exampleInputPassword" placeholder="Mot de Passe" name="password">
											</div>
											<p id="error"></p>
											<div class="form-group form-check px-4">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1" id="exampleCheck1">Afficher mot de passe</label>
											</div>
											<div class="pt-2 d-flex align-items-center">
												<input type="button" class="btn btn-primary mr-2" value="Suivant" id="password-btn">
												<a href="login-admin">Retour à la page de connexion</a>
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
							<div class="card card-position" style="box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.2);">
								<div class="card-header text-center link-font">
									<div class="d-flex">
										<i class="fa-solid fa-arrow-left"></i>
										<div class="w-75 mx-auto">
											<h3><i class="fas fa-envelope"></i> Insérez votre email</h3>
										</div>
									</div>
								</div>
								<div class="card-body py-5">
									<div class="row mb-3 justify-content-center">
										<label for="email" class="col-md-8 col-form-label">Votre email</label>
										<div class="col-md-8">
											<div class="d-flex">
												<i class="fas fa-at position-awesome"></i>
												<input type="email" class="form-control pl-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
											</div>
											<br>
											<div class="pt-2">
												<button type="submit" class="btn btn-primary" id="id-submit" name="submit_pwd"> Envoyer</button>
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
	     				$('.input-check').get(0).type = 'text';
					}else{
	    				$('.input-check').get(0).type = 'password';
	    			}
				})
				$("#chekc").click(function(){
					if($("#chekc").is(':checked')){
	     				$('#exampleInputPassword').get(0).type = 'text';
					}else{
	    				$('#exampleInputPassword').get(0).type = 'password';
	    			}
				})
				$("#password-btn").click(function(){
					if($("#exampleInputPassword").val() == false){
						$("#error").html("<b>Veuillez inserer votre mot de passe</b>").css("color", "#DC3545");
						$("#error_ara").html("<b> الرجاء إدخال كلمة المرور الخاصة بك</b>").css("color", "#DC3545");
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
<?php 

?>