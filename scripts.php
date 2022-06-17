<script>
    window.onscroll = function (){
        if(document.body.scrollTop >= 100 || document.documentElement.scrollTop > 100){
            document.getElementById("navbar").classList.add("nav-height");
            document.getElementById("navbar").style.paddingTop = "2px"
            document.getElementById("navbar").style.paddingBottom = "2px"
            document.getElementById("btn-etudiant").style.paddingTop = "10px"
            document.getElementById("btn-etudiant").style.paddingBottom = "10px"
            document.getElementById("div-btn").classList.add("btn-anime");
            document.getElementById("div-btn").style.display ="block";
            document.getElementById("div-btn").classList.remove("btn-fade-bottom");
        }else{
            document.getElementById("navbar").classList.remove("nav-height")
            document.getElementById("navbar").style.paddingTop = "4px"
            document.getElementById("navbar").style.paddingBottom = "4px"
            document.getElementById("btn-etudiant").style.paddingTop = "16px"
            document.getElementById("btn-etudiant").style.paddingBottom = "16px"
            document.getElementById("div-btn").classList.add("btn-fade-bottom");
        }
        // if(document.body.scrollTop || document.documentElement.scrollTop){
        //     document.getElementById("div-btn").classList.remove("btn-fade")
        // }else{
        //     document.getElementById("div-btn").classList.add("btn-fade")
        // }
    };
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
        //document.getElementById("images").style.display="block";
        document.getElementById("reservation").style.display="none";
    }
    function arabe(){
        document.getElementById("arabe").style.display="block";
        document.getElementById("frensh").style.display="none";
        //document.getElementById("images").style.display="block";
        document.getElementById("reservation").style.display="none";
    }
</script>
<script>
    function afficher(){
        document.getElementById("formation").style.display="block";
        document.getElementById("divbtn").style.display="block";
    }
</script>
<script>
    function reservation(){
        document.getElementById("frensh").style.display="none";
        document.getElementById("arabe").style.display="none";
        document.getElementById("images").style.display="none";
        document.getElementById("reservation").style.display="block";
    }
</script>