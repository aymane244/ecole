<?php include_once "session.php";?>
<?php
	if(isset($_POST['submit_pwd'])){
		$etudiants = $data->getEtudiant();
		foreach($etudiants as $etudiant){
			if($_POST['email'] == ''){
				$message = "Veuillez saisir votre email";
				$message_arab = "رجاءا أدخل بريدك الإلكتروني";
			}else if($etudiant['etud_email'] != $_POST['email']){
				$message = "Email ".$_POST['email']." n'existe pas dans nos données";
				$message_arab = "غير موجود في بياناتنا".$_POST['email']."البريد الإلكتروني";
			}else{
				$data->updatePassword();
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
			<?php
            	if($_SESSION['lang'] == 'ar'){
            ?>
			<?php
            	if(isset($_SESSION['status_arab'])){
            ?>
            <div class='alert alert-success text-center' role='alert'><?php echo $_SESSION['status_arab']?></div>
            <?php
                    unset($_SESSION['status_arab']);
                }else if(isset($message_arab)){
			?>
			<div class="alert alert-danger text-center" role="alert"><?php echo $message_arab?></div>
			<?php		
				}else{
					unset($message_arab);
				}
			?>
			<?php
                }else{
			?>
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
			<?php		
				}
			?>
			<form action="" method="POST" class="pb-3">
				<div id="password">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card card-position" style="box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.2);">
								<div class="card-header text-center link-font">
									<h3>
										<?php
                                        	if($_SESSION['lang'] == 'ar'){
                                    	?>
										<?php echo $password['oublie'] ?> <i class="fas fa-lock"></i> 
										<?php
                                        	}else{
                                    	?>
										<i class="fas fa-lock"></i> <?php echo $password['oublie'] ?>
										<?php                
                                        	}
                                    	?>
										
									</h3>
								</div>
								<div class="card-body py-5">
									<div class="row mb-3 justify-content-center">
										<?php
                                        	if($_SESSION['lang'] == 'ar'){
                                    	?>
										<div class="col-md-8">
											<div class="text-right">
												<label for="motdepasse" class="col-md-8 col-form-label"><?php echo $password['nouveau'] ?></label>
											</div>
											<div class="d-flex">
												<i class="fas fa-key position-awesome_arab_login"></i>
												<input type="password" class="form-control pr-5 input-check text-right" id="exampleInputPassword" placeholder="كلمة السر" name="password">
											</div>
											<p id="error_ara" style="text-align: right;"></p>
											<div class="form-group form-check px-4 text-right">
												<label class="form-check-label " for="exampleCheck1"><?php echo $password['afficher'] ?></label>
												<input type="checkbox" class="form-check-input" id="chekc" style="margin-left:5px">
											</div>
											<div class="pt-2 align-items-center" style="text-align: right;">
												<a href="login"><?php echo $password['retour'] ?></a>
												<input type="button" class="btn btn-primary ml-2" value="<?php echo $password['suivant'] ?>" id="password-btn">
											</div>
										</div>
										<?php
                                        	}else{
                                    	?>
										<label for="motdepasse" class="col-md-8 col-form-label"><?php echo $password['nouveau'] ?></label>
										<div class="col-md-8">
											<div class="d-flex">
												<i class="fas fa-key position-awesome"></i>
												<input type="password" class="form-control pl-5 input-check" id="exampleInputPassword" placeholder="Mot de Passe" name="password">
											</div>
											<p id="error"></p>
											<div class="form-group form-check px-4">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1" id="exampleCheck1"><?php echo $password['afficher'] ?></label>
											</div>
											<div class="pt-2 d-flex align-items-center">
												<input type="button" class="btn btn-primary mr-2" value="<?php echo $password['suivant'] ?>" id="password-btn">
												<a href="login"><?php echo $password['retour'] ?></a>
											</div>
										</div>
										<?php                
                                        	}
                                    	?>
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
											<h3>
												<?php
                                        			if($_SESSION['lang'] == 'ar'){
                                    			?>
												<?php echo $password['emailcheck'] ?> <i class="fas fa-envelope"></i> 
												<?php
                                        			}else{
                                    			?>
												<i class="fas fa-envelope"></i> <?php echo $password['emailcheck'] ?>
												<?php                
        	                                		}
            	                        		?>	
											</h3>
										</div>
									</div>
								</div>
								<div class="card-body py-5">
									<div class="row mb-3 justify-content-center">
										<?php
                                        	if($_SESSION['lang'] == 'ar'){
                                    	?>
										<div class="col-md-8">
											<div class="text-right">
												<label for="email" class="col-md-8 col-form-label"><?php echo $password['email'] ?></label>
											</div>
											<div class="d-flex">
												<i class="fas fa-at position-awesome_arab_login"></i>
												<input type="email" class="form-control pr-5 text-right" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكتروني" name="email">
											</div>
											<br>
											<div class="pt-2 text-right">
												<button type="submit" class="btn btn-primary" id="id-submit" name="submit_pwd"> <?php echo $password['envoyer'] ?></button>
											</div>
										</div>
										<?php
                                			}else{
                            			?>
										<label for="email" class="col-md-8 col-form-label"><?php echo $password['email'] ?></label>
										<div class="col-md-8">
											<div class="d-flex">
												<i class="fas fa-at position-awesome"></i>
												<input type="email" class="form-control pl-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
											</div>
											<br>
											<div class="pt-2">
												<button type="submit" class="btn btn-primary" id="id-submit" name="submit_pwd"> <?php echo $password['envoyer'] ?></button>
											</div>
										</div>
										<?php                
        	                                }
            	                    	?>
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