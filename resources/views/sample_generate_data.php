<?php

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

$faker = Faker::create('id_ID'); // Gunakan locale Indonesia

$kelurahanSurakarta = [
    "Laweyan", "Pajang", "Panularan", "Sriwedari",
    "Jebres", "Gandekan", "Jagalan", "Jebres", "Kepatihan Kulon", "Kepatihan Wetan", "Mojosongo", "Punggawan", "Tegalharjo",
    "Banjarsari", "Bumi", "Jajar", "Kadipiro", "Kestalan", "Ketelan", "Manahan", "Mangkubumen", "Nusukan", "Pucangsawit", "Sariharjo", "Setabelan",
    "Pasar Kliwon", "Balong", "Gajahan", "Joyosuran", "Kauman", "Kedung Lumbu", "Mojo", "Pasar Kliwon", "Semanggi", "Sangkrah",
    "Serengan", "Danukusuman", "Jayengan", "Joglo", "Kratonan", "Serengan", "Tipes"
];

$kategori = ['sarana_prasarana', 'pelayanan_publik', 'lainnya'];
$status = ['Pending', 'Diproses', 'Selesai', 'Ditolak'];


$sql = "INSERT INTO feedbacks (nama_pengusul, kategori, pesan, lokasi, biaya, status, created_at, updated_at) VALUES\n";

for ($i = 0; $i < 1000; $i++) {
    $nama = $faker->name;
    $kategoriRandom = $faker->randomElement($kategori);
    $pesan = $faker->paragraph;
    $lokasi = $faker->randomElement($kelurahanSurakarta);
    $biaya = $faker->optionalFloat(2, 0, 1000000); // Biaya opsional antara 0 - 1 juta
    $statusRandom = $faker->randomElement($status);
    $createdAt = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
    $updatedAt = $faker->dateTimeBetween($createdAt, 'now')->format('Y-m-d H:i:s');


    $sql .= "('$nama', '$kategoriRandom', '$pesan', '$lokasi', ";
    $sql .= ($biaya !== null) ? "$biaya, " : "NULL, ";  // Handle NULL untuk biaya
    $sql .= "'$statusRandom', '$createdAt', '$updatedAt')";

    if ($i < 999) {
        $sql .= ",\n";
    } else {
        $sql .= ";\n";
    }
}


// Simpan ke file SQL
$filename = 'feedback_sample_data.sql';
file_put_contents($filename, $sql);

echo "Data sample berhasil digenerate dan disimpan ke file $filename";

?>