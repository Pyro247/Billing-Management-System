let register_validate = document.querySelector('.register-validate');

let invalid_popup = document.querySelector('.invalid-student-number');

let main_body = document.getElementById('register-main-id');

let student_num_txt = document.querySelector('.form-title');

let sect = document.getElementById('sectId');

function validate_function(){
    let student_id_input = document.getElementById('student-num-input').value;

    if(student_id_input === "2018300366"){
        main_body.classList.toggle('active');
        sect.classList.toggle('active');
        student_num_txt.textContent = "Register - " + student_id_input;
    }else{
        main_body.classList.toggle('active');
        invalid_popup.classList.toggle('active');
    }
}

function back_to_home_registration(){
        main_body.classList.toggle('active');
        invalid_popup.classList.toggle('active');
}

