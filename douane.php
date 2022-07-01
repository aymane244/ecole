<?php include_once "session.php"; ?>
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
  <style>
    .card {
      width: 100% !important;        
      font-size: 1rem;
      text-decoration: none;
      overflow: hidden;
      box-shadow: 0 0 3rem -1rem rgba(0, 0, 0, 0.5);
      transition: transform 0.1s ease-in-out, box-shadow 0.1s;
    }
    .card:hover {
      transform: translateY(-0.5rem) scale(1.0125);
      box-shadow: 0 0.5em 3rem -1rem rgba(0, 0, 0, 0.5);
    }
  </style>
  <title><?php echo $title['Categoratsion'] ?></title>
</head>

<body>
  <div id="top"></div>
  <?php include_once "navbar.php"; ?>
  <div class="div-background">
    <div class="text-white text-center text-big div-header">
      <h2><?php echo $douane['categorisation'] ?></h2>
    </div>
    <div style="height: 100%; position:relative">
      <div style="background-color: black;opacity: 0.5;top: 0;left: 0;width: 100%;height: 100%;position: absolute; z-index:2"></div>
      <img src="images/douane.png" alt="" class="d-block img-fluid" style="width:100%;">
    </div>
    <?php
    if (isset($_SESSION['status'])) {
    ?>
      <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status'] ?></div>
    <?php
      unset($_SESSION['status']);
    }
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4 col-lg-6 bg-white py-3 ">
          <img src="images/630.jpg" class="img-fluid">
        </div>
        <div class="col-md-12 mt-4 col-lg-6 bg-white py-3 ">
          <h4 class="mb-4 text-center"><?php echo $douane['status'] ?></h4>
          <p class="text-justify">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker..</p>
        </div>
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
    <!-- <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <center><img src="images/DOUANE 1.jpg" class="d-block " width="70%" alt="..."></center>
            <div class="carousel-caption d-none d-md-block">
              <h1>Class A</h1>
              <p><?php echo $douane['slide_a'] ?>.</p>
            </div>
          </div>
          <div class="carousel-item">
            <center><img src="images/class_a.jpg" class="d-block " width="70%" alt="..."></center>
            <div class="carousel-caption d-none d-md-block">
              <h1>Class B</h1>
              <p><?php echo $douane['slide_b'] ?>.</p>
            </div>
          </div>
          <div class="carousel-item">
            <center><img src="images/630.jpg" class="d-block " width="70%" alt="..."></center>
            <div class="carousel-caption d-none d-md-block">
              <h1>Class SS</h1>
              <p><?php echo $douane['slide_c'] ?>.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div> -->
    <div class="container">
      <ul class="card-list">
        <div class="row">
          <div class="col-md-4 mt-4">
            <li class="card pb-4">
                <a class=" card-im" style="background-image: url(images/OFF.jpg);position: relative;">
              <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
              </a>
              <h1 class="text-white text-center" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:150px;">Class A</h1>
              <div class="card-description mt-3">
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                  avant de polices de texte.</p>
              </div>
              <button type="button" class="btn btn-dark mx-5" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
            </li>
          </div>
          <div class="col-md-4 mt-4">
            <li class="card pb-4">
              <a class="card-im" style="background-image: url(images/OFF.jpg);position: relative;">
                <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
              </a>
              <h1 class="text-white text-center" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:150px;">Class B</h1>
              <div class="card-description mt-3">
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                  avant de polices de texte.</p>
              </div>
              <button type="button" class="btn btn-dark mx-5" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
            </li>
          </div>
          <div class="col-md-4 mt-4">
            <li class="card pb-4">
              <a class="card-im" style="background-image: url(images/OFF.jpg);position: relative;">
                <div style="background-color:rgba(0,0,0,0.4); z-index: 1;  position:absolute; top:0; left:0; width:100%; height:100%;"></div>
              </a>
              <h1 class="text-white text-center" style="position: absolute; z-index:4 ; filter: none !important; margin-left: auto; margin-right:auto; width:100%; margin-top:150px;">Class SS</h1>
              <div class="card-description mt-3">
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                  avant de polices de texte.</p>
              </div>
              <button type="button" class="btn btn-dark mx-5" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
            </li>
          </div>
        </div>
      </ul>
    </div>
    <div class="div-btn fixed-bottom mb-2 mx-2" id="div-btn">
      <a href="#top" class="btn-top px-3 float-right py-2 rounded"><i class="fas fa-long-arrow-alt-up text-white"></i></a>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo $douane['choisir_select'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
            if ($_SESSION['lang'] == "ar") {
          ?>
          <div id="errors_arab"></div>
          <?php
            } else {
          ?>
          <div id="errors"></div>
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
                  <div class="d-flex">
                    <i class="fas fa-user position-awesome_arab_modal"></i>
                    <input type="text" class="form-control pr-5" name="douane_nom" id="douane_nom" placeholder="الاسم الكامل" style="text-align: right;">
                  </div>
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
                  <div class="d-flex">
                    <i class="fas fa-envelope position-awesome_arab_modal"></i>
                    <input type="email" class="form-control pr-5" name="douane_email" id="douane_email" placeholder="البريد الإلكتروني" style="text-align: right;">
                  </div>
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
              <div class="col-md-8">
                <div class="form-group">
                  <?php
                    if ($_SESSION['lang'] == "ar") {
                  ?>
                  <div class="d-flex">
                    <i class="fas fa-book-open position-awesome_arab_modal"></i>
                    <select class="custom-select pr-5" name="douane_categorie" id="douane_categorie" style="text-align: right;">
                      <option value="">--<?php echo $douane['choisir_select'] ?>--</option>
                      <option value="Classe A">Classe A</option>
                      <option value="Classe B">Classe B</option>
                      <option value="Classe SS">Classe SS</option>
                    </select>
                  </div>
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
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <textarea class="form-control" id="douane_message" name="douane_message" rows="6"></textarea>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $accompagenemt['fermer'] ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
    <script>
      $('#douane_submit').click(function(e) {
        e.preventDefault();
        var douane_nom = $('#douane_nom').val();
        var douane_email = $('#douane_email').val();
        var douane_categorie = $('#douane_categorie').val();
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
        } else if (douane_categorie == '') {
          $('#errors').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir la catégorie</div>');
          $('#errors_arab').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">الرجاء اختيار الفئة</div>');
        } else {
          $.post("functions/traitement.php", {
            douane_nom: douane_nom,
            douane_email: douane_email,
            douane_categorie: douane_categorie,
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