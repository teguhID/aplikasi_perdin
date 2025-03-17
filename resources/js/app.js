import "./bootstrap";

function formatRupiah(angka) {
    var reverse = angka.toString().split("").reverse().join(""),
        ribuan = reverse.match(/\d{1,3}/g);
    return ribuan.join(".").split("").reverse().join("");
}
