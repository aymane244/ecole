<?php
    include_once "header.php";
    include_once "navbar_admin.php";
    $data = new Etudiant($db);
    if(!isset($_SESSION['username']) && !isset($_SESSION['pwrd'])){
        echo "<script>window.location.href='login_admin'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<?php
    $contacts = $data->getContacts();
?>
<body>
    <div class="container" id="div-push">
        <?php
            if(isset($_SESSION['status'])){
        ?>
        <div class='alert alert-success text-center mt-2' role='alert'><?php echo $_SESSION['status']?></div>
        <?php
                unset($_SESSION['status']);
            }
        ?>
        <!--<div class="mt-4 align-items-center">
            <a href="ajouter-article" target="_blank" class="btn btn-primary">
                <i class="far fa-share-square"></i> Envoyer un email
            </a>
        </div>-->
        <div class="text-center my-3">
            <h2><i class="fas fa-address-card"></i> Page Contacts</h2>
        </div>
        <table class="table table-hover mt-5">
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="9">ARTL Nord</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    $i=1;
                    foreach($contacts as $contact){
                ?>
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo $contact['con_nom'];?></td>
                    <td><?php echo $contact['con_email'];?></td>
                    <td><?php echo $contact['con_sujet'];?></td>
                    <td><?php echo $contact['con_message'];?></td>
                    <td class="row-style">
                        <form action="" method="POST">
                            <input type="hidden" name="contact_id" value="<?php echo $contact['con_id']?>">
                            <button type="submit" class="btn-style" name="submit" onclick='return confirm("Voulez-vous supprimer ce message")'>
                                <i class="fas fa-trash-alt text-danger awesome-size"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $data->deleteContacts($_POST['contact_id']);
    }
?>