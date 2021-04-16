var acao = document.getElementsByClassName('sub-list');
var menu = document.getElementById('menu-icon');
var icon = document.getElementsByClassName('fa-bars')[0];
var subFinanceiro = document.getElementById('financeiro');
var slideFinanceiro = document.getElementById('slide-financeiro');
var subRelatorio = document.getElementById('relatorio');
var slideRelatorio = document.getElementById('slide-relatorio');
var subConfig = document.getElementById('config');
var slideConfig = document.getElementById('slide-config');


menu.addEventListener('click', function() {
    let sidebar = document.getElementById('sidebar');
    let css = window.getComputedStyle(sidebar).opacity;

    if (css == 0) {
        sidebar.style.display = 'block';
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
        setTimeout(function() {
            sidebar.style.opacity = 1;
        }, 200);
    } else {
        sidebar.style.opacity = 0;
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
        setTimeout(function() {
            sidebar.style.display = 'none';
        }, 1000);
    }

});

subFinanceiro.addEventListener('click', function(e) {
    let slideFinanceiro = document.getElementById('slide-financeiro').className.length;
    acao[0].classList.remove('slide-static');
    if (slideFinanceiro == 19 || slideFinanceiro == 28) {
        acao[0].classList.remove('slide-up');
        acao[0].classList.add('slide-down-financeiro');


        if (acao[1].className.split(' ').indexOf('slide-down-relatorio') + 1 > 0) {
            acao[1].classList.add('slide-up');
            setTimeout(function() {
                acao[1].classList.remove('slide-down-relatorio');
            }, 200);
        }

        if (acao[2].className.split(' ').indexOf('slide-down-settings') + 1 > 0) {
            acao[2].classList.add('slide-up');
            setTimeout(function() {
                acao[2].classList.remove('slide-down-settings');
            }, 200);
        }

    } else {
        acao[0].classList.add('slide-up');
        setTimeout(function() {
            acao[0].classList.remove('slide-down-financeiro');
        }, 200);
    }
});

subRelatorio.addEventListener('click', function(e) {
    let slideRelatorio = document.getElementById('slide-relatorio').className.length;
    acao[1].classList.remove('slide-static');
    if (slideRelatorio == 19 || slideRelatorio == 28) {
        acao[1].classList.remove('slide-up');
        acao[1].classList.add('slide-down-relatorio');


        if (acao[0].className.split(' ').indexOf('slide-down-financeiro') + 1 > 0) {
            acao[0].classList.add('slide-up');
            setTimeout(function() {
                acao[0].classList.remove('slide-down-financeiro');
            }, 200);
        }

        if (acao[2].className.split(' ').indexOf('slide-down-settings') + 1 > 0) {
            acao[2].classList.add('slide-up');
            setTimeout(function() {
                acao[2].classList.remove('slide-down-settings');
            }, 200);
        }

    } else {
        acao[1].classList.add('slide-up');
        setTimeout(function() {
            acao[1].classList.remove('slide-down-relatorio');
        }, 200);
    }
});

subConfig.addEventListener('click', function(e) {
    let slideConfig = document.getElementById('slide-config').className.length;
    acao[2].classList.remove('slide-static');
    if (slideConfig == 19 || slideConfig == 28) {
        acao[2].classList.remove('slide-up');
        acao[2].classList.add('slide-down-settings');

        if (acao[0].className.split(' ').indexOf('slide-down-financeiro') + 1 > 0) {
            acao[0].classList.add('slide-up');
            setTimeout(function() {
                acao[0].classList.remove('slide-down-financeiro');
            }, 200);
        }

        if (acao[1].className.split(' ').indexOf('slide-down-relatorio') + 1 > 0) {
            acao[1].classList.add('slide-up');
            setTimeout(function() {
                acao[1].classList.remove('slide-down-relatorio');
            }, 200);
        }

    } else {
        acao[2].classList.add('slide-up');
        setTimeout(function() {
            acao[2].classList.remove('slide-down-settings');
        }, 200);
    }

});


window.onload = function() {
    let finances = document.querySelectorAll('.finances li');
    let report = document.querySelectorAll('.report li');
    let settings = document.querySelectorAll('.settings li');

    for (let i = 0; i < finances.length; i++) {
        if (finances[i].className == 'active') {
            acao[0].classList.add('slide-static');
        }
    }

    for (let i = 0; i < report.length; i++) {
        if (report[i].className == 'active') {
            acao[1].classList.add('slide-static');
        }
    }

    for (let i = 0; i < settings.length; i++) {
        if (settings[i].className == 'active') {
            acao[2].classList.add('slide-static');
        }
    }
}

function openModal(action) {
    let modal = document.querySelectorAll('.principal')[0];
    modal.style.display = "block";    
}

function closedModal() {
    let modal = document.querySelectorAll('.principal')[0];
    modal.style.display = "none";
}