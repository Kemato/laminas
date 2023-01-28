function addField() {
    let t = document.querySelector("div1")
    let mob_1 = document.createElement('div');
    mob_1.innerHTML = "<input type=\"number\" name=\"mobile\" pattern=\"+79[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}\" class=\"form-control \" placeholder=\"enter phone number\" value=\"\">"
    t.after(mob_1);
}

function addEmail() {
    let t = document.querySelector("div2")
    let mob_1 = document.createElement('div');
    mob_1.innerHTML = "<input type=\"email\" name=\"email\"  class=\"form-control\" placeholder=\"enter email\" value=\"\">"
    t.after(mob_1);
}

let l = 5;

function addTitle() {
    let t = document.querySelector("div3")
    let mob_1 = document.createElement('div');
    mob_1.className = "col-md-12 d-flex";
    mob_1.id = l;
    mob_1.innerHTML = "<input type=\"text\" name=\"text\"  placeholder='enter name' class=\"form-control\" value=\"\"><button class= \"btn\" id = " + l + " type=\"button\" onclick=\"Delete(id)\">X</button>"
    t.before(mob_1);
    $('.demo').html("");
    l = l + 1;
}

function show(id) {
    let elem;
    elem = document.getElementById("sign");
    elem.hidden = true;
    elem = document.getElementById("registration");
    elem.hidden = true;
    elem = document.getElementById("forgot");
    elem.hidden = true;
    elem = document.getElementById(id);
    elem.hidden = false;
}

function Save() {
    $('.demo').html("Change successful").css('color', 'green');
    return true;
}


function Send() {
    $('.demo').html("Send successful").css('color', 'green');
}
