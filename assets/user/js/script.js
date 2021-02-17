const base_url = "http://localhost/aplikasi_penilaian/";

function textIntro() {
    $("#judul-awal span").velocity("transition.slideLeftIn", {
        stagger: 150,
        complete: function () {
            textSubIntro();
        }
    });
}

function textSubIntro() {
    $("#sub-awal").removeClass("sub-awal");
    $("#sub-judul-awal").velocity("transition.slideLeftIn", {
        stagger: 1500,
        complete: function () {
            btnNilai();
        }
    });
}

function btnNilai() {
    $("#btn-nilai").removeClass("btn-remove")
        .velocity("transition.bounceUpIn")
        .mouseenter(function () {
            $(this).velocity({ width: 200 });
        })
        .mouseleave(function () {
            $(this).velocity({ width: 230 });
        });
}

function animasiIntroOut() {
    $("#btn-nilai").velocity("transition.whirlOut", {
        stagger: 300,
        complete: function () {
            location.href = base_url + "user/home";
        }
    });
}

// Daftar Dosen
function navdaftarDosen() {
    $("#navbar").velocity("transition.slideLeftIn", {
        stagger: 1050,
        complete: function () {
            daftarDosen();
        }
    });
}

function daftarDosen() {
    $("#daftar_dosen").removeClass("hapus-daftar");
    $("#daftar_dosen .card").velocity("transition.slideLeftIn", {
        stagger: 150
    });
}

// Halaman Home

function halamanHome() {
    $("#navbar-home").velocity("transition.slideLeftIn", {
        stagger: 1050,
        complete: function () {
            navbarHome();
        }
    });

    $(".nav-link").click(function () {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    });
}

function navbarHome() {
    $("#home ").removeClass("hapus-home");
    $("#about ").removeClass("hapus-about");
    $("#daftar-dosen ").removeClass("hapus-daftar-dosen");
    $("#contact ").removeClass("hapus-contact");
    $("#footer ").removeClass("hapus-footer");
    $("#home .col-sm-12").velocity("transition.slideLeftIn", {
        stagger: 150
    });
}

function scrollElement() {
    $(window).scroll(function () {
        if ($(document).scrollTop() < 150) {
            $("#about ").velocity("transition.slideLeftIn", {
                stagger: 150
            }).stop();

        }

        if ($(document).scrollTop() < 250) {
            $(".nav .collapse a .about ").addClass("active");
            $("#about .about-isi").velocity("transition.slideLeftIn", {
                stagger: 150
            }).stop();
        }

        if ($(document).scrollTop() < 800) {
            $("#daftar-dosen ").velocity("transition.slideLeftIn", {
                stagger: 150
            }).stop();
        }

        if ($(document).scrollTop() < 830) {
            $("#daftar-dosen ").velocity("transition.slideLeftIn", {
                stagger: 150
            }).stop();
        }

        if ($(document).scrollTop() < 1400) {
            $("#contact ").velocity("transition.slideLeftIn", {
                stagger: 150
            }).stop();
        }

        if ($(document).scrollTop() < 1430) {
            $("#contact").velocity("transition.slideLeftIn", {
                stagger: 150
            }).stop();
        }
    });
}

// Halaman Rating
function navbarRating() {
    $("#navbar-rating").velocity("transition.slideLeftIn", {
        stagger: 1050,
        complete: function () {
            halamanRating();
        }
    });
}

function halamanRating() {
    $("#halaman-rating").removeClass("hapus-rating");
    $("#halaman-rating").velocity("transition.bounceUpIn", {
        stagger: 150
    });
}

function animasiNilai() {
    $("#halaman-rating").velocity("transition.whirlOut", {
        stagger: 300,
        complete: function () {
            location.href = base_url + "user/berhasil";
        }
    });
}

// Halaman berhasil
function halamanBerhasil() {
    $("#halaman-berhasil").removeClass("hapus-berhasil");
    $("#halaman-berhasil").velocity("transition.whirlIn", {
        stagger: 300
    });
}

function animasiBerhasil() {
    $("#halaman-berhasil").velocity("transition.flipBounceYOut", {
        stagger: 300,
        complete: function () {
            location.href = base_url + "user/daftarDosen";
        }
    });
}

function loading() {
    $('#btn-registrasi').click(function () {
        $("#btn-registrasi").append("<div class='spinner-border text-light' role='status'>  <span class='visually-hidden'>Loading...</span>  </div>");
    });

    $('#btn-lupa-password').click(function () {
        $("#btn-lupa-password").append("<div class='spinner-border text-light' role='status'>  <span class='visually-hidden'>Loading...</span>  </div>");
    });

    $('#btn-login-user').click(function () {
        $("#btn-login-user").append("<div class='spinner-border text-light' role='status'>  <span class='visually-hidden'>Loading...</span>  </div>");
    });

    $('#btn-reset-password').click(function () {
        $("#btn-reset-password").append("<div class='spinner-border text-light' role='status'>  <span class='visually-hidden'>Loading...</span>  </div>");
    });

}




$(document).ready(function () {
    textIntro();
    navdaftarDosen();
    halamanHome();
    scrollElement();
    navbarRating();
    halamanBerhasil();
    loading();

});



