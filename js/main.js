/*
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
 */

/*==== tabs ====*/
function tab(n) {
    var i;

    var munes = document.getElementsByClassName("mune");
    for (i = 0; i < munes.length; i++) {
        munes[i].className = munes[i].className.replace(" active", "");
    }
    munes[n - 1].className += " active";
}

/*==== Check Frequency Value ====*/
function CheckFrequency() {
    var n = document.getElementById("frequency").value;

    if (n > 525 || n < 410) {
        document.getElementById("frequency-br").style.display = "none";
        document.getElementById("frequency-span").style.display = "block";
    } else {
        document.getElementById("frequency-br").style.display = "";
        document.getElementById("frequency-span").style.display = "none";
    }
}

/*==== Ask Deleted Get Tabel ====*/
function GetClearModal(n) {
    var modal = document.getElementById('GetClear-modal');
    if (n > 0) {
        modal.style.display = 'block';
    }

    if (n == 0) {
        modal.style.display = 'none';
    }
}

/*==== Ask Deleted One Value Of Get Tabel ====*/
function ClearModal(n) {
    var modal = document.getElementsByClassName('Clear-modal');
    if (n > 0) {
        modal[n - 1].style.display = 'block';
    }
    if (n == 0) {
        for (i = 0; i < modal.length; i++) {
            modal[i].style.display = 'none';
        }
    }
}

/*==== SHOW DITAILS DATA ====*/
function ShowData(n) {
    var modal = document.getElementsByClassName('show-modal');
    if (n > 0) {
        modal[n - 1].style.display = 'block';
    }
    if (n == 0) {
        for (i = 0; i < modal.length; i++) {
            modal[i].style.display = 'none';
        }
    }
}

