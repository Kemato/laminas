function CheckPassword() {
    let x;
    let pas = document.getElementById("floatingPassword1").value;
    let pasRepeat = document.getElementById("floatingPasswordRepeat1").value;
    let mail = document.getElementById("floatingInput").value
    let select = document.getElementById("InputState").value

    if (mail.length < 4) {
        $('.demo_2').html("Email address!").css('color', 'red');
        x = 0;
    } else {
        $('.demo_2').html("").css('color', 'red');
    }
    if (select == "0") {
        $('.demo_3').html("Select Title!").css('color', 'red');
        x = 0;
    } else {
        $('.demo_3').html("").css('color', 'red');
    }
    if (pas.length != pasRepeat.length || pas.length < 6) {
        // alert('Password length varies')
        $('.demo').html("Password length varies").css('color', 'red');
        x = 0;
    } else {
        if (pas == pasRepeat) {

            $('.demo').html("").css('color', 'red');
        } else {
            $('.demo').html("Passwords are different").css('color', 'red');
            x = 0;
        }
    }
    if (x) {
        document.location.href = "html/profile_actual.html";
        return true;
    } else {
        return false;
    }
}

function singIn(event) {
    let email = document.getElementById("floatingInput").value;
    let password = document.getElementById("floatingPassword").value;
    if (email == "ivan@mail.ru" && password == "ivan@mail.ru") {
        // event.preventDefault()
        window.location.href = "html/profile_actual.html";
        return true;
    }
    if (email == "admin@mail.ru" && password == "admin@mail.ru") {
        // event.preventDefault()
        window.location.href = "html/admin.html";
        return true;
    }
    // alert("Wrong password")
    $('.demo').html("Wrong Password or Email!").css('color', 'red');
    return false;
}


function changePassword() {
    let oldpass = document.getElementById("OldPass").value;
    let newpass = document.getElementById("NewPassword").value;
    let newreppass = document.getElementById("RepeatNewPassword").value;
    let f = 1;
    if (oldpass != "ivan@mail.ru") {
        f = 0;
        $('.demo').html("Wrong old password!").css('color', 'red');
    } else {
        $('.demo').html("");
    }

    if (newpass != newreppass) {
        f = 0;
        $('.demo_2').html("New password and Repeat Password are different!").css('color', 'red');
    } else {
        $('.demo_2').html("");
    }

    if (newpass.length < 5) {
        $('.demo_3').html("Password must contain at least 5 characters!").css('color', 'red');
        f = 0;
    } else {
        $('.demo_3').html("");
    }
    if (f) {
        $('.demo_2').html("Change successful").css('color', 'green');
        return true;
    } else {
        return false;
    }
}
