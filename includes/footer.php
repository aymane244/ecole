<?php
    $data = new Etudiant($db);
    $formations = $data->getformation();
?>
<?php
    if($_SESSION['lang'] == 'ar'){
?>
<script src="https://www.google.com/recaptcha/api.js?hl=ar" async defer></script>
<?php
    }else{
?>
<script src="https://www.google.com/recaptcha/api.js?hl=fr" async defer></script>
<?php
    }
?>
<div class="text-center pt-3 text-color" id="contactez-nous">
    <h2 class="pt-4"><?php echo $footer['contactez'] ?></h2>
    <hr class="hr-width">
</div>
<div class="footer-background">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-2">
                <div class="text-center pt-3 text-white">
                    <h2 class="pt-4"><?php echo $footer['trouver'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1618.496397530596!2d-5.806634243149613!3d35.77555333239981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c7f57d96a4d39%3A0xa8bf6236db39c3a3!2s12%20Rue%20El%20Hariri%2C%20Tanger!5e0!3m2!1sfr!2sma!4v1646222682302!5m2!1sfr!2sma" style="border:0; width:100%; height:450px" allowfullscreen="" loading="lazy" class="img-fluid"></iframe>
                </div>
            </div>
            <div class="col-lg-6 py-2">
                <div class="text-center pt-3 text-white">
                    <h2 class="pt-4"><?php echo $footer['envoyermessage'] ?></h2>
                    <hr class="hr-width">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <?php
                                if ($_SESSION['lang'] == "ar") {
                            ?>
                            <div style="text-align: right;" lang="ar">
                                <label for="nom" class="text-white"><?php echo $footer['nom'] ?></label>
                            </div>
                            <div style="float: right;">
                                <i class="fas fa-user position-awesome-arab" style="text-align: right;"></i>
                            </div>
                            <input type="text" class="form-control pr-5" name="nom" lang="ar" id="contact_nom" placeholder="الاسم الكامل" style="text-align: right;" required>
                            <?php
                                } else {
                            ?>
                            <label for="nom" class="text-white"><?php echo $footer['nom'] ?></label>
                            <div class="d-flex">
                                <i class="fas fa-user position-awesome"></i>
                                <input type="text" class="form-control pl-5" name="nom" id="contact_nom" placeholder="Nom complet" required>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <?php
                                if ($_SESSION['lang'] == "ar") {
                            ?>
                            <div style="text-align: right;" lang="ar">
                                <label for="email" class="text-white"><?php echo $footer['email'] ?></label>
                            </div>
                            <div style="float: right;">
                                <i class="fas fa-envelope position-awesome-arab"></i>
                            </div>
                            <input type="email" class="form-control pr-5" name="email" id="contact_email" placeholder="البريد الإلكتروني" style="text-align: right;" required>
                            <?php
                                } else {
                            ?>
                            <label for="email" class="text-white"><?php echo $footer['email'] ?></label>
                            <div class="d-flex">
                                <i class="fas fa-envelope position-awesome-email"></i>
                                <input type="email" class="form-control pl-5" name="email" id="contact_email" placeholder="Email" required>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php
                        if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div style="text-align: right;" lang="ar">
                        <label for="exampleInputSuje1" class="text-white"><?php echo $footer['sujet'] ?></label>                         
                    </div>
                    <div style="float: right;">
                        <i class="fas fa-book-open position-awesome-arab"></i>
                    </div>
                    <input type="text" class="form-control pr-5" lang="ar" id="exampleInputSuje1" name ="sujet" aria-describedby="emailSujet" style="text-align: right;" placeholder="الموضوع" required>
                    <?php
                        } else {
                    ?>
                    <label for="exampleInputSuje1" class="text-white" lang="ar"><?php echo $footer['sujet'] ?></label>
                    <div class="d-flex">
                        <i class="fas fa-book-open position-awesome-sujet"></i>
                        <input type="text" class="form-control pl-5" id="exampleInputSuje1" lang="ar" name ="sujet" aria-describedby="emailSujet" placeholder="Sujet" required>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div style="text-align:right" lang="ar">
                        <label for="exampleFormControlTextarea1" lang="ar" class="text-white"><?php echo $footer['message'] ?></label>
                        <textarea class="form-control text-right" lang="ar" id="exampleFormControlTextarea1" name="message" rows="6" required></textarea>
                    </div>
                    <?php
                        } else {
                    ?>
                    <label for="exampleFormControlTextarea1" class="text-white"><?php echo $footer['message'] ?></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="6" required></textarea>
                    <?php
                        }
                    ?>
                </div>
                <div class="mx-auto w-100">
                    <div class="g-recaptcha" data-sitekey="6LfgOzAhAAAAAHVLIYf_vY-oNWizH-86kcCpT1BX"></div>
                </div>
                <div class="text-center">
                    
                    <br>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit"><?php echo $footer['btn_message'] ?></button>
                    <div id="res" class="text-white"></div>
                    <?php
                        if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div id="errorr_arab" lang="ar"></div>
                    <?php
                        } else {
                    ?>
                    <div id="errorr"></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <?php
                if ($_SESSION['lang'] == "ar") {
            ?>
            <div class="col-lg-3 text-right py-3" lang="ar">
                <h4 class="text-color-footer"><?php echo $footer['propos'] ?></h4>
                <div class="text-white mr-3">
                    <p>.<?php echo $footer['artln'] ?></p>
                    <!-- <div class="d-flex pb-3 justify-content-center">
                        <div class="social-media social-div"><a href="#" class="text-white"><i class="fab fa-facebook-f facebook-position"></i></a></div>
                        <div class="social-media"><a href="#" class="text-white"><i class="fab fa-instagram instagram-position"></i></a></div>
                        <div class="social-media"><a href="#" class="text-white"><i class="fab fa-linkedin-in linkedin-position"></i></a></div>
                        <div class="social-media"><a href="#" class="text-white"><i class="fab fa-whatsapp whatsapp-position"></i></a></div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 text-right py-3" lang="ar">
                <h4 class="text-color-footer"><?php echo $footer['adresse_footer'] ?></h4>
                <div class="text-white mr-3">
                    <p><?php echo $footer['adresse'] ?> <?php echo $footer['ville'] ?></p>
                    <p class="pt-3">
                        <b><?php echo $footer['phone'] ?>: </b>+212664159137 <br>
                        <b><?php echo $footer['fix'] ?>: </b>+212539320395 <br>
                        <b><?php echo $footer['fax'] ?>: </b>+212539320395 <br>
                        <b><?php echo $footer['email_footer'] ?>: </b>artl.nord.tanger@gmail.com
                    </p>
                </div>
            </div>
            <div class="col-lg-3 text-right py-3" lang="ar">
                <h4 class="text-color-footer"><?php echo $navbar['Formations'] ?></h4>
                <div class="text-white">
                    <?php
                        foreach($formations as $formation){
                    ?>
                    <div class="mt-3 mr-3">
                        <a href="formation?titre=<?php echo str_replace(' ', '_',$formation['for_nom']); ?>" class="text-white"><?php echo $formation['for_nom_arab'];?></a> <i class="fas fa-caret-left"></i>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 text-right py-3" lang="ar">
                <h4 class="text-color-footer"><?php echo $footer['liens'] ?></h4>
                <div class="text-white mr-3">
                    <div class="mt-3"> <a href="index" class="text-white"><?php echo $navbar['Accueil'] ?></a> <i class="fas fa-caret-left"></i> </div>
                    <div class="mt-3"> <a href="ARTL-Nord" class="text-white"> ARTLN</a> <i class="fas fa-caret-left"></i> </div>
                    <div class="mt-3"> <a href="conseil" class="text-white"> <?php echo $navbar['Conseil'] ?></a> <i class="fas fa-caret-left"></i> </div>
                    <div class="mt-3"> <a href="location-salle" class="text-white"> <?php echo $navbar['salles'] ?></a> <i class="fas fa-caret-left"></i> </div>
                    <div class="mt-3"> <a href="actualités" class="text-white"> <?php echo $navbar['Actualites'] ?></a> <i class="fas fa-caret-left"></i> </div>
                </div>
            </div>
            <?php
                } else {
            ?>
            <div class="col-lg-3 py-3">
                <h4 class="text-color-footer"><?php echo $footer['liens'] ?></h4>
                <div class="text-white ml-3">
                    <div class="mt-3"><i class="fas fa-caret-right"></i> <a href="index" class="text-white"> <?php echo $navbar['Accueil'] ?></a></div>
                    <div class="mt-3"><i class="fas fa-caret-right"></i> <a href="ARTL-Nord" class="text-white"> ARTLN</a></div>
                    <div class="mt-3"><i class="fas fa-caret-right"></i> <a href="conseil" class="text-white"> <?php echo $navbar['Conseil'] ?></a></div>
                    <div class="mt-3"><i class="fas fa-caret-right"></i> <a href="location-salle" class="text-white"> <?php echo $navbar['salles'] ?></a></div>
                    <div class="mt-3"><i class="fas fa-caret-right"></i> <a href="actualités" class="text-white"> <?php echo $navbar['Actualites'] ?></a></div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <h4 class="text-color-footer"><?php echo $navbar['Formations'] ?></h4>
                <div class="text-white">
                    <?php
                        foreach($formations as $formation){
                    ?>
                    <div class="mt-3 ml-3">
                        <i class="fas fa-caret-right"></i> <a href="formation?titre=<?php echo str_replace(' ', '_',$formation['for_nom']); ?>" class="text-white"><?php echo $formation['for_nom'];?></a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <h4 class="text-color-footer"><?php echo $footer['adresse_footer'] ?></h4>
                <div class="text-white mx-3">
                    <p><?php echo $footer['adresse'] ?><br> <?php echo $footer['ville'] ?></p>
                    <p class="pt-3">
                        <b><?php echo $footer['phone'] ?>: </b>+212664159137 <br>
                        <b><?php echo $footer['fix'] ?>: </b>+212539320395 <br>
                        <b><?php echo $footer['fax'] ?>: </b>+212539320395 <br>
                        <b><?php echo $footer['email_footer'] ?>: </b>artl.nord.tanger@gmail.com
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <h4 class="text-color-footer"><?php echo $footer['propos'] ?></h4>
                <div class="text-white mx-3">
                    <p><?php echo $footer['artln'] ?></p>
                    <!-- <div class="d-flex pb-3 justify-content-center">
                        <div class="social-media social-div"><a href="#" class="text-white"><i class="fab fa-facebook-f facebook-position"></i></a></div>
                        <div class="social-media"><a href="#" class="text-white"><i class="fab fa-instagram instagram-position"></i></a></div>
                        <div class="social-media"><a href="#" class="text-white"><i class="fab fa-linkedin-in linkedin-position"></i></a></div>
                        <div class="social-media"><a href="#" class="text-white"><i class="fab fa-whatsapp whatsapp-position"></i></a></div>
                    </div> -->
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="bg-white text-center pb-4">
        <hr>
        <i class="far fa-copyright size-awesome"></i> Copyright Aimane Chnaif, Chaimae Souiri, Ilyass Assebane, Yasmina Aboussabr. All rights reserved
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var nom = $("#contact_nom").val();
            var email = $("#contact_email").val();
            var sujet = $("#exampleInputSuje1").val();
            var message = $("#exampleFormControlTextarea1").val();
            if((nom == '') && (email =='') && (sujet == '') && (message == '')){
                $('#errorr').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez remplir tous les champs</div>');
                $('#errorr_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا اكمل جميع الحقول</div>');
            }else if(nom == ''){
                $('#errorr').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre nom</div>');
                $('#errorr_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">من فضلك أدخل إسمك</div>');
            }else if(email == ''){
                $('#errorr').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre email</div>');
                $('#errorr_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا أدخل بريدك الإلكتروني</div>');
            }else if(sujet == ''){
                $('#errorr').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre sujet</div>');
                $('#errorr_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء إدخال الموضوع</div>');
            }else if(message == ''){
                $('#errorr').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre message</div>');
                $('#errorr_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">أدرج رسالتك من فضلك</div>');
            }else{
                $.post( "functions/traitement.php",{nom: nom, email: email, sujet:sujet, message:message, action:'add_message'}, function( result ) {
                    $('#res').html(result);
                    $("#errorr").css("display", "none");
                    $('#errorr_arab').css("display", "none");
                });
                $("#contact_nom").val('');
                $("#contact_email").val('');
                $("#exampleInputSuje1").val('');
                $("#exampleFormControlTextarea1").val('');
                setTimeout(cacherFooterr, 3000);
                    function cacherFooterr(){
                    $('#res').fadeOut()
                }
            } 
        });
    })
</script>