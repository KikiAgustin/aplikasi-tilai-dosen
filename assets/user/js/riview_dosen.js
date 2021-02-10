function ratingPertama(rating1) {
    document.getElementById("hasilRatingPertama").value = rating1;
}

function ratingKedua(rating2) {
    document.getElementById("hasilRatingKedua").value = rating2;
}

function tampilNama(tampil) {
    document.getElementById("hasilTampilNama").value = tampil;
}


$(document).ready(function () {


    $("#btn_rating").click(function () {
        let base_url = "149.129.180.250:81";
        let url = base_url + "User/hasilRiviewDosen/?callback=?";
        let rating1 = $("#hasilRatingPertama").val();
        let rating2 = $("#hasilRatingKedua").val();
        let saran = $("#saran").val();
        let id_dosen = $("#idDosen").val();
        let id_user = $("#id_user").val();
        let nama_user = $("#nama_user").val();
        let periode = $("#periode").val();
        var tampilNama = $("input:checked" + "#tampilNama").val();


        if ($.trim(rating1).length < 1) {
            Swal.fire({
                title: "Mohon kasih nilai untuk cara mengajar",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if ($.trim(rating2).length < 1) {
            Swal.fire({
                title: "Mohon kasih nilai untuk penyampaian materi",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else if ($.trim(saran).length < 10) {
            Swal.fire({
                title: "Harap Isi kolom saran dan minimal 10 karakter",
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else {
            let dataString = "rating1=" + rating1 + "&rating2=" + rating2 + "&saran=" + saran + "&id_dosen=" + id_dosen + "&id_user=" + id_user + "&nama_user=" + nama_user + "&cek_read=" + tampilNama + "&periode=" + periode;

            if ($.trim(rating1).length > 0) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function () {
                        $("#btn_rating").val("Connecting...");
                    },
                    success: function () {
                        $("#halaman-rating").velocity("transition.whirlOut", {
                            stagger: 300,
                            complete: function () {
                                location.href = base_url + "user/berhasil";
                            }
                        });
                    },
                });
            }
        }
        return false;
    });

});