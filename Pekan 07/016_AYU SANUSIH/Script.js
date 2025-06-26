// Menyapa pengguna lewat alert
alert("Selamat datang di program interaktif!");

// Mengambil input nama dan umur dari pengguna
let namaPengguna = prompt("Siapa nama kamu?");
let usiaPengguna = parseInt(prompt("Berapa usiamu?"));

// Fungsi untuk memberi salam berdasarkan usia
function salamPersonal(nama, usia) {
  if (usia < 18) {
    return `Hai ${nama}, kamu masih muda!`;
  } else if (usia <= 40) {
    return `Halo ${nama}, semangat terus ya!`;
  } else {
    return `Salam hangat, ${nama}. Semoga harimu menyenangkan!`;
  }
}

// Memanggil fungsi dan menampilkan hasilnya
let hasilSalam = salamPersonal(namaPengguna, usiaPengguna);
console.log(hasilSalam);
alert(hasilSalam);

