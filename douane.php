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
      min-height: 17rem !important;
    }
  </style>
  <title><?php echo $title['Categoratsion'] ?></title>
</head>

<body>
  <div id="top"></div>
  <?php include_once "navbar.php"; ?>
  <div class="div-background">
    <div class="text-white text-center text-big div-header">
      <h2 class="h1-size-big"><?php echo $douane['categorisation'] ?></h2>
    </div>
    <div style="position:relative">
      <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
      <img src="images/view/customs_11zon.jpg" alt="" class="d-block img-fluid" style="width:100%;">
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
      <div class="row align-items-center bg-white">
        
        <?php
          if ($_SESSION['lang'] == "ar") {
        ?>
        <div class="col-md-12 mt-4 col-lg-6 py-3 ">
          <h4 class="mb-4 text-center"><?php echo $douane['status'] ?></h4>
          <p class="text-justify text-right" dir='rtl' lang='ar' >
            <?php echo $douane['status_text'] ?>
            <br><br>
            <strong><?php echo $douane['status_avantage'] ?></strong> 
            <ul dir='rtl' lang='ar' class="text-right">
              <li><?php echo $douane['status_li_1'] ?></li>
              <li><?php echo $douane['status_li_2'] ?></li>
              <li><?php echo $douane['status_li_3'] ?></li>
              <li><?php echo $douane['status_li_4'] ?></li>
            </ul>
          </p>
        </div>
        <div class="col-md-12 mt-4 col-lg-6 py-3">
          <img src="images/view/630.jpg" class="img-fluid">
        </div>
        <?php
          } else {
        ?>
        <div class="col-md-12 mt-4 col-lg-6 py-3">
          <img src="images/view/630.jpg" class="img-fluid">
        </div>
        <div class="col-md-12 mt-4 col-lg-6 py-3 ">
          <h4 class="mb-4 text-center"><?php echo $douane['status'] ?></h4>
          <p class="text-justify">
            <?php echo $douane['status_text'] ?>
            <br><br>
            <strong><?php echo $douane['status_avantage'] ?></strong> 
            <ul>
              <li><?php echo $douane['status_li_1'] ?></li>
              <li><?php echo $douane['status_li_2'] ?></li>
              <li><?php echo $douane['status_li_3'] ?></li>
              <li><?php echo $douane['status_li_4'] ?></li>
            </ul>
          </p>
        </div>
        <?php
          }
        ?>
      </div>
    </div>
    <br><br>
    <div>
      <div class="text-center pt-3 text-color">
        <h2 class="pt-4"><?php echo $douane['douane'] ?></h2>
        <hr class="hr-width">
      </div>
      <br>
    </div>
    <div class="container">
      <div class="card-list">
        <div class="row">
          <div class="col-md-4 mt-4">
            <div class="card pb-4">
              <a class=" card-im" style="background-image: url(images/view/OFF.jpg);position: relative;">
                <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
              </a>
              <h1 class="text-white text-center" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:110px;">Class A</h1>
              <div class="card-description mt-3 px-3">
                <?php
                  if ($_SESSION['lang'] == "ar") {
                ?>
                <p dir='rtl' lang='ar' class="text-right">
                  <?php echo $douane['class_1'] ?>
                </p>
                <?php
                  } else {
                ?>
                <p>
                  <?php echo $douane['class_1'] ?>
                </p>
                <?php
                  }
                ?>
              </div>
              <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
            </div>
          </div>
          <div class="col-md-4 mt-4">
            <div class="card pb-4">
              <a class="card-im" style="background-image: url(images/view/OFF.jpg);position: relative;">
                <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
              </a>
              <h1 class="text-white text-center" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:110px;">Class B</h1>
              <div class="card-description mt-3 px-3">
                <?php
                  if ($_SESSION['lang'] == "ar") {
                ?>
                <p dir='rtl' lang='ar' class="text-right">
                  <?php echo $douane['class_2'] ?>
                </p>
                <?php
                  } else {
                ?>
                <p>
                  <?php echo $douane['class_2'] ?>
                </p>
                <?php
                  }
                ?>
              </div>
              <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
            </div>
          </div>
          <!-- <div class="col-md-4 mt-4">
            <div class="card pb-4">
              <a class="card-im" style="background-image: url(images/view/OFF.jpg);position: relative;">
                <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
              </a>
              <h1 class="text-white text-center" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:150px;">Class SS</h1>
              <div class="card-description mt-3">
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                  avant de polices de texte.</p>
              </div>
              <button type="button" class="btn btn-dark mx-5 mt-4" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
            </div>
          </div> -->
        </div>
      </div>
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
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $douane['choisir_select'] ?></h5>
            <?php
            } else {
            ?>
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $douane['choisir_select'] ?></h5>
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
            <div id="errors_arab" class="mx-5"></div>
          <?php
          } else {
          ?>
            <div id="errors" class="mx-5"></div>
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
                      <i class="fas fa-user position-awesome-arab"></i>
                    </div>
                    <input type="text" class="form-control pr-5" dir="rtl" lang="ar" name="douane_nom" id="douane_nom" placeholder="الاسم الكامل">
                  <?php
                  } else {
                  ?>
                    <div class="d-flex">
                      <i class="fas fa-user position-awesome"></i>
                      <input type="text" class="form-control pl-5" name="douane_nom" id="douane_nom" placeholder="Nom complet">
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
                      <i class="fas fa-envelope position-awesome-arab"></i>
                    </div>
                    <input type="email" class="form-control pr-5" dir="rtl" lang="ar" name="douane_email" id="douane_email" placeholder="البريد الإلكتروني" style="text-align: right;">
                  <?php
                  } else {
                  ?>
                    <div class="d-flex">
                      <i class="fas fa-envelope position-awesome-email"></i>
                      <input type="email" class="form-control pl-5" name="douane_email" id="douane_email" placeholder="Email">
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <!-- <div class="col-md-8">
                <div class="form-group">
                  <?php
                  if ($_SESSION['lang'] == "ar") {
                  ?>
                    <div style="float: right;">
                      <i class="fas fa-book-open position-awesome-arab"></i>
                    </div>
                    <select class="custom-select pr-5" name="douane_categorie" id="douane_categorie" dir="rtl" lang="ar">
                      <option value="">--<?php echo $douane['choisir_select'] ?>--</option>
                      <option value="Classe A">Classe A</option>
                      <option value="Classe B">Classe B</option>
                      <option value="Classe SS">Classe SS</option>
                    </select>
                  <?php
                  } else {
                  ?>
                    <div class="d-flex">
                      <i class="fas fa-book-open position-awesome-sujet"></i>
                      <select class="custom-select pl-5" name="douane_categorie" id="douane_categorie">
                        <option value="">--<?php echo $douane['choisir_select'] ?>--</option>
                        <option value="Classe A">Classe A</option>
                        <option value="Classe B">Classe B</option>
                        <option value="Classe SS">Classe SS</option>
                      </select>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div> -->
              <div class="col-md-8">
                <div class="form-group">
                  <?php
                  if ($_SESSION['lang'] == "ar") {
                  ?>
                    <textarea class="form-control text-right" id="douane_message" name="douane_message" rows="6"></textarea>
                  <?php
                  } else {
                  ?>
                    <textarea class="form-control" id="douane_message" name="douane_message" rows="6"></textarea>
                  <?php
                  }
                  ?>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="douane_submit" name="douane_submit"><?php echo $douane['choisir_select'] ?></button>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-body">
            <div id="load_data">
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
    <script>
      $('#douane_submit').click(function(e) {
        e.preventDefault();
        var douane_nom = $('#douane_nom').val();
        var douane_email = $('#douane_email').val();
        // var douane_categorie = $('#douane_categorie').val();
        var douane_message = $('#douane_message').val();
        if (douane_nom == '' && douane_email == '' && douane_categorie == '') {
          $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez remplir tous les champs</div>');
          $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا اكمل جميع الحقول</div>');
        } else if (douane_nom == '') {
          $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre nom</div>');
          $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">من فضلك أدخل إسمك</div>');
        } else if (douane_email == '') {
          $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre email</div>');
          $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">رجاءا أدخل بريدك الإلكتروني</div>');
        // } else if (douane_categorie == '') {
        //   $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir la catégorie</div>');
        //   $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء اختيار الفئة</div>');
        } else {
          $.post("functions/traitement.php", {
            douane_nom: douane_nom,
            douane_email: douane_email,
            // douane_categorie: douane_categorie,
            douane_message: douane_message,
            action: 'add_douane'
          }, function(result) {
            window.location.href = 'douane';
          });
        }
      })
    </script>
</body>

</html>