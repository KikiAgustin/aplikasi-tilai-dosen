// Login dan register

function animasiLogin() {
    $("#login_user").velocity("transition.swoopIn", {
        stagger: 600

    });
}

$(document).ready(function () {
    animasiLogin();

    $("#btn_register").click(function () {

        let base_url = "http://localhost/aplikasi_penilaian/";
        let url = base_url + "AuthUser/saveRegistrasi";

        let nama_lengkap = $("#nama_lengkap").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let password1 = $("#password1").val();

        let at = email.indexOf("@");
        let dot = email.lastIndexOf(".");

        if ($.trim(nama_lengkap).length < 1) {
            Swal.fire({
                title: "Mohon isi kolom nama lengkap",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if ($.trim(email).length < 1) {
            Swal.fire({
                title: "Mohon isi kolom email",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if (at < 1 || dot < at + 2 || dot + 2 >= email.length) {
            Swal.fire({
                title: "Mohon Masukan email yang benar",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if ($.trim(password).length < 1) {
            Swal.fire({
                title: "Mohon isi kolom password",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if ($.trim(password).length < 8) {
            Swal.fire({
                title: "Password minimal 8 karakter",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if ($.trim(password1).length < 1) {
            Swal.fire({
                title: "Mohon isi kolom konfirmasi password",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if (password1 !== password) {
            Swal.fire({
                title: "Password yang anda masukan tidak sama",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else {
            let dataString = "nama_lengkap=" + nama_lengkap + "&email=" + email + "&password=" + password;

            if ($.trim(nama_lengkap).length > 0) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function () {
                        $("#btn_register").val("Connecting...");
                    },
                    success: function (data) {
                        alert(data["status"]);
                        console.log(data);

                        // if (data["status"] == "OK") {
                        //     window.location.href = base_url + "User/daftaDosen";
                        // } else {
                        //     alert(data);
                        // }
                    }
                });
            } return false;

        }
        return false;
    });

});

