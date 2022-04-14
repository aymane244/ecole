<style>
    .nav-height{
        position: fixed;
        top:0;
        z-index: 1;
    }
    .bg-hero{
        background-color: rgba(000,000,000,0.5);
    }
    .banner{
        padding-top:10%;
    }
    .text-fade{
        animation-duration: 4s;
        animation-name: fade;
    }
    @keyframes fade{
        from{
            opacity:0
        }
        to{
            opacity: 1;
        }
    }
    .div-background{
        background-color: #F3F8FA;
    }
    body{
        background-color: #F3F8FA;
    }
    .text-color{
        color: #003366;
    }
    .hr-width{
        width:10%;
        background-color: #003366;
    }
    .slick-slide {
        margin: 0px 20px;
    }
    .slick-slide img {
        width: 50%;
    }
    .slick-slider{
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }
    .slick-list{
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .slick-list:focus{
        outline: none;
    }
    .slick-list.dragging{
        cursor: pointer;
        cursor: hand;
    }
    .slick-slider .slick-track,
    .slick-slider .slick-list{
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .slick-track{
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }
    .slick-track:before,
    .slick-track:after{
        display: table;
        content: '';
    }
    .slick-track:after{
        clear: both;
    }
    .slick-loading .slick-track{
        visibility: hidden;
    }
    .slick-slide{
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }
    [dir='rtl'] .slick-slide{
        float: right;
    }
    .slick-slide img{
        display: block;
    }
    .slick-slide.slick-loading img{
        display: none;
    }
    .slick-slide.dragging img{
        pointer-events: none;
    }
    .slick-initialized .slick-slide{
        display: block;
    }
    .slick-loading .slick-slide{
        visibility: hidden;
    }
    .slick-vertical .slick-slide{
        display: block;
        height: auto;
        border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden{
        display: none;
    }
    .footer-background{
        background-color: #0D2735;
    }
    hr{
        background-color: #003366;
    }
    .position-awesome{
        position: absolute;
        font-size: 23px;
        margin-top: 7px;
        margin-left: 8px;
        z-index: 2;
    }
    .text-color-footer{
        color: #A2CCE3;
    }
    .social-media{
        background-color :#1E4356;
        border-radius: 50%;
        width: 40%;
        height: 35px;
        margin-left: 10px;
    }
    .facebook-position{
        padding-left: 13px;
        padding-top: 8px;
        font-size: 20px;
    }
    .instagram-position{
        padding-left: 10px;
        padding-top: 7px;
        font-size: 22px;
    }
    .linkedin-position{
        padding-left: 11px;
        padding-top: 8px;
        font-size: 20px;
    }
    .whatsapp-position{
        padding-left: 11px;
        padding-top: 8px;
        font-size: 20px;
    }
    .social-media:hover{
        background-color: #68A4C4;
    }
    @media only screen and (max-width: 600px){
        .social-media{
            width: 7%;  
            height: 30px;
        }
        .facebook-position{
            font-size: 15px;
            padding-left: 11px;
        }
        .instagram-position{
            font-size: 17px;
            padding-left: 8px;
        }
        .linkedin-position{
            font-size: 15px;
            padding-left: 9px;
        }
        .whatsapp-position{
            padding-left: 10px;
            font-size: 15px;
        }
        .push{
            margin-left:100px;
        }
        .show-this{
            margin-top: -45px;
            margin-left: 25px;
        }
        .hero{
            background-image: url("images/entropot.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
        }
        #navbar{
            padding-top: 4px;
            padding-bottom: 4px;
            transition: 0.4s;
            z-index: 10;
        }
        .foot-bg{
            display: none;
        }
        .foot-bg select{
            padding: 5px;
        } 
        .img-width{
            height: 200px;
            width: 30rem;
        }
        .img-article{
            height: 380px;
            width: 25rem;
        }
        .img-etudiant{
            height: 100px;
        }
        .div-menu{
            left:-500px;
            transition: 0.4s;
            margin-top: 60px;
            z-index: -1;
        }
        .font-pointer{
            background-color: transparent;
        }
        .menu-show{
            left:0px;
            transition: 0.4s;
            background-color: black !important;
        }
        .show-this{
            left: 20px;
        }
    }
    @media only screen and (min-width: 600px){
        .social-media{
            width: 7%;  
            height: 30px;
        }
        .facebook-position{
            font-size: 16px;
        }
        .instagram-position{
            font-size: 18px;
            padding-top: 6px;
        }
        .linkedin-position{
            font-size: 16px;
            padding-top: 7px;
        }
        .whatsapp-position{
            font-size: 18px;
            padding-top: 6px;
        }
        .push{
            margin-left:150px;
        }
        .show-this{
            margin-top: -45px;
            margin-left: 30px;
        }
        .hero{
            background-image: url("images/entropot.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
        }
        #navbar{
            padding-top: 8px;
            padding-bottom: 8px;
            transition: 0.4s;
            z-index: 10;
        }
        .foot-bg{
            display: none;
        }
        .img-width{
            height: 200px;
            width: 35rem;
        }
        .img-article{
            height: 380px;
            width: 25rem;
        }
        .img-etudiant{
            height: 120px;
        }
        .div-menu{
            left:-200px;
            transition: 0.4s;
            margin-top: 60px;
            z-index: -1;
        }
        .menu-show{
            left:0px;
            transition: 0.4s;
            background-color: black !important;
            font-size: small;
        }
        .show-this{
            font-size: small;
            top: 4px;
        }
    }
    @media only screen and (min-width: 768px){
        .social-media{
            width: 5%;  
            height: 30px;
        }
        .facebook-position{
            font-size: 16px;
        }
        .instagram-position{
            font-size: 18px;
        }
        .linkedin-position{
            font-size: 16px;
        }
        .whatsapp-position{
            font-size: 18px;
            padding-top: 6px;
        }
        .push{
            margin-left:150px;
        }
        .show-this{
            margin-top: -45px;
            margin-left: 30px;
        }
        .hero{
            background-image: url("images/entropot.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
        }
        #navbar{
            padding-top: 4px;
            padding-bottom: 4px;
            transition: 0.4s;
            z-index: 10;
        }
        .img-width{
            height: 150px;
            width: 35rem;
        }
        .img-etudiant{
            height: 150px;
        }
        .menu-show{
            left:0px;
            transition: 0.4s;
            background-color: black !important;
            font-size:14px;
        }
        .awesome-padding{
            padding-left: 20px;
        }
        .show-this{
            font-size: large;
            top: 6px;
        }
    }
    @media only screen and (min-width: 992px){
        .social-media{
            width: 16%;  
            height: 30px;
        }
        .facebook-position{
            font-size: 16px;
            padding-left: 12px;
            padding-top: 7px;
        }
        .instagram-position{
            font-size: 18px;
            padding-left: 9px;
            padding-top: 6px;
        }
        .linkedin-position{
            font-size: 16px;
            padding-left: 10px;
            padding-top: 7px;
        }
        .whatsapp-position{
            font-size: 18px;
            padding-top: 6px;
            padding-left: 10px;
        }
        .text-padding{
            padding-top: 33px;
        }
        .text-padding-2{
            padding-top: 33px;
        }
        .text-padding-3{
            padding-bottom: 38px;
        }
        .push{
            margin-left:180px;
        }
        .show-this{
            margin-top: -45px;
            margin-left: 50px;
        }
        .div-menu-width{
            margin-left: 10px !important;
        }
        .hero{
            background-image: url("images/entropot.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
        }
        #navbar{
            padding-top: 4px;
            padding-bottom: 4px;
            transition: 0.4s;
            z-index: 10;
        }
        .foot-bg{
            display: block;
            background-color: #0D2735;
            height: 55px;
            font-size: 14px;
        }
        .img-width{
            height: 200px;
            width: 35rem;
        }
        .img-etudiant{
            height: 200px;
        }
        .div-menu{
            left:-130px;
            transition: 0.4s;
            margin-top: 60px;
            z-index: -1;
        }
        .menu-show{
            left:0px;
            transition: 0.4s;
            background-color: black !important;
            font-size:14px;
        }
        .show-this{
            font-size: large;
            top: 2px;
        }
    }
    @media only screen and (min-width: 1200px){
        .social-media{
            width: 14%;  
            height: 30px;
        }
        .facebook-position{
            font-size: 16px;
            padding-left: 13px;
            padding-top: 7px;
        }
        .instagram-position{
            font-size: 18px;
            padding-left: 10px;
            padding-top: 6px;
        }
        .linkedin-position{
            font-size: 16px;
            padding-left: 11px;
            padding-top: 7px;
        }
        .whatsapp-position{
            font-size: 18px;
            padding-top: 6px;
            padding-left: 10px;
        }
        .text-padding{
            padding-top: 34px;
        }
        .text-padding{
            padding-top: 34px;
        }
        .text-padding-2{
            padding-top: 0;
        }
        .text-padding-3{
            padding-bottom: 0px;
        }
        .btn-etudiant{
            background-color: white;
            padding: 15px;
            padding-top: 16px;
            transition: 0.4s;
            border: 1px solid black !important;
        }
        .btn-etudiant:hover{
            background-color: black;
            color: white ! important;
            transition: 0.4s;
        }
        .push{
            margin-left:205px;
        }
        .show-this{
            margin-top: -45px;
            margin-left: 60px;
        }
        .div-menu{
            left:-150px;
            transition: 0.4s;
            margin-top: 60px;
            z-index: -1;
        }
        .hero{
            background-image: url("images/entropot.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
        }
        .bg-hero{
            background-color: rgba(000,000,000,0.5);
            padding-bottom: 22px;
        }
        #navbar{
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 15px;
            transition: 0.4s;
            z-index: 5;
        }
        .foot-bg{
            display: block;
            background-color: #0D2735;
            height: 55px;
        }
        .img-width{
            height: 250px;
            width: 35rem;
        }
        .img-article{
            height: 380px;
            width: 35rem;
        }
        .img-etudiant{
            height: 250px;
        }
        .menu-show{
            left:0px;
            transition: 0.4s;
            background-color: black !important;
            font-size:16px;
        }
        .show-this{
            font-size: x-large;
            top: 5px;
            margin-left: 80px;
        }
    }
    @media only screen and (min-width: 1920px){
        .push{
            margin-left:400px;
        }
        .show-this{
            margin-top: -45px;
            margin-left: 100px;
        }
        .div-menu{
            left:-250px;
            transition: 0.4s;
            margin-top: 60px;
            z-index: -1;
        }
        .h1-size-big{
            font-size: 60px;
        }
        .hero{
            background-image: url("images/entropot.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 822px;
        }
        .bg-hero{
            background-color: rgba(000,000,000,0.5);
            height: 822px;
        }
        .text-big{
            font-size: xx-large;
        }
        #navbar{
            padding-top: 4px;
            padding-bottom: 4px;
            transition: 0.4s;
            font-size: large;
            z-index: 10;
        }
        .space-link{
            padding-left: 20px;
            padding-right: 20px;
        }
        .margin-text{
            margin-top: 150px;
        }
        .btn-etudiant{
            background-color: white;
            padding: 15px;
            padding-top: 16px;
            transition: 0.4s;
            border: 1px solid black !important;
        }
        .btn-etudiant:hover{
            background-color: white;
            color: black ! important;
            transition: 0.4s;
        }
        .foot-bg{
            background-color: #0D2735;
        }
        .img-width{
            height: 250px;
            width: 35rem;
        }
        .img-article{
            height: 380px;
            width: 35rem;
        }
        .img-etudiant{
            height: 250px;
        }
        .menu-show{
            left:0px;
            transition: 0.4s;
            background-color: black !important;
        }
        .show-this{
            font-size: xx-large;
            top: 2px;
        }
    }
    .size-awesome{
        font-size: small;
    }
    .btn-top{
        background-color: #68A4C4;
        transition: 0.4s;
    }
    .btn-fade{
        display: none;
        transition: 0.4s;
    }
    .position-awesome-email{
        position: absolute;
        font-size: 23px;
        margin-top: 8px;
        margin-left: 8px;
        z-index: 2;
    }
    .position-awesome-sujet{
        position: absolute;
        font-size: 23px;
        margin-top: 8px;
        margin-left: 8px;
        z-index: 2;
    }
    html{
        scroll-behavior: smooth;
    }
    .text-font{
        font-size:20px;
    }
    a:hover{
        text-decoration: none;
    }
    .link{
        font-size: 20px;
    }
    .bg-choisir{
        background-color: #0D2735;
    }
    .awesome-font{
        font-size: 40px;
    }
    .btn-formation{
        background-color: #0D2735;
        border: 1px solid #53ADF6 !important;
        font-size: 20px;
        padding-left: 32px;
        padding-right: 44px;
        transition: 0.6s;
        color: #53ADF6;
    }
    .arrow-font{
        font-size: x-small;
        position: absolute;
        margin-top: 12px;
        margin-left: 10px;
    }
    .btn-formation:hover{
        background-color: #53ADF6;
        color: #0D2735 !important;
        transition: 0.6s;
    }
    .position-awesome-image{
        position: absolute;
        font-size: 23px;
        margin-top: 3px;
        margin-left: 8px;
    }
    .row-style{
        vertical-align: middle !important
    }
    .awesome-size{
        font-size: 23px;
        cursor: pointer;
    }
    .btn-style{
        background-color: transparent;
        border: none;
    }
    .text-style{
        cursor: pointer;
    }
    .div-progress{
        background-color: lightgray;
        border-radius: 5px 5px;
    }
    .bar{
        width: 0;
        height: 10px;
        background-color: #0075FF;
        border-radius: 5px 5px;
    }
    progress {
        border-radius: 7px; 
        width: 80%;
        height: 22px;
        margin-left: -11.5%;
        box-shadow: 1px 1px 4px rgba( 0, 0, 0, 0.2 );
    }
    progress::-webkit-progress-bar {
        background-color: #138496 ;
        border-radius: 7px;
    }
    progress::-webkit-progress-value {
        background-color: #0D2735;
        border-radius: 7px;
    }
    progress::-moz-progress-bar {
        /* style rules */
    }
    .blog-background{
        background-color: #F3F8FA;
    }
    .blog-link:hover{
        color:#74A6D5
    }
    .home-link{
        color: black;
        cursor: default;
    }
    .home-link:hover{
        color: black;
    }
    .border-bg{
        box-shadow: 10px 10px lightblue;
    }
    .div-menu:hover{
        left:0px;
        transition: 0.4s;
        background-color: black !important;
    }
    .font-pointer{
        cursor:pointer;
    }
    .fa-times{
        font-size: xx-large;
    }
    .meun-width{
        margin-left:200px;
        transition: 0.4s;
    }
    .menu-width-remove{
        margin-left: 0;
        transition: 0.4s;
    }
    .trans{
        transition: 0.4s;
    }
    .menu-text-2{
        left:0;
    }
    .h-menu{
        padding-bottom: 20px !important;
        z-index:555;
    }
    .link-color{
        color: #D7D9D6;
    }
    .link-color:hover{
        color: white;
    }
    .card-background{
        background:linear-gradient( to right, dodgerblue, dodgerblue);
        border-radius: 5px;
    }
    .cards{
        background-color:lightgrey;
        height: 500px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .card-info{
        margin-top: 2px;
        padding: 10px;
    }
    .card-image{
        border-radius:80%;
        width: 120px;
        position: relative;
    }
    .div-image-padding{
        margin-top: 100px;
    }
    .font-ckeck-image{
        font-size: x-large;
    }
    .card-image-2{
        border-radius:80%;
        width: 120px;
        height: auto;
        position: relative;
        top: 10px;
    }
    .font-style{
        font-weight: bold;
    }
    .modal-width{
        width: fit-content !important;
    }
    .modal-background{
        background-image: url("images/notebook.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    .modal-background-color{
        background-color: rgba(000,000,000,0.5);
    }
    .font-close{
        font-size: small;
        position: absolute;
        margin-top: -7px;
        margin-left: 110px;
        cursor: pointer;
    }
    .bg-div-articles{
        background-color: #F5F6F8;
    }
    .hr-thick{
        height: 2px;
        margin-bottom: 40px;
    }
    .text-length{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 6; /* number of lines to show */
        line-clamp: 6; 
        -webkit-box-orient: vertical;
    }
    .text-length-2{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4; /* number of lines to show */
        line-clamp: 4; 
        -webkit-box-orient: vertical;
    }
    .lire-aussi-bg{
        background-color: #F5F6F8;
    }
    .bg-text{
        color: #7E838C;
        font-size: large;
    }
    .full-page{
        height: 900px;
    }
    .position-awesome-cursor{
        position: absolute;
        font-size: 23px;
        margin-top: 7px;
        margin-left: 10px;  
        z-index: 6;
        cursor: pointer;
        background-color: #D9D5CE;
        padding: 5px;
        box-shadow: 1px;
    }
    .fulltext{
        position: absolute;
        height: 800px !important;
        width: 1150px;
        margin-top: -250px;
        margin-left: -21px;
        z-index: 5;
        transition: 0.4s;
    }
    .fullsizer{
        z-index: 6;
        margin-top: -240px;
        margin-left: -10px;
        transition: 0.4s;
    }
    .fulltext2{
        position: absolute;
        height: 800px !important;
        width: 1110px;
        margin-top: -540px;
        margin-left: -21px;
        z-index: 5;
        transition: 0.4s;
    }
    .fullsizer2{
        z-index: 6;
        margin-top: -535px;
        margin-left: -10px;
        transition: 0.4s;
    }
    .fulltext3{
        position: absolute;
        height: 800px !important;
        width: 1110px;
        margin-top: -420px;
        margin-left: -21px;
        z-index: 5;
        transition: 0.4s;
    }
    .fullsizer3{
        z-index: 6;
        margin-top: -410px;
        margin-left: -10px;
        transition: 0.4s;
    }
    .toolbar-bg{
        background-color: #D9D5CE;
    }
    .bold{
        font-weight: bold;
    }
    .text-length2{
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;  
        overflow: hidden;
        height: 155px;
        width: 450px !important;
        border-bottom: none !important;
        border-left: none !important;
        border-right: none !important;
    }
    .awesome-delete{
        position: absolute;
        margin-top: -150px;
        font-size: 23px;
        margin-left: 75px;
        cursor: pointer;
    }
    .font-close2{
        font-size: small;
        position: absolute;
        margin-top: -7px;
        margin-left: 200px;
        cursor: pointer;
    }
    .text-color{
        color: #0D2735 !important;
    }
    *{
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
        box-sizing: border-box;
	    position: relative;
    }
    .cf:before,
    .cf:after{
        content: " "; /* 1 */
        display: table; /* 2 */
    }
    .cf:after{
        clear: both;
    }
    .cf {
        *zoom: 1;
    }
    .content{
	    width: 100%;
	    max-width: 1142px;
	    margin: 0 auto;
        padding: 0 20px;
    }
    .organi:focus{
	    outline: 2px dashed #f7f7f7;
    }
    @media screen and (max-width: 767px){
	    .content{
		    padding: 0 20px;
	    }   	
    }
    ul{
	    padding: 0;
        margin: 0;
        list-style: none;		
    }
    ul .organi{
        display: block;
	    background: #ccc;
	    border: 4px solid #fff;
        text-align: center;
	    overflow: hidden;
	    font-size: .7em;
        text-decoration: none;
	    font-weight: bold;
	    color: #333;
        height: 70px;
	    margin-bottom: -26px;
	    box-shadow: 4px 4px 9px -4px rgba(0,0,0,0.4);
        -webkit-transition: all linear .1s;
	    -moz-transition: all linear .1s;
	    transition: all linear .1s;
    }
    @media print {
        ul .organi{
            border: 4px solid #000;
        }
    }
    @media screen and (max-width: 767px){
	    ul .organi{
		    font-size: 1em;
	    }
    }
    ul .organi span{
	    top: 50%;
	    margin-top: -0.7em;
        display: block;
    }
    .administration > li > .organi{
	    margin-bottom: 25px;
    }
    .director > li > .organi{
	    width: 50%;
	    margin: 0 auto 0px auto;
    }
    .subdirector:after{
	    content: "";
	    display: block;
        width: 0;
	    height: 130px;
	    background: red;
        border-left: 4px solid #fff;
	    left: 45.45%;
	    position: relative;
    }
    @media print {
        .subdirector:after{
            border-left: 4px solid #000;
        }
    }
    .subdirector,
    .departments{
        position: absolute;
	    width: 100%;
    }
    .subdirector > li:first-child,
    .departments > li:first-child{	
	    width: 18.59894921190893%;
	    height: 64px;
        margin: 0 auto 92px auto;		
	    padding-top: 25px;
	    border-bottom: 4px solid white;
	    z-index: 1;	
    }
    @media print {
        .subdirector > li:first-child,
        .departments > li:first-child{
            border-bottom: 4px solid #000;
        }
    }
    .subdirector > li:first-child{
	    float: right;
	    right: 27.2%;
        border-left: 4px solid white;
    }
    @media print {
        .subdirector > li:first-child{
	        border-left: 4px solid black;
        }   
    }
    .departments > li:first-child{	
	    float: left;
	    left: 27.2%;
        border-right: 4px solid white;	
    }
    @media print {
        .departments > li:first-child{
            border-right: 4px solid black;	
        }
    }
    .subdirector > li:first-child .organi,
    .departments > li:first-child .organi{
	    width: 100%;
    }
    .subdirector > li:first-child .organi{	
	    left: 25px;
    }
    @media screen and (max-width: 767px){
	    .subdirector > li:first-child,
	    .departments > li:first-child{
		    width: 40%;	
	    }
	    .subdirector > li:first-child{
	        right: 10%;
		    margin-right: 2px;
	    }
	    .subdirector:after{
		    left: 49.8%;
	    }
	    .departments > li:first-child{
		    left: 10%;
		    margin-left: 2px;
	    }
    }
    .departments > li:first-child a{
        right: 25px;
    }
    .department:first-child,
    .departments li:nth-child(2){
        margin-left: 0;
        clear: left;	
    }
    .departments:after{
        content: "";
        display: block;
        position: absolute;
        width: 81.1%;
        height: 22px;	
        border-top: 4px solid #fff;
        border-right: 4px solid #fff;
        border-left: 4px solid #fff;
        margin: 0 auto;
        top: 130px;
        left: 9.1%
    }
    @media print {
        .departments:after{
            border-top: 4px solid #000;
            border-right: 4px solid #000;
            border-left: 4px solid #000;
        }
    }
    @media screen and (max-width: 767px){
        .departments:after{
            border-right: none;
            left: 0;
            width: 49.8%;
        }  
    }
    @media screen and (min-width: 768px){
        .department:first-child:before,
        .department:last-child:before{
            border:none;
        }
    }
    .department:before{
        content: "";
        display: block;
        position: absolute;
        width: 0;
        height: 22px;
        border-left: 4px solid white;
        z-index: 1;
        top: -22px;
        left: 50%;
        margin-left: -4px;
    }
    @media print {
        .department:before{
            border-left: 4px solid black;
        }
    }
    .department{
        border-left: 4px solid #fff;
        width: 18.59894921190893%;
        float: left;
        margin-left: 1.751313485113835%;
        margin-bottom: 60px;
    }
    @media print {
        .department{
            border-left: 4px solid #000;
        }
    }
    .lt-ie8 .department{
        width: 18.25%;
    }
    @media screen and (max-width: 767px){
        .department{
            float: none;
            width: 100%;
            margin-left: 0;
        }
        .department:before{
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 60px;
            border-left: 4px solid white;
            z-index: 1;
            top: -60px;
            left: 0%;
            margin-left: -4px;
        }
        .department:nth-child(2):before{
            display: none;
        }
    }
    .department > .organi{
        margin: 0 0 -26px -4px;
        z-index: 1;
    }
    .department > .organi:hover{	
        height: 80px;
    }
    .department > ul{
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .department li{	
        padding-left: 25px;
        border-bottom: 4px solid #fff;
        height: 80px;	
    }
    @media print {
        .department li{
            border-bottom: 4px solid #000;
        }
    }
    .department li .organi{
        background: #fff;
        top: 48px;	
        position: absolute;
        z-index: 1;
        width: 90%;
        height: 60px;
        vertical-align: middle;
        right: -1px;
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjAuMjUiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
        background-image: -moz-linear-gradient(-45deg,  rgba(0,0,0,0.25) 0%, rgba(0,0,0,0) 100%) !important;
        background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(0,0,0,0.25)), color-stop(100%,rgba(0,0,0,0)))!important;
        background-image: -webkit-linear-gradient(-45deg,  rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
        background-image: -o-linear-gradient(-45deg,  rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
        background-image: -ms-linear-gradient(-45deg,  rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
        background-image: linear-gradient(135deg,  rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#40000000', endColorstr='#00000000',GradientType=1 );
    }
    .department li .organi:hover{
        box-shadow: 8px 8px 9px -4px rgba(0,0,0,0.1);
        height: 80px;
        width: 95%;
        top: 39px;
        background-image: none!important;
    }
    .department.dep-a .organi{ background: #FFD600; }
    .department.dep-b .organi{ background: #AAD4E7; }
    .department.dep-c .organi{ background: #FDB0FD; }
    .department.dep-d .organi{ background: #A3A2A2; }
    .bg-height{
        height: 600px;
        padding-top: 30px;
    }
    .menu-show-admin{
        z-index: 10;
    }
    .Gallery .Gallery-box {
        margin-bottom: 15px;
        margin-right: -7px;
        margin-left: -7px;
        position: relative;
    }
    .Gallery .Gallery-box figure {
        margin: 0px;
    }.Gallery .titlepage {
        text-align: center;
        padding-bottom: 50px;
    }
    .Gallery .titlepage h2 {
        padding: 0px 0px 36px 0px;
        font-size: 50px;
        font-weight: bold;
        color: #050303;
        line-height: 50px;
        position: relative;
        margin-bottom: 20px;
    }
    .Gallery .titlepage h2::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 70%;
        margin: 10px auto;
        width: 283px;
        height: 6px;
        background: #308409;
    }
    .Gallery .Gallery-box:hover .hoverle {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        text-align: center;
        display: flex;
        justify-content: center;
        background: #308409de;
        align-items: center;
    }
    .Gallery .Gallery-box:hover .hoverle a {
        border: #fff solid 2px;
        background: transparent;
        padding: 5px 38px;
        color: #fff;
    }
    .margin-r-l {
        padding-right: 40px;
        padding-left: 40px;
    }
    img.zoom {
        width: 100%;
        object-fit: cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }
    .hoverle {
        display: none;
    }
    .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }
    .img-1{
        transition: 1s;
    }
    .img-1:hover{
        transform: scale(1.1);
        box-shadow: 4px 4px grey;
    }
    .services-box{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    .service{
        margin: 8px;
    }
    .flip-box {
        background-color: transparent;
        width: 300px;
        height: 200px;              
        border-radius: 10px;
        perspective: 1000px;
    }
    .flip-box-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .flip-box:hover .flip-box-inner {
        transform: rotateY(180deg);
    }
    .flip-box-front, .flip-box-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .flip-box-front {
        background-color: #53ADF6;;
        color: black;
        border-radius: 10px;
    }
    .flip-box-front img{
        height: 50px;
        width: 50px;
    }
    .flip-box-back {
        background-color: #53ADF6;
        color: #000;
        transform: rotateY(180deg);
        border-radius: 10px;
        padding: 16px;
    }
    .iso-style{
        color:deepskyblue;
    }
    .display_image{
        width: 400px;
        height: 225px;
        border: 1px solid black;
        background-position: center;
        background-size: cover;
    }
    .text-length3{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
        height: 100px;
        width: 465px !important;
        border-bottom: none !important;
        border-left: none !important;
        border-right: none !important;
    }
    .file{
        display: none;
    }
    .file-label{
        background-color: #0069D9;
        color: white;
        cursor: pointer;
        display: block;
        transition: 0.4s;
        border: 1px solid #0069D9;
    }
    .file-label:hover{
        background-color: white;
        color:#0069D9;
        border: 1px solid #0069D9;
    }
    .position-awesome-upload{
        font-size: 23px;
    }
    .showimage{
        height: 150px;
        background-repeat: no-repeat;
        background-position: center;
    }
    .showpdf{
        height: 50px;
        background-repeat: no-repeat;
        background-position: center;
    }
    .fa-arrow-left{
     	font-size: 35px;
        position: absolute;
        padding-top:5px;
        cursor: pointer;
	}
</style>