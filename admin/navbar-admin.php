<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }
</style>
<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
<input type="checkbox" id="nav-toggle">
<div class="sidebar" style="overflow-y: auto; overflow-x:hidden">
    <div class="sidebar-brand">
        <!-- <img src="images/logo.jpeg" alt="" class="img-fluid img-respo" style="width:13rem"> -->
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="dashboard">
                    <span class="fas fa-tachometer-alt"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="formations">
                    <span class="fas fa-school"></span>
                    <span>Formations</span>
                </a>
            </li>
            <li>
                <a href="module">
                    <span class="fas fa-book-open"></span>
                    <span>Modules</span>
                </a>
            </li>
            <li>
                <a href="stagiaire">
                    <span class="fas fa-user-graduate"></span>
                    <span>Stagiaires</span>
                </a>
            </li>
            <li>
                <a href="demandes">
                    <span class="fas fa-graduation-cap"></span>
                    <span>Demandes</span>
                </a>
            </li>
            <li>
                <a href="salles">
                    <span class="fas fa-chalkboard-teacher"></span>
                    <span>Salles</span>
                </a>
            </li>
            <li>
                <a href="accompagnement-conseil" class="pr-2">
                    <span class="fas fa-question"></span>
                    <span>Accomp. & conseil</span>
                </a>
            </li>
            <li>
                <a href="articles">
                    <span class="fas fa-newspaper"></span>
                    <span>Articles</span>
                </a>
            </li>
            <li>
                <a href="contacts">
                    <span class="fas fa-address-card"></span>
                    <span>Contacts</span>
                </a>
            </li>
            <li>
                <a href="../index">
                    <span class="fas fa-home"></span>
                    <span>Accueil</span>
                </a>
            </li>
            <li>
                <a href="../includes/logout-admin">
                    <span class="fas fa-sign-out-alt"></span>
                    <span>Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('ul li a').forEach(link => {
        if(link.href.includes(`${activePage}`)){
            link.classList.add('active');
        }
    })
</script>