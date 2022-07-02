<h2>
    <label for="nav-toggle">
        <span class="fas fa-bars" style="cursor: pointer"></span>
    </label>
</h2>
<div class="user-wrapper">
    <?php
        if($_SESSION['image'] == './images/admin/'){
    ?>
    <img src="images/admin/unknown.jpg" width="40px" height="40px" alt="profile-img">
    <?php       
        }else{
    ?>
    <img src="<?php $_SESSION['image'] ?>" width="40px" height="40px" alt="profile-img">
    <?php           
        }
    ?>
    <div class="">
        <h4><?php echo $_SESSION['prenom'].' '.$_SESSION['nom'] ?></h4>
        <small>Admin</small>
    </div>
</div>