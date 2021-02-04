const tanggalTujuan = new Date('September 30, 2021 00:00:00').getTime();

const hitungMundur = setInterval(function () {

    const sekarang = new Date().getTime();
    const selisih = tanggalTujuan - sekarang;

    const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));

    const jamMesin = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));

    const menitMesin = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));

    const detikMesin = Math.floor(selisih % (1000 * 60) / (1000));

    const jam = document.getElementById('jam');
    jam.innerHTML = jamMesin;

    const menit = document.getElementById('menit');
    menit.innerHTML = menitMesin;

    const detik = document.getElementById('detik');
    detik.innerHTML = detikMesin;

    if (selisih < 0) {
        clearInterval(hitungMundur);
        jam.innerHTML = 'habis';
        menit.innerHTML = 'habis';
        detik.innerHTML = 'habis';
    }

}, 1000);


