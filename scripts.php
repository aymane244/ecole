<script>
    window.onscroll = function (){
        if(document.body.scrollTop >= 80 || document.documentElement.scrollTop > 80){
            document.getElementById("navbar").classList.add("nav-height");
            document.getElementById("navbar").style.paddingTop = "2px"
            document.getElementById("navbar").style.paddingBottom = "2px"
            document.getElementById("btn-etudiant").style.paddingTop = "10px"
            document.getElementById("btn-etudiant").style.paddingBottom = "10px"
        }else{
            document.getElementById("navbar").classList.remove("nav-height")
            document.getElementById("navbar").style.paddingTop = "4px"
            document.getElementById("navbar").style.paddingBottom = "4px"
            document.getElementById("btn-etudiant").style.paddingTop = "16px"
            document.getElementById("btn-etudiant").style.paddingBottom = "16px"
        }
        if(document.body.scrollTop || document.documentElement.scrollTop){
            document.getElementById("div-btn").classList.remove("btn-fade")
        }else{
            document.getElementById("div-btn").classList.add("btn-fade")
        }
    };
</script>
<script>
    function menudisplay(){
        document.getElementById("div-show").classList.toggle("menu-show");
        document.getElementById("bar-toggle").classList.toggle("fa-times");
        document.getElementById("menu-show").classList.toggle("menu-text");
        document.getElementById("menu-show").classList.add("trans");
    }
</script>
<script>
    function fermer(){
        document.getElementById("btn-fermer").style.display = "none";
    }
</script>
<script>
    function diplome(){
        document.getElementById('attestation').style.display='none';
        document.getElementById('diplome').style.display='block';
    }
    function attestation(){
        document.getElementById('diplome').style.display='none';
        document.getElementById('attestation').style.display='block';
    }
</script>
<script>
    function ISO(){
        document.getElementById('douane').style.display='none';
        document.getElementById('iso').style.display='block';
    }
    function douane(){
        document.getElementById('iso').style.display='none';
        document.getElementById('douane').style.display='block';
    }
</script>
<script>
    function frensh(){
        document.getElementById("frensh").style.display="block";
        document.getElementById("arabe").style.display="none";
    }
    function arabe(){
        document.getElementById("arabe").style.display="block";
        document.getElementById("frensh").style.display="none";
    }
</script>
<script>
    function afficher(){
        document.getElementById("formation").style.display="block";
        document.getElementById("divbtn").style.display="block";
    }
</script>