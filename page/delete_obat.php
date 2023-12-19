<?php 
include "../include/header.php";

$id_obat = $_GET['id_obat'];

include "../config.php";

$sql = "select * from obat where id_obat = '$id_obat'";

$queryDelete = mysqli_query($con, $sql);

if(!$queryDelete) die("Data Obat Tidak di temukan");


$data  = mysqli_fetch_array($queryDelete);

$kode_obat = $data['kode_obat'];
$nama_obat = $data['nama_obat'];
$jenis_obat = $data['jenis_obat'];
$stock = $data['stock'];
$gambar = $data['gambar'];

echo "<div class='flex flex-col justify-center items-center'>";
echo "<h2 class='text-2xl font-bold my-5'>Hapus Obat</h2>";
echo "<div class='p-5 border rounded-md shadow flex flex-col items-center'>";
echo "<img src='../assets/thumb/t_".$gambar."' class='w-52'/>";
echo "<p class='text-xl font-bold'>".$nama_obat."</p>";
echo "<div class='flex gap-4 my-4 text-sm text-gray-400'>";
echo "<span>".$kode_obat."</span>";
echo "<span>".$jenis_obat."</span>";
echo "<span>".$stock."</span>";
echo "</div>";
echo "<div class='flex gap-4 items-center'>";
echo "<a href='delete_obat.php?id_obat=$id_obat&hapus=1' class='px-4 py-2 bg-gray-300 hover:bg-red-500 hover:text-white rounded-md'>Hapus</a>";
echo "<a href='/' class='px-4 py-2 bg-gray-300 hover:bg-sky-500 hover:text-white rounded-md'>Batal</a>";
echo "</div>";
echo "</div>";
echo "</div>";



if(isset($_GET['hapus'])) {
    $sql = "delete from obat where id_obat = '$id_obat'";
    $queryDelete = mysqli_query($con, $sql);
    if(!$queryDelete) {
        echo "Gagal hapus Barang";
    } else {
        header('Location: /');
    }
}
?>

