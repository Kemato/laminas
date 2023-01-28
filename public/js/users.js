let size = document.getElementById("myTable").getElementsByTagName("tr").length;
let arr_el_hid = [size + 10];
let arr_admin_kill = Array(size + 10).fill(0);
let first = 1;
let now = 1;
let last = 21;
let truth = 0;
let page = 1;

function Next() {
    let table = document.getElementById("myTable");
    let tr = table.getElementsByTagName("tr");
    if (truth - page * 20 < 1) return false;
    page++;
    for (let i = 1; i <= last; ++i) tr[i].style.display = "none";
    now = 0;
    for (let i = last + 1; i < size; i++) {
        if (arr_el_hid[i] && now < 20) {
            tr[i].style.display = "";
            if (now === 0) first = i;
            last = i;
            now++;
        }
    }
}

function Previous() {
    let table = document.getElementById("myTable");
    let tr = table.getElementsByTagName("tr");
    if (page === 1) {
        return false;
    }
    page--;
    for (let i = first; i < size; i++) {
        tr[i].style.display = "none";
    }
    now = 0;
    for (let i = first - 1; i > 0; i--) {
        if (arr_el_hid[i] && now < 20) {
            tr[i].style.display = "";
            if (now === 0) {
                last = i;
            }
            if (now === 19) {
                first = i;
            }
            now++;
        }
    }
}

function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
        td = tr[i].getElementsByTagName("td")[1]
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            }
        }
        td = tr[i].getElementsByTagName("td")[4]
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            }
        }
        td = tr[i].getElementsByTagName("td")[5]
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            }
        }
    }
}

function sortUsers() {
    let JuniorCheck = document.getElementById("Junior").checked;
    let MiddleCheck = document.getElementById("Middle").checked;
    let SeniorCheck = document.getElementById("Senior").checked;
    let TeamLeaderCheck = document.getElementById("TeamLeader").checked;
    let input = document.getElementById("filman");
    let filter = input.value.toUpperCase();
    let td, i, ty;
    let table = document.getElementById("myTable");
    let tr = table.getElementsByTagName("tr");
    let agemin = document.getElementById("AgeMin").value;
    let agemax = document.getElementById("AgeMax").value;
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        tr[i].hidden = false;
        if (td) {
            if (td.innerHTML <= agemax && td.innerHTML >= agemin) {
                arr_el_hid[i] = 1;
            } else {
                arr_el_hid[i] = 0;
            }
        }

        if (arr_admin_kill[i]) {
            arr_el_hid[i] = 0;
        }
        ty = tr[i].getElementsByTagName("td")[2]
        if (ty.innerHTML === "Junior" && JuniorCheck === false) {
            arr_el_hid[i] = 0;
        }
        if (ty.innerHTML === "Middle" && MiddleCheck === false) {
            arr_el_hid[i] = 0;
        }
        if (ty.innerHTML === "Senior" && SeniorCheck === false) {
            arr_el_hid[i] = 0;
        }
        if (ty.innerHTML === "Team Leader" && TeamLeaderCheck === false) {
            arr_el_hid[i] = 0;
        }
    }
    if (filter === 0) {
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6]
            if (td) {
            }
        }
    }
    if (filter === 1) {


        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6]
            if (td) {

                if (td.innerHTML === "man") {
                } else {
                    arr_el_hid[i] = 0;
                }
            }
        }
    }
    if (filter === 2) {


        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6]
            if (td) {
                if (td.innerHTML === "woman") {
                } else {
                    arr_el_hid[i] = 0;
                }
            }
        }
    }
    now = 0;
    for (i = 1; i < size; i++) {
        if (arr_el_hid[i]) {
            if (now < 20) {
                tr[i].style.display = "";
                now++;
                last = i;
                if (now === 1) first = i;
            } else tr[i].style.display = "none";
            truth++;
        } else tr[i].style.display = "none";
    }
}