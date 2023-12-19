<?php 
include "../include/header.php";
$id_obat = $_GET['id_obat'];
include "../config.php";
$sql = "select * from obat where id_obat = '$id_obat'";

$query = mysqli_query($con, $sql);
if(!$query) die ("Obat Tidak Ditemukan silahkan cek kembali");

$data = mysqli_fetch_array($query);
$nama_obat = $data['nama_obat'];
$kode_obat = $data['kode_obat'];
$jenis_obat = $data['jenis_obat'];
$stock = $data['stock'];
$foto = $data['gambar'];


?>

<div class="flex flex-col items-center justify-center p-5">
    <h2 class="text-2xl font-bold py-5">Detail Obat</h2>
    <div class="flex flex-col md:flex-row gap-5">
         <img src="<?php echo '../assets/images/'.$foto ?>" alt="gambar Obat" class='w-96'>
         <div>
            <h2 class="text-xl font-bold"><?php  echo $nama_obat ?></h2>
            <div class="flex gap-4 my-4 items-center font-sm text-gray-400" >
                <span><?php echo $kode_obat ?></span>
                <span><?php echo $jenis_obat ?></span>
                <span><?php echo $stock ?></span>
            </div>
            <div>
                <h2 class="text-xl font-bold">Deskripsi</h2>
                <p class="text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam, aliquid!</p>
            </div>
         </div>
    </div>
    <a href="<?php echo 'update_obat.php?id_obat='.$id_obat?>" class="mt-5 py-2 px-5 font-semibold bg-gray-300 hover:bg-orange-500 hover:text-slate-50 rounded-md">Update Obat</a>
</div>