<?php include_once "session.php";?>
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
    <title><?php echo $title['Accompagnement'] ?></title>
  </head>
  <body>
    <?php include_once "navbar.php";?>
    <div class="div-background" id="top">
      <div class="container">
        <?php
          if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
            unset($_SESSION['status']);
          }
        ?>
          <div class="text-center pt-3 text-color">
            <h1 class="text-center"><?php echo $accompagenemt['accompagnement'] ?></h1>
            <hr class="hr-width">
          </div>
          <div class="row align-items-center bg-white py-3">
            <div class="col-md-12">
              <h2 class="text-center"><?php echo $accompagenemt['pourquoi'] ?> <span class="iso-style"><?php echo $accompagenemt['ISO'] ?></span></h2>
            </div>
            <div class="col-md-12 mt-4 col-lg-6">
              <img src="images/iso-9001.jpg" class="img-fluid">
            </div>
            <div class="col-md-12 mt-4 col-lg-6">
              <br>
              <p class="text-justify">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
                Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
              </p>
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
            <div class="col-md-4 mt-4 col-lg-4">
              <div class="services-box">
                <div class="service">
                  <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">  
                        <h2>ISO 9001</h2>
                        <hr>
                      </div>
                      <div class="flip-box-back">
                        <h5>ISO 9001</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                        <div class="text-center">
                          <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-4 col-lg-4">
              <div class="services-box">
                <div class="service">
                  <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">  
                        <h2>ISO 28000</h2>
                        <hr>
                      </div>
                      <div class="flip-box-back">
                        <h5>ISO 28000</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                        <div class="text-center">
                          <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-4 col-lg-4">
              <div class="services-box">
                <div class="service">
                  <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">  
                        <h2>ISO 39001</h2>
                        <hr>
                      </div>
                      <div class="flip-box-back">
                        <h5>ISO 39001</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                        <div class="text-center">
                          <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-4 col-lg-4">
              <div class="services-box">
                <div class="service">
                  <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">  
                        <h2>ISO 45001</h2>
                        <hr>
                      </div>
                      <div class="flip-box-back">
                        <h5>ISO 45001</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                        <div class="text-center">
                          <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-4 col-lg-4">
              <div class="services-box">
                <div class="service">
                  <div class="flip-box">
                    <div class="flip-box-inner">
                      <div class="flip-box-front">  
                        <h2>ISO 14001</h2>
                        <hr>
                      </div>
                      <div class="flip-box-back">
                        <h5>ISO 14001</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, eos.</p>
                        <div class="text-center">
                          <button type="button" class="btn btn-primary btn-id rounded-0" id="btn-id" data-toggle="modal" data-target="#exampleModal" data-id=""><?php echo $accompagenemt['choisir'] ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="container mt-3">
            <div class="row bg-white py-3 align-items-center">
              <div class="col-md-12">
                <h2 class="text-center mb-3"><?php echo $accompagenemt['accompa'] ?> <span class="iso-style">ISO</span></h2>
              </div>
              <div class="col-md-12 mt-4 col-lg-6">   
                <p class="text-justify">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker..</p>
              </div>
              <div class="col-md-12 mt-4 col-lg-6"> 
                <img src="images/iso-9001.jpg" class="img-fluid">
                <br><br>
              </div>
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
                <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo $accompagenemt['choisir_modal'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="error"></div>
              <form action="" method="POST">
                <div class="row justify-content-center mt-3">
                  <div class="col-md-8">
                    <div class="form-group">
                      <div class="d-flex">
                        <i class="fas fa-user position-awesome"></i>
                        <input type="text" class="form-control pl-5" name="iso_nom" id="iso_nom" placeholder="Nom complet">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <div class="d-flex">
                        <i class="fas fa-envelope position-awesome-email"></i>
                        <input type="email" class="form-control pl-5" name="iso_email" id="iso_email" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
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
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <textarea class="form-control" id="iso_message" name="iso_message" rows="6"></textarea>
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $accompagenemt['fermer'] ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include_once "footer.php";?> 
    </div>
    <script>
      $('#iso_submit').click(function(e){
        e.preventDefault();
        var iso_nom = $('#iso_nom').val();
        var iso_email = $('#iso_email').val();
        var iso_categorie = $('#iso_categorie').val();
        var iso_message = $('#iso_message').val();
        if(iso_nom == '' && iso_email == '' && iso_categorie == ''){
          $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez remplir tous les champs</div>');
        }else if(iso_nom == ''){
          $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre nom</div>');
        }else if(iso_email == ''){
          $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez saisir votre email</div>');
        }else if(iso_categorie == ''){
          $('#error').html('<div class="alert alert-danger text-center mt-2" role="alert" id="btn-fermer">Veuillez choisir la catégorie</div>');
        }else{
          $.post( "functions/traitement.php",{iso_nom: iso_nom, iso_email: iso_email, iso_categorie:iso_categorie, iso_message:iso_message, 
          action:'add_iso'}, function( result ) {
            window.location.href='conseil';
          });
        }
      })
    </script>
  </body>
</html>
<?php
?>