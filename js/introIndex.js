

// document.querySelector('body').style.overflow = "hidden"

document.addEventListener("DOMContentLoaded", function(event){
    const logoIntro = document.querySelector('#logoIntro')
const navLinks = document.querySelector('.linksIntro')

const pIntro = document.getElementById('pIntro')
    setTimeout(function(){
        pIntro.classList.toggle('animate__bounceInLeft')
        pIntro.style.visibility = "visible"
    }, 1200 );

const yIntro = document.getElementById('yIntro')
    setTimeout(function(){
            yIntro.classList.toggle('animate__bounceInLeft')
            yIntro.style.visibility = "visible"
        }, 1400 )

const rIntro = document.getElementById('rIntro')
    setTimeout(function(){
                rIntro.classList.toggle('animate__bounceInLeft')
                rIntro.style.visibility = "visible"
            }, 1600 )
const oIntro = document.getElementById('oIntro')
    setTimeout(function(){
                
                oIntro.classList.toggle('animate__bounce')
                oIntro.style.visibility = "visible"
            }, 2400 )

const collegesIntro = document.getElementById('collegesIntro')
    setTimeout(function(){
                collegesIntro.classList.toggle('animate__flipInX')
                collegesIntro.style.visibility = "visible"
            }, 1800 )

const linkIntro = document.getElementById('linkIntro')
    setTimeout(function(){
                linkIntro.classList.toggle('animate__rubberBand')
                linkIntro.style.visibility = "visible"
                document.querySelector('body').style.overflow = "auto"
            }, 2000 )




setTimeout(function(){
    logoIntro.classList.toggle('animate__animated')
    logoIntro.classList.toggle('animate__jackInTheBox')
    logoIntro.style.visibility = "visible"
    navLinks.classList.toggle('animate__animated')
    navLinks.classList.toggle('animate__lightSpeedInLeft')
    navLinks.style.visibility = "visible"
}, 800 );


})
