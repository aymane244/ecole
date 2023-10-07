<?php include_once "session.php";?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            include_once "includes/header.php";  
            include_once "includes/style.php";
            include_once "includes/scripts.php";
        ?>
        <title>
            <?php 
                if($_SESSION['lang'] =="ar"){
                  echo "قاعات الدرس";
                }else{
                  echo "Salles";
                }
            ?>
        </title>
    </head>
    <body>
      <?php include_once "navbar.php";?>
      <div class="div-background" id="top">
        <div class="text-white text-center text-big div-header">
            <h2 class="h1-size-big"><?php echo $salle['location'] ?></h2>
        </div>
        <div style="position:relative">
            <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
            <img src="images/view/classroom.png" alt="" class="d-block img-fluid" style="width:100%;">
        </div>
        <div class="container">
          <?php
            if(isset($_SESSION['status'])){
          ?>
          <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
          <?php
            unset($_SESSION['status']);
            }
          ?>
        </div>
        <div class="container">
          <div class="row mt-4 align-items-center bg-white">
            <div class="col-md-12">
              <h4 class="text-color text-center mt-3"><u><?php echo $salle['description'] ?></u></h4>
            </div>
            <div class="col-md-6 py-3">
              <div class="text-center">
                <img src="images/no_image.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-md-6 bg-white py-3">
              <?php 
                if($_SESSION['lang'] =="ar"){
              ?>
              <div lang="ar" dir="rtl">
                <p class="text-justify mt-3 text-right"> 
                لوريم إبسون لوريم إبسون لوريم إبسون لوريم إبسون لوريم إبسون لوريم إبسون لوريم إبسون لوريم إبسون
                </p>
              </div>
              <?php
                }else{
              ?>
              <div>
                <p class="text-justify mt-3"> 
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, sunt excepturi vero autem repellendus tenetur ut dicta libero? Molestiae impedit aliquid nisi illo ut ipsam, facilis atque assumenda quod quidem. 
                </p>
              </div>
              <?php 
                }
              ?>            
            </div>
          </div>
          <div class="text-center pt-3 text-color">
            <h2 class="pt-4"><?php echo $salle['services'] ?></h2>
            <hr class="hr-width">
          </div>
          <div class="d-flex justify-content-around bg-white py-3">
            <div class="font-ckeck-image">
              <p>
                <?php 
                  if($_SESSION['lang'] =="ar"){
                    echo 'حواسيب <i class="fas fa-check"></i>';
                  }else{
                    echo '<i class="fas fa-check"></i> Oridnateurs';
                  }
                ?>
              </p>
              <p>
                <span class="">
                  <?php 
                    if($_SESSION['lang'] =="ar"){
                      echo 'آلة نسخ <i class="fas fa-check"></i>';
                    }else{
                      echo '<i class="fas fa-check"></i> Photocopieur';
                    }
                  ?>
                </span>
              </p>
            </div>
            <div class="font-ckeck-image">
              <p>
                <span class="">
                  <?php
                    if($_SESSION['lang'] =="ar"){
                      echo 'طابعة <i class="fas fa-check"></i>';
                    }else{
                      echo '<i class="fas fa-check"></i> Imprimante';
                    }
                  ?>
                </span>
              </p>
              <p>
                <span class="">
                  <?php 
                    if($_SESSION['lang'] =="ar"){
                      echo 'طعامة <i class="fas fa-check"></i>';
                    }else{
                      echo '<i class="fas fa-check"></i> Restauration';
                    }
                  ?>
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="container">
          <div id="gallery" class="Gallery">
            <div class="text-center pt-3 text-color mb-3">
              <h2 class="pt-4"><?php echo $salle['image'] ?></h2>
              <hr class="hr-width">
            </div>
            <div class="row justify-content-center">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="Gallery-box">
                  <figure>
                    <a href="images/salle1_artln.jpg" class="fancybox" rel="ligthbox">
                      <img src="images/no_image.jpg" alt="" class="img-fluid img-width">
                    </a>
                    <span class="hoverle">
                      <a href="images/no_image.jpg" class="fancybox" rel="ligthbox"><?php echo $salle['apercu'] ?></a>
                    </span>
                  </figure>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                <div class="Gallery-box">
                  <figure>
                    <a href="iimages/no_image.jpg" class="fancybox" rel="ligthbox">
                      <img src="images/no_image.jpg" alt="" class="img-fluid img-width">
                    </a>
                    <span class="hoverle">
                      <a href="images/no_image.jpg" class="fancybox" rel="ligthbox"><?php echo $salle['apercu'] ?></a>
                    </span>
                  </figure>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                <div class="Gallery-box">
                  <figure>
                    <a href="images/no_image.jpg" class="fancybox" rel="ligthbox">
                      <img src="images/no_image.jpg" alt="" class="img-fluid img-width">
                    </a>
                    <span class="hoverle">
                      <a href="images/no_image.jpg" class="fancybox" rel="ligthbox"><?php echo $salle['apercu'] ?></a>
                    </span>
                  </figure>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                <div class="Gallery-box">
                  <figure>
                    <a href="images/no_image.jpg" class="fancybox" rel="ligthbox">
                      <img src="images/no_image.jpg" alt="" class="img-fluid img-width">
                    </a>
                    <span class="hoverle">
                      <a href="images/no_image.jpg" class="fancybox" rel="ligthbox"><?php echo $salle['apercu'] ?></a>
                    </span>
                  </figure>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                <div class="Gallery-box">
                  <figure>
                    <a href="images/no_image.jpg" class="fancybox" rel="ligthbox">
                      <img src="images/no_image.jpg" alt="" class="img-fluid img-width">
                    </a>
                    <span class="hoverle">
                      <a href="images/no_image.jpg" class="fancybox" rel="ligthbox"><?php echo $salle['apercu'] ?></a>
                    </span>
                  </figure>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                <div class="Gallery-box">
                  <figure>
                    <a href="images/no_image.jpg" class="fancybox" rel="ligthbox">
                      <img src="images/no_image.jpg" alt="" class="img-fluid img-width">
                    </a>
                    <span class="hoverle">
                      <a href="images/no_image.jpg" class="fancybox" rel="ligthbox"><?php echo $salle['apercu'] ?></a>
                    </span>
                  </figure>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="text-center pt-3 text-color mb-3">
            <h2 class="pt-4"><?php echo $salle['reservation'] ?></h2>
            <hr class="hr-width">
          </div>
          <div class="row justify-content-center bg-white py-3">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                      if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div style="text-align: right;" lang="ar" dir="rtl">
                      <label for="nom"><?php echo $salle['nom'] ?></label>
                    </div>
                    <div style="float: right;">
                      <i class="fas fa-user position-awesome-arab"></i>
                    </div>
                    <input type="text" class="form-control pr-5" lang="ar" dir="rtl" name="reservation_nom" style="text-align: right;" id="reservation_nom" placeholder="اسمك" value="<?php echo isset($_POST['reservation_nom']) ? $_POST['reservation_nom'] : '' ?>">
                    <?php
                      }else{
                    ?>
                    <label for="nom"><?php echo $salle['nom'] ?></label>
                    <div class="d-flex">
                      <i class="fas fa-user position-awesome"></i>
                      <input type="text" class="form-control pl-5" name="reservation_nom" id="reservation_nom" placeholder="Votre nom" value="<?php echo isset($_POST['reservation_nom']) ? $_POST['reservation_nom'] : '' ?>">
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                      if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div style="text-align: right;" lang="ar" dir="rtl">
                      <label for="telephone"><?php echo $salle['num'] ?></label>
                    </div>
                    <div style="float: right;">
                      <i class="fas fa-phone-alt position-awesome-arab"></i>
                    </div>
                    <input type="text" class="form-control pr-5" lang="ar" dir="rtl" name="reservation_telephone" style="text-align: right;" id="reservation_telephone" placeholder="رقم هاتفك" value="<?php echo isset($_POST['reservation_telephone']) ? $_POST['reservation_telephone'] : '' ?>">
                    <?php
                      }else{
                    ?>
                    <label for="telephone"><?php echo $salle['num'] ?></label>
                    <div class="d-flex">
                      <i class="fas fa-phone position-awesome"></i>
                      <input type="text" class="form-control pl-5" name="reservation_telephone" id="reservation_telephone" placeholder="Votre numéro de telephone" value="<?php echo isset($_POST['reservation_telephone']) ? $_POST['reservation_telephone'] : '' ?>">
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                      if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div style="text-align: right;" lang="ar" dir="rtl">
                      <label for="exampleInputEmail1"><?php echo $salle['email'] ?></label>
                    </div>
                    <div style="float: right;">
                      <i class="fas fa-envelope position-awesome-arab"></i>
                    </div>
                    <input type="email" class="form-control pr-5" lang="ar" dir="rtl" id="email_reservation" style="text-align: right;" name="email_reservation" aria-describedby="emailHelp" placeholder="بريدك الإلكتروني" value="<?php echo isset($_POST['email_reservation']) ? $_POST['email_reservation'] : '' ?>">
                    <?php
                      }else{
                    ?>
                    <label for="exampleInputEmail1"><?php echo $salle['email'] ?></label>
                    <div class="d-flex">
                      <i class="fas fa-envelope position-awesome"></i>
                      <input type="email" class="form-control pl-5" id="email_reservation" name="email_reservation" aria-describedby="emailHelp" placeholder="Votre adresse email" value="<?php echo isset($_POST['email_reservation']) ? $_POST['email_reservation'] : '' ?>">
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                      if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div style="text-align: right;" lang="ar" dir="rtl">
                      <label for="salle"><?php echo $salle['salle'] ?></label>
                    </div>
                    <div style="float: right;">
                      <i class="fas fa-book-open position-awesome-arab"></i>
                    </div>
                    <select class="custom-select pr-5" name="salle_id" id="salle_id" dir="rtl" lang="ar">
                      <option value="">--<?php echo $salle['salle'] ?>--</option>
                      <option value="Salle A">Salle A</option>
                      <option value="Salle B">Salle B</option>
                      <option value="Salle C">Salle C</option>
                    </select>
                    <?php
                      } else {
                    ?>
                    <label for="salle"><?php echo $salle['salle'] ?></label>
                    <div class="d-flex">
                      <i class="fas fa-book-open position-awesome-sujet"></i>
                      <select class="custom-select pl-5" name="salle_id" id="salle_id">
                        <option value="">--<?php echo $salle['salle'] ?>--</option>
                        <option value="Salle A">Salle A</option>
                        <option value="Salle B">Salle B</option>
                        <option value="Salle C">Salle C</option>
                      </select>
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" class="text-center mx-auto w-100 my-3"><h2><?php echo $salle['location_date'] ?></h2></label>
                <div class="row justify-content-around mt-2 align-items-center">
                  <div class='col-md-4'>
                    <?php
                      if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div lang="ar" dir="rtl" class="text-right">
                      <label for="exampleInputEmail1" lang="ar" dir="rtl"><?php echo $salle['date'] ?></label>
                    </div>
                    <?php
                      }else{
                    ?>
                    <label for="exampleInputEmail1"><?php echo $salle['date'] ?></label>
                    <?php
                      }
                    ?>
                    <div class="d-flex">
                      <i class="fas fa-calendar position-awesome"></i>
                      <input type="date" class="form-control pl-5" id="date_salle" name="date_salle" value="<?php echo isset($_POST['date_salle']) ? $_POST['date_salle'] : '' ?>">
                    </div>
                  </div>
                  <div class='col-md-4'>
                    <!--<input type="time" step="3600000" min="08:00" max="18:00">-->
                    <?php
                      if ($_SESSION['lang'] == "ar") {
                    ?>
                    <div class="text-right" dir="rtl" lang="ar">
                      <label for="heur_debut"><?php echo $salle['debut'] ?></label>
                    </div>
                    <?php
                      }else{
                    ?>
                    <label for="heur_debut"><?php echo $salle['debut'] ?></label>
                    <?php
                      }
                    ?>
                    <div class="d-flex">
                      <i class="fas fa-clock position-awesome"></i>
                      <select class="custom-select pl-5" id="time_debut" name="time_debut" value="<?php echo isset($_POST['time_debut']) ? $_POST['time_debut'] : '' ?>">
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                      </select>
                    </div>
                  </div>
                  <div class='col-md-4'>
                  <?php
                    if ($_SESSION['lang'] == "ar") {
                  ?>
                  <div class="text-right" dir="rtl" lang="ar">
                    <label for="heur_debut"><?php echo $salle['fin'] ?></label>
                  </div>
                  <?php
                    }else{
                  ?>
                  <label for="heur_debut"><?php echo $salle['fin'] ?></label>
                  <?php
                    }
                  ?>
                  <div class="d-flex">
                    <i class="fas fa-clock position-awesome"></i>
                    <select class="custom-select pl-5" name="time_fin" id="time_fin" value="<?php echo isset($_POST['time_fin']) ? $_POST['time_fin'] : '' ?>">
                      <option value="09:00">09:00</option>
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="12:00">12:00</option>
                      <option value="15:00">15:00</option>
                      <option value="16:00">16:00</option>
                      <option value="17:00">17:00</option>
                      <option value="18:00">18:00</option>
                    </select>
                </div>
                </div>
              </div>
              <div id="show-disponibilite"></div>
              <?php
                if ($_SESSION['lang'] == "ar") {
              ?>
              <div id="errors_arab" lang="ar" dir="rtl"></div>
              <?php
                } else {
              ?>
              <div id="errors"></div>
              <?php
                }
              ?>
              <div class="mt-3 text-center">
                <input type="hidden" name="reservaion_salle" id="reservaion_salle" value="">
                <button class="btn btn-primary" name="availability" id="availability"><?php echo $salle['verifier'] ?></button>
              </div>
            </div>
            <div class="form-group">
              <?php
                if ($_SESSION['lang'] == "ar") {
              ?>
              <div  dir="rtl" lang="ar" class="text-right">
                <label for="commentaire_reservation"><?php echo $salle['comment'] ?></label>
              </div>
              <textarea class="form-control text-right" id="commentaire_reservation" name="commentaire_reservation" rows="6"><?php echo isset($_POST['commentaire_reservation']) ? $_POST['commentaire_reservation'] : '' ?></textarea>
              <?php
                }else{
              ?>
              <label for="commentaire_reservation"><?php echo $salle['comment'] ?></label>
              <textarea class="form-control" id="commentaire_reservation" name="commentaire_reservation" rows="6"><?php echo isset($_POST['commentaire_reservation']) ? $_POST['commentaire_reservation'] : '' ?></textarea>
              <?php
                }
              ?>
            </div>
            <div class="text-center">      
              <button class="btn btn-primary" id="submit_salle" name="submit_salle" style="border-radius:0 !important"><?php echo $salle['reservez'] ?></button>
            </div>
            <div id="result"></div>
          </div>
        </div>
      </div>
      <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
        <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
      </div>
      <?php include_once "includes/footer.php";?>
    </div>
      <script>
        $(document).ready(function(){
          $("#submit_salle").click(function() {
            var reservation_nom = $("#reservation_nom").val();
            var email_reservation = $("#email_reservation").val();
            var reservation_telephone = $("#reservation_telephone").val();
            var commentaire_reservation = $("#commentaire_reservation").val();
            var salle_id = $("#salle_id").val();
            var date_salle = $("#date_salle").val();
            var time_debut = $("#time_debut").val();
            var time_fin = $("#time_fin").val();
            if(reservation_nom == '' && email_reservation == '' && reservation_telephone == '' && commentaire_reservation == '' && date_salle == '' && salle_id ==''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez remplir tous les champs</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا اكمل جميع الحقول</div>');
              $("#show-disponibilite").hide();
            }else if(salle_id == ''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir une salle</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">المرجو اختيار قاعاة الدرس</div>');
              $("#show-disponibilite").hide();
            }else if(reservation_nom== ''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre nom</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء إدخال اسمك</div>');
              $("#show-disponibilite").hide();
            }else if(reservation_telephone == ''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre numéro de téléphone</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">يرجى إدخال رقم الهاتف الخاص بك</div>');
              $("#show-disponibilite").hide();
            }else if(email_reservation == ''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir un email</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء إدخال بريد إلكتروني</div>');
              $("#show-disponibilite").hide();
            }else if(date_salle== ''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir une date</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء اختيار التاريخ</div>');
              $("#show-disponibilite").hide();
            }else if(commentaire_reservation == ''){
              $("#errors").show();
              $("#errors_arab").show();
              $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre commentaire</div>');
              $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء إدخال تعليقك</div>');
              $("#show-disponibilite").hide();
            }else{
              $.post( "functions/traitement.php",{reservation_nom: reservation_nom, email_reservation: email_reservation, 
                commentaire_reservation:commentaire_reservation, reservation_telephone:reservation_telephone, salle_id:salle_id, 
                date_salle:date_salle, time_debut:time_debut, time_fin:time_fin,action:'add_reservation'}, function( result ) {
                $("#show-disponibilite").hide();
                $("#result").show();
                $('#result').html(result);
                $("#reservation_nom").val('');
                $("#email_reservation").val('');
                $("#reservation_telephone").val('');
                $("#commentaire_reservation").val('');
                $("#errors").hide();
                $("#errors_arab").hide();
                setTimeout(cacher, 3000);
                  function cacher(){
                    $('#result').fadeOut();
                  }
              });
            }
          });
        })
      </script>
      <script>
        $(document).ready(function(){
          $("#availability").click(function() {
            var date_salle = $("#date_salle").val();
            var time_debut = $("#time_debut").val();
            var time_fin = $("#time_fin").val();
            var reservaion_salle = $("#reservaion_salle").val();
            $.post("functions/traitement.php",{ date_salle:date_salle, time_debut:time_debut, time_fin:time_fin, 
              reservaion_salle:reservaion_salle, action:'verifier_reservation'}, function( result ) {
              $("#errors").hide();
              $("#errors_arab").hide();
              $("#show-disponibilite").show();
              $('#show-disponibilite').html(result);
            });
          });
        })
      </script>
      <script>
        $(document).ready(function(){
          $('#salle_id').on('change', function() {
            $('#reservaion_salle').val(this.value);
          });
        })
      </script>
      <script>
        $(document).ready(function (){
          $(".fancybox").fancybox({
		        maxWidth: 1200,
		        maxHeight: 600,
		        width: '70%',
		        height: '70%',
	        });
        })
      </script>
      <script>
        $(document).ready(function(){
          $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
          });
          $(".zoom").hover(function(){
            $(this).addClass('transition');
          },
          function(){
            $(this).removeClass('transition');
          });
        });
      </script>
    </body>
</html>
