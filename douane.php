<?php
    include_once "header.php";
    include_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégoratsion de la douane</title>
</head>
<body>
  <div class="div-background">
    <header class="header">
      <div class="container">
        <?php
          if(isset($_POST['douane_submit'])){
            $data->insertdouane();
          }
      ?>
        <div class="text-center pt-3 text-color ">
          <h2 class="pt-4"> La Catégorisation au Statut de Douane</h2>
          <hr class="hr-width">
        </div>
        <div class="row">
          <div class="col-md-12 mt-4 col-lg-6 bg-white py-3 ">
              <img src="images/630.jpg" class="img-fluid">
          </div>
          <div class="col-md-12 mt-4 col-lg-6 bg-white py-3 ">
            <h4 class="mb-4 text-center">Le status douane pourquoi ?</h4> 
           <p class="text-justify">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker..</p>
          </div>
        </div>
      </div>
    </header>
    <br><br>
    <div>
    <div class="text-center pt-3 text-color">
      <h2 class="pt-4">Catégorisation de la douane</h2>
      <hr class="hr-width">
    </div>
    <br>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
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
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <center><img src="images/class_a.jpg" class="d-block " width="70%" alt="..."></center>
        <div class="carousel-caption d-none d-md-block">
          <h1>Class B</h1>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <center><img src="images/630.jpg" class="d-block " width="70%" alt="..."></center>
        <div class="carousel-caption d-none d-md-block">
          <h1>Class SS</h1>
          <p>Some representative placeholder content for the third slide.</p>
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
  </div>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="services-box">
          <div class="service">
            <div class="flip-box">
              <div class="flip-box-inner">
                <div class="flip-box-front">
                  <h2>Classe A</h2>
                </div>
                <div class="flip-box-back py-3">
                  <h5>Classe A</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="">Choisir</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services-box">
          <div class="service">
            <div class="flip-box">
              <div class="flip-box-inner">
                <div class="flip-box-front">
                  <h2>Classe B</h2>
                </div>
                <div class="flip-box-back py-3">
                  <h5>Classe A</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="">Choisir</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services-box">
          <div class="service">
            <div class="flip-box">
              <div class="flip-box-inner">
                <div class="flip-box-front">
                  <h2>Classe SS</h2>
                </div>
                <div class="flip-box-back py-3">
                  <h5>Classe A</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id="">Choisir</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    include_once "footer.php";
  ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Choisir une catégorisation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST">
          <div class="row justify-content-center mt-3">
            <div class="col-md-8">
              <div class="form-group">
                <div class="d-flex">
                  <i class="fas fa-user position-awesome"></i>
                  <input type="text" class="form-control pl-5" name="douane_nom" id="douane_nom" placeholder="Nom complet" required>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="d-flex">
                  <i class="fas fa-envelope position-awesome-email"></i>
                  <input type="email" class="form-control pl-5" name="douane_email" id="douane_email" placeholder="Email" required>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="d-flex">
                  <i class="fas fa-book-open position-awesome-sujet"></i>
                  <select class="custom-select px-5" name="douane_categorie" id="douane_categorie">
                    <option value="">--Choisir votre Catégorie--</option>
                    <option value="Classe A">Classe A</option>
                    <option value="Classe B">Classe B</option>
                    <option value="Classe SS">Classe SS</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <textarea class="form-control" id="douane_message" name="douane_message" rows="6"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" id="iso_submit" name="douane_submit">Choisir votre catégorie</button>
              </div>
            </div>
          </div>
          </form>
          <div class="modal-body">
            <div id="load_data">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
</body>
</html>