<?php 
include "../include/header.php";
$id_obat = $_GET['id_obat'];

include "../config.php";

$sql = "select * from obat where id_obat = $id_obat";

$query = mysqli_query($con, $sql);

$data = mysqli_fetch_array($query);
$kode_obat = $data['kode_obat'];
$nama_obat = $data['nama_obat'];
$jenis_obat = $data['jenis_obat'];
$stock = $data['stock'];
$gambar = $data['gambar'];

?>

<div class='p-4 flex flex-col items-center justify-center'>
    <h2 class="text-center text-2xl font-bold mb-5">Update Data Obat</h2>
    <form action="/save_data.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_obat ?>" name="id_obat">
        <div class="mb-4">
            <label class="font-semibold">Kode Obat</label>
            <input type="text" value="<?php echo $kode_obat ?>" name="kode_obat" class="w-full border-b focus:outline-none pl-2">
        </div>
        <div class="mb-4">
            <label class="font-semibold">Nama Obat</label>
            <input type="text" value="<?php echo $nama_obat ?>" name="nama_obat" class="w-full border-b focus:outline-none pl-2">
        </div>
        <div class="mb-4">
            <label class="font-semibold">Jenis Obat</label>
            <input type="text" value="<?php echo $jenis_obat ?>" name="jenis_obat" class="w-full border-b focus:outline-none pl-2">
        </div>
        <div class="mb-4">
            <label class="font-semibold">Stock Obat</label>
            <input type="text" value="<?php echo $stock ?>" name="stock" class="w-full border-b focus:outline-none pl-2">
        </div>
        <div class="mb-4">
            <input type="file" name="gambar">
            <input type="hidden" name="prev_image" value="<?php echo $gambar; ?>" class="w-full border-b focus:outline-none pl-2">
            <img src="<?php echo "../assets/thumb/t_".$gambar ?>" alt="gambar" class="w-52">
        </div>
        <div class="flex items-center gap-4 ">
            <button class="py-2 px-4 bg-gray-300 font-semibold hover:bg-sky-500 hover:text-white rounded-md" type="submit" name="EDIT">Simpan</button>            
            <button class="py-2 px-4 bg-inherit font-semibold hover:bg-orange-500 hover:text-white rounded-md " type="reset" name="RESET">Reset</button>            
        </div>
    </form>
</div>