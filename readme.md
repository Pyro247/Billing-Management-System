Read meeeeeeee!

Access with database

1. Run Xammpp(Apache & Mysql)
2. Open Broswer and go to http://localhost/phpmyadmin/
   3.Create new database and name it as "web-based-billing-management-system-v2" exact name of what you want to import
   4.After you create the database, click import and select database file inside this project and click go
   If you not encoutered any error Yehey:) you can now test this project with database

IMPORTANT IMPORTS:

<!-- Loader -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/       iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- FontAwsome -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

UNIVERSAL FORMAT CSS:
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Overpass:wght@100&family=Zilla+Slab&display=swap');

/_ Note|| Font stle is 'Poppins' 16px _/

:root{
font-size: 16px;
--black-color: rgb(31, 29, 28);
--white-color: #FFFFFF;
--blue-color: #56A8CBFF;
--green-color: #3fd4b7;
--input-background-color: rgb(194, 207, 219);
--font-school-name: 'Zilla Slab', serif;
--font-tagline: 'Overpass', sans-serif;
}

\*{
font-family: 'Poppins', sans-serif;
margin: 0;
padding: 0;
box-sizing: border-box;
}

Universal Navbar and Loader:
Loader: HTML

<!-- LOADER! -->
<div class="loader-wrapper" id="loader-wrapperID">
<div class="wrapper">
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="shadow"></div>
<div class="shadow"></div>
<div class="shadow"></div>
<span>Pyro Colleges Inc.</span>
</div>
</div>
<!-- LOADER -->

Loader: CSS

.loader-wrapper{
position: absolute;
width: 100%;
height: 100%;
background: #1e1e1e;
z-index: 1000;
}
.wrapper{
width:200px;
height:60px;
position: absolute;
left:50%;
top: 40%;
transform: translate(-50%, -50%);
}
.circle{
width:20px;
height:20px;
position: absolute;
border-radius: 50%;
background-color: #fff;
left:15%;
transform-origin: 50%;
animation: circle .5s alternate infinite ease;
}

@keyframes circle{
0%{
top:60px;
height:5px;
border-radius: 50px 50px 25px 25px;
transform: scaleX(1.7);
}
40%{
height:20px;
border-radius: 50%;
transform: scaleX(1);
}
100%{
top:0%;
}
}
.circle:nth-child(2){
left:45%;
animation-delay: .2s;
}
.circle:nth-child(3){
left:auto;
right:15%;
animation-delay: .3s;
}
.shadow{
width:20px;
height:4px;
border-radius: 50%;
background-color: rgba(0,0,0,.5);
position: absolute;
top:62px;
transform-origin: 50%;
z-index: -1;
left:15%;
filter: blur(1px);
animation: shadow .5s alternate infinite ease;
}

    @keyframes shadow{
    0%{
        transform: scaleX(1.5);
    }
    40%{
        transform: scaleX(1);
        opacity: .7;
    }
    100%{
        transform: scaleX(.2);
        opacity: .4;
    }
    }
    .shadow:nth-child(4){
    left: 45%;
    animation-delay: .2s
    }
    .shadow:nth-child(5){
    left:auto;
    right:15%;
    animation-delay: .3s;
    }
    .wrapper span{
    position: absolute;
    top:75px;
    font-family: 'Lato';
    font-size: 25px;
    color: #fff;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    }

NAVBAR
Navbar: HTML

 <nav>
        <div class="nav2">
        <img src="/images/logo.png" alt="">
            <div class="nav2-text">
                <span>Pyro Colleges Inc.</span>
                <p>Excellence at its finest.</p>
            </div>
        </div>        
</nav>

Navbar: CCS
nav{
width: 100%;
height: 120px;
background: var(--black-color);
color: white;
padding: 10px;
display: flex;
flex-direction: column;
border-bottom: 2px solid var(--white-color);
}

nav .nav2 img{
width: 100px;
height: 100px;
margin-right: 10px;
}

nav .nav2{
display: flex;
align-items: center;
}

nav .nav2 .nav2-text span{
display: block;
font-family: var(--font-school-name);
font-size: 2rem;
margin-bottom: 2px;
font-weight: bold;
}

nav .nav2 .nav2-text p{
font-family: var(--font-tagline);
letter-spacing: 1px;
color: var(--blue-color);
font-weight: bold;  
}
