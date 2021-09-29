
let vOne = document.getElementById('pass-validation-one-id');
let vTwo = document.getElementById('pass-validation-two-id');
let vThree = document.getElementById('pass-validation-three-id');
let vFour = document.getElementById('pass-validation-four-id');

let logo_vOne = document.getElementById('logovOne')
let logo_vTwo = document.getElementById('logovTwo')
let logo_vThree = document.getElementById('logovThree')
let logo_vFour = document.getElementById('logovFour')

// Password validation
let password_requirement = document.getElementById('password')
password_requirement.oninput = function(){
check_one();
check_two();
check_three();
check_four();
}

function check_one(){
if (password_requirement.value.length < 8){
    vOne.style.color = "crimson";
    logo_vOne.innerHTML = "&#xf057;"
}else{
    logo_vOne.innerHTML = "&#xf058;"
    vOne.style.color = "green"
    
}
}
function check_two(){
    if (!(password_requirement.value.match(/[a-z]/)) || !(password_requirement.value.match(/[A-Z]/)) ){
        vTwo.style.color = "crimson";
        logo_vTwo.innerHTML = "&#xf057;"
    }else{
        logo_vTwo.innerHTML = "&#xf058;"
        vTwo.style.color = "green"
    }
}

function check_three(){
    
    if(password_requirement.value.match(/[0-9]/)){
        logo_vThree.innerHTML = "&#xf058;"
        vThree.style.color = "green"
        
    }else{
        vThree.style.color = "crimson";
        logo_vThree.innerHTML = "&#xf057;"
        
    }
}

function check_four(){
    if (password_requirement.value.match (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/)){
        logo_vFour.innerHTML = "&#xf058;"
        vFour.style.color = "green"
    }else{
        logo_vFour.innerHTML = "&#xf057;"
        vFour.style.color = "crimson"
        
    }
}
// Password validation --

$('.check-email').blur(function (e) { 
    let email = $('.check-email').val();
        $.ajax({
        type: "POST",
        url: "../includes/registration.inc.php",
        data: {
            "checking_email": 1,
            "email": email,
        },
        success: function (response) {
            $('#msg').text(response);
        }
    });
});

// Agree Policy to create the account
$("input[name='agreePolicy']").click(function(){
    if($("input[name='agreePolicy']").is(":checked")){
        nextBtn.disabled = false;
    }else if ($("input[name='agreePolicy']").is(":not(:checked)")) {
        nextBtn.disabled = true;
    }
});

$('#next_id').click(function(event){
    if($("input[name='agreePolicy']").is(":checked")){
            $('#studForm').submit();
    }
    // event.preventDefault();
})
$(window).on("load", function(){
    $(".loader-wrapper").fadeOut('xslow');
});
