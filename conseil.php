<?php include_once "session.php"; ?>
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
  <style>
    .card {
      width: 100% !important;
      font-size: 1rem;
      text-decoration: none;
      overflow: hidden;
      box-shadow: 0 0 3rem -1rem rgba(0, 0, 0, 0.5);
      transition: transform 0.1s ease-in-out, box-shadow 0.1s;
    }

    .card-im {
      min-height: 20rem !important;
    }
  </style>
  <title><?php echo $title['Accompagnement'] ?></title>
</head>

<body>
  <div id="top"></div>
  <?php include_once "navbar.php"; ?>
  <div class="div-background">
    <div class="text-white text-center text-big div-header">
      <h1 class="h1-size-big"><?php echo $accompagenemt['accompagnement'] ?></h1>
    </div>
    <div style="position:relative">
      <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
      <img src="images/view/iso_11zon.jpg" alt="" class="d-block img-fluid" style="width:100%;">
    </div>
    <div class="container mt-5">
      <?php
      if (isset($_SESSION['status'])) {
      ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
      <?php
        unset($_SESSION['status']);
      }
      ?>
      <div class="row justify-content-center">
        <div class="col-md-5 mt-4 bg-white py-3">
          <?php
            if($_SESSION['lang'] == 'ar'){
          ?>
          <h2 class="text-center mb-3" lang='ar'><span class="iso-style">ISO</span> <?php echo $accompagenemt['accompa'] ?> </h2>
          <?php
            }else{
          ?>
          <h2 class="text-center mb-3"><?php echo $accompagenemt['accompa'] ?> <span class="iso-style">ISO</span></h2>
          <?php       
            }
          ?>
          <?php
            if($_SESSION['lang'] == 'ar'){
          ?>          
          <p class="text-justify text-right" dir='rtl' lang='ar'>
            <?php echo $accompagenemt['accompa_text'] ?>
            <br><br>
            <?php echo $accompagenemt['accompa_text_2'] ?>
          </p>
          <?php
            }else{
          ?>
          <p class="text-justify">
            <?php echo $accompagenemt['accompa_text'] ?>
            <br><br>
            <?php echo $accompagenemt['accompa_text_2'] ?>
          </p>
          <?php       
            }
          ?>
        </div>
        <!-- <div class="col-md-12 mt-4 col-lg-6">
          <img src="images/view/iso-9001.jpg" class="img-fluid">
        </div> -->
        <div class="col-md-5 mt-4 bg-white py-3 ml-3">
          <?php
            if($_SESSION['lang'] == 'ar'){
          ?>
          <h2 class="text-center mb-3" lang='ar'><span class="iso-style"><?php echo $accompagenemt['ISO'] ?></span> <?php echo $accompagenemt['pourquoi'] ?> </h2>
          <p class="text-justify text-right" dir='rtl' lang='ar'><?php echo $accompagenemt['pourquoi_text'] ?></p>
          <?php
            }else{
          ?>
          <h2 class="text-center mb-3"><?php echo $accompagenemt['pourquoi'] ?> <span class="iso-style"><?php echo $accompagenemt['ISO'] ?></span></h2>
          <p class="text-justify"><?php echo $accompagenemt['pourquoi_text'] ?></p>
          <?php       
            }
          ?>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="text-center pt-2 text-color">
        <h1 class="text-center"><?php echo $accompagenemt['categorisation'] ?></h1>
        <hr class="hr-width">
      </div>
      <div class="row justify-content-center">
        <div class="card-list">
          <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
              <div class="card pb-5">
                <a class="card-im" style="background-image: url(images/view/2323.jpg);position: relative;">
                  <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                </a>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:120px;">ISO 9001 (<?php echo $accompagenemt['card_1'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <?php
                    if($_SESSION['lang'] == 'ar'){
                  ?>
                  <p class="text-right" lang="ar" dir="rtl">
                    <?php echo $accompagenemt['card_1_text'] ?>
                    <br><br>
                    <?php echo $accompagenemt['card_1_text_2'] ?>
                  </p>
                  <?php
                    }else{
                  ?>
                  <p>
                    <?php echo $accompagenemt['card_1_text'] ?>
                    <br><br>
                    <?php echo $accompagenemt['card_1_text_2'] ?>
                  </p>
                  <?php       
                    }
                  ?>
                </div>
                <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
              </div>
            </div>
            <div class="col-md-6 mt-4">
              <div class="card pb-5">
                <a class="card-im" style="background-image: url(images/view/2323.jpg);position: relative;">
                  <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                </a>
                <?php
                  if($_SESSION['lang'] == 'ar'){
                ?>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%;  margin-top:120px;">ISO 28000 (<?php echo $accompagenemt['card_2'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <p class="text-right" lang="ar" dir="rtl">
                    <?php echo $accompagenemt['card_2_text'] ?>
                  </p>
                </div>
                <?php
                  }else{
                ?>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%;  margin-top:70px;">ISO 28000 (<?php echo $accompagenemt['card_2'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <p>
                    <?php echo $accompagenemt['card_2_text'] ?>
                    <br><br>
                  </p>
                </div>
                <?php       
                  }
                ?>
                <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
              </div>
            </div>
            <div class="col-md-6 mt-4">
              <div class="card pb-5">
                <a class="card-im" style="background-image: url(images/view/2323.jpg);position: relative;">
                  <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
                </a>
                <?php
                  if($_SESSION['lang'] == 'ar'){
                ?>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%;  margin-top:120px;">ISO 39001 (<?php echo $accompagenemt['card_3'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <p class="text-right spacing" lang="ar" dir="rtl">
                    <?php echo $accompagenemt['card_3_text'] ?>
                  </p>
                </div>
                <?php
                  }else{
                ?>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%;  margin-top:100px;">ISO 39001 (<?php echo $accompagenemt['card_3'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <p class="equal-space">
                    <?php echo $accompagenemt['card_3_text'] ?>
                  </p>
                </div>
                <?php       
                  }
                ?>
                <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
              </div>
            </div>
            <div class="col-md-6 mt-4">
              <div class="card pb-5">
                <a class="card-im" style="background-image: url(images/view/2323.jpg);position: relative;">
                  <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;">
                  </div>
                </a>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%; margin-top:100px;">ISO 45001 <br> (<?php echo $accompagenemt['card_4'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <?php
                    if($_SESSION['lang'] == 'ar'){
                  ?>
                  <p class="text-right" lang="ar" dir="rtl">
                    <?php echo $accompagenemt['card_4_text'] ?>
                    <br><br>
                    <?php echo $accompagenemt['card_4_text_2'] ?>
                  </p>
                  <?php
                    }else{
                  ?>
                  <p>
                    <?php echo $accompagenemt['card_4_text'] ?>
                    <br><br>
                    <?php echo $accompagenemt['card_4_text_2'] ?>
                  </p>
                  <?php       
                    }
                  ?>
                </div>
                <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
              </div>
            </div>
            <div class="col-md-6 my-4">
              <div class="card pb-5">
                <a class="card-im" style="background-image: url(images/view/2323.jpg);position: relative;">
                  <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;">
                  </div>
                </a>
                <?php
                  if($_SESSION['lang'] == 'ar'){
                ?>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%; margin-top:120px;">ISO 14001 (<?php echo $accompagenemt['card_5'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <p class="text-right" lang="ar" dir="rtl">
                    <?php echo $accompagenemt['card_5_text'] ?>
                    <br><br>
                    <?php echo $accompagenemt['card_5_text_2'] ?>
                  </p>
                </div>
                <?php
                  }else{
                ?>
                <h1 class="text-white" style="position: absolute; z-index:4 ; filter: none !important;margin-left: auto; margin-right:auto; width:100%; margin-top:100px;">ISO 14001 (<?php echo $accompagenemt['card_5'] ?>)</h1>
                <div class="card-description mt-3 text-justify px-3">
                  <p>
                    <?php echo $accompagenemt['card_5_text'] ?>
                    <br><br>
                    <?php echo $accompagenemt['card_5_text_2'] ?>
                  </p>
                </div>
                <?php       
                  }
                ?>
                <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="container mt-3">
          <div class="row bg-white py-3 align-items-center">
            <div class="col-md-12">
              <h2 class="text-center mb-3"><?php echo $accompagenemt['accompa'] ?> <span class="iso-style">ISO</span></h2>
            </div>
            <div class="col-md-12 mt-4 col-lg-6">
              <img src="images/view/iso-9001.jpg" class="img-fluid">
            </div>
            <div class="col-md-12 mt-4 col-lg-6">
              <p class="text-justify">
                Une certification ISO garantit la conformité d’un processus, un service, une organisation ou un produit.
                L’ISO 9001 est la certification la plus connue. Une certification ISO est délivrée par l’ISO qui demeure aujourd’hui
                le plus grand organisme mondial de normalisation, crée en 1947.
                <br><br>
                L’International Organization for Standardization définit le terme certification ISO comme étant une procédure permettant à une
                tierce partie de garantir par écrit qu’un processus, produit ou service répond aux exigences propres à un référentiel.
              </p>
            </div>
          </div>
        </div> -->
      </div>
      <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
        <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <?php
              if ($_SESSION['lang'] == "ar") {
              ?>
                <div style="float:left;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <h5 class="modal-title" id="exampleModalLabel" lang="ar"><?php echo $accompagenemt['choisir_modal'] ?></h5>
              <?php
              } else {
              ?>
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $accompagenemt['choisir_modal'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <?php
              }
              ?>
            </div>
            <?php
              if ($_SESSION['lang'] == "ar") {
            ?>
            <div id="error_arab" class="mx-5"></div>
            <?php
            } else {
            ?>
            <div id="error" class="mx-5"></div>
            <?php
              }
            ?>
            <form action="" method="POST">
              <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                  <div class="form-group">
                    <?php
                    if ($_SESSION['lang'] == "ar") {
                    ?>
                      <div style="float: right;">
                        <i class="fas fa-user fa-align-right position-awesome-arab"></i>
                      </div>
                      <input type="text" class="form-control pr-5" lang="ar" name="iso_nom" id="iso_nom" placeholder="الاسم الكامل" style="text-align:right;">
                    <?php
                    } else {
                    ?>
                      <div class="d-flex">
                        <i class="fas fa-user position-awesome"></i>
                        <input type="text" class="form-control pl-5" name="iso_nom" id="iso_nom" placeholder="Nom complet">
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <?php
                    if ($_SESSION['lang'] == "ar") {
                    ?>
                      <div style="float: right;" lang="ar">
                        <i class="fas fa-envelope position-awesome-arab"></i>
                      </div>
                      <input type="email" class="form-control pr-5" lang="ar" name="iso_email" id="iso_email" style="text-align:right;" placeholder="البريد الإلكتروني">
                    <?php
                    } else {
                    ?>
                      <div class="d-flex">
                        <i class="fas fa-envelope position-awesome-email"></i>
                        <input type="email" class="form-control pl-5" name="iso_email" id="iso_email" placeholder="Email">
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <?php
                    if ($_SESSION['lang'] == "ar") {
                    ?>
                      <div style="float: right;">
                        <i class="fas fa-book-open position-awesome-arab"></i>
                      </div>
                      <select class="custom-select pr-5" name="iso_categorie" id="iso_categorie" dir="rtl" lang="ar">
                        <option value="">--<?php echo $accompagenemt['choisir_select'] ?>--</option>
                        <option value="ISO 9001">ISO 9001</option>
                        <option value="ISO 28000">ISO 28000</option>
                        <option value="ISO 39001">ISO 39001</option>
                        <option value="ISO 45001">ISO 45001</option>
                        <option value="ISO 14001">ISO 14001</option>
                      </select>
                    <?php
                    } else {
                    ?>
                      <div class="d-flex">
                        <i class="fas fa-book-open position-awesome-sujet"></i>
                        <select class="custom-select pl-5" name="iso_categorie" id="iso_categorie">
                          <option value="">--<?php echo $accompagenemt['choisir_select'] ?>--</option>
                          <option value="ISO 9001">ISO 9001</option>
                          <option value="ISO 28000">ISO 28000</option>
                          <option value="ISO 39001">ISO 39001</option>
                          <option value="ISO 45001">ISO 45001</option>
                          <option value="ISO 14001">ISO 14001</option>
                        </select>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <?php
                    if ($_SESSION['lang'] == "ar") {
                    ?>
                      <textarea class="form-control text-right" id="iso_message" name="iso_message" rows="6"></textarea>
                    <?php
                    } else {
                    ?>
                      <textarea class="form-control" id="iso_message" name="iso_message" rows="6"></textarea>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" id="iso_submit" name="iso_submit"><?php echo $accompagenemt['choisir_btn'] ?></button>
                  </div>
                </div>
              </div>
            </form>
            <div class="modal-body">
              <div id="load_data"></div>
            </div>
            <hr class="bg-light">
            <div class="text-center pb-4">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $accompagenemt['fermer'] ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once "includes/footer.php"; ?>
  </div>
  <script>
    $('#iso_submit').click(function(e) {
      e.preventDefault();
      var iso_nom = $('#iso_nom').val();
      var iso_email = $('#iso_email').val();
      var iso_categorie = $('#iso_categorie').val();
      var iso_message = $('#iso_message').val();
      if (iso_nom == '' && iso_email == '' && iso_categorie == '') {
        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez remplir tous les champs</div>');
        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا اكمل جميع الحقول</div>');
      } else if (iso_nom == '') {
        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre nom</div>');
        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">من فضلك أدخل إسمك</div>');
      } else if (iso_email == '') {
        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre email</div>');
        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا أدخل بريدك الإلكتروني</div>');
      } else if (iso_categorie == '') {
        $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir la catégorie</div>');
        $('#error_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء اختيار الفئة</div>');
      } else {
        $.post("functions/traitement.php", {
          iso_nom: iso_nom,
          iso_email: iso_email,
          iso_categorie: iso_categorie,
          iso_message: iso_message,
          action: 'add_iso'
        }, function(result) {
          window.location.href = 'conseil';
        });
      }
    })
  </script>
</body>

</html>
<?php
?>