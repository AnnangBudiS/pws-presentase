<?php 

    include "./include/header.php";

    if(isset($_POST['id_obat'])) {
        $id_obat  = $_POST['id_obat'];
        $gambar_lama = $_POST['prev_image'];
        $simpan   = "EDIT";
    }else {
        $simpan  = "BARU";
    }

    $kode_obat     = $_POST['kode_obat']; 
    $nama_obat     = $_POST['nama_obat'];
    $jenis_obat    = $_POST['jenis_obat'];
    $stock         = $_POST['stock'];

    $gambar  = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];

    $maxSize = 15000000;
    $allowedType = array("image/jpeg", "image/png", "image/pjpeg");

    $dirFoto = "./assets/images";
      if(!is_dir($dirFoto))
        mkdir($dirFoto);
    $fileTujuanFoto =$dirFoto."/".$gambar;

    $dirThumb  = "./assets/thumb";
        if(!is_dir($dirThumb))
        mkdir($dirThumb);
    $fileTujuanThumb =$dirThumb."/t_" .$gambar;

    $validation = "YA";

    if($size > 0) {
        if($size > $maxSize) {
            echo "Size file terlalu besar! <br />";
            $validation = "TIDAK";
        }
        if(!in_array($type, $allowedType)) {
            echo "Type gambar tidak sesuai <br/>";
            $validation = "TIDAK";
        }
    }

    if(strlen(trim($kode_obat)) == 0) {
        echo "Kode Obat harus Di isi <br/>";
        $validation = "TIDAK";
    }

    if(strlen(trim($nama_obat)) == 0){
        echo "Nama Obat harus di isi </br>";
        $validation = "TIDAK";
    }
    if(strlen(trim($jenis_obat)) == 0){
        echo "Jenis Obat harus di isi </br>";
        $validation = "TIDAK";
    }
    if(strlen(trim($stock)) == 0){
        echo "Nama Obat harus di isi </br>";
        $validation = "TIDAK";
    }

    if($validation == "TIDAK"){
        echo "Masih terdapat Kesalahan Silahkan ulaangi Kembali";
        echo "<button onClick='self.history.back()'>Kembali</button>";
        exit;
    }

    include 'config.php';
    
    if($simpan == "EDIT"){
        if($size == 0){
            $gambar = $gambar_lama;
        }

        $sql = "update obat set 
                kode_obat = '$kode_obat',
                nama_obat = '$nama_obat',
                jenis_obat = '$jenis_obat',
                stock = $stock,
                gambar = '$gambar' 
                where id_obat = $id_obat ";
    } else {

        $sql = "insert into obat(kode_obat, nama_obat, jenis_obat, stock, gambar)
                values 
                ('$kode_obat', '$nama_obat', '$jenis_obat', $stock, '$gambar')";
            }

    $query = mysqli_query($con, $sql);

    if(!$query){
        echo "Gagal menyimpan data obat";
    }else {
        echo "<div class='flex flex-col items-center justify-center mt-20 gap-5'>";
        echo "<h2 class='text-4xl font-bold'>Data obat telah di input</h2>";
        echo "<a href='/' class='py-3 px-6 text-gray-400 bg-inherit transition-all duration-150 hover:bg-gray-500 hover:text-white hover:shadow-md rounded-md'>Lihat Daftar Obat</a>";
        echo "</div>";
    }

    if($size > 0) {
        if(!move_uploaded_file($tmpName, $fileTujuanFoto)){
            echo "<div class='flex flex-col items-center justify-center mt-20 gap-5'>";
            echo "<h2 class='text-4xl font-bold'>Data obat telah di input</h2>";
            echo "<a href='/' class='py-3 px-6 text-gray-400 bg-inherit transition-all duration-150 hover:bg-gray-500 hover:text-white hover:shadow-md rounded-md'>Lihat Daftar Obat</a>";
            echo "</div>";
        }else {
            buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
        }
    }

    function buat_thumbnail($file_src, $file_dst) {
        list($w_src, $h_src, $type) = getimagesize($file_src);

        switch($type){
            case 1 :
                $img_src = imagecreatefromgif($file_src);
                break;
            case 2 :
                 $img_src = imagecreatefromjpeg($file_src);
                 break;
            case 3 : 
                $img_src = imagecreatefrompng($file_src);
                break;
        }

        $thumb = 1000;
        if($w_src > $h_src){ 
            $w_dst = $thumb;
            $h_dst = round($thumb / $w_src * $h_src);
        } else{
            $w_dst = round($thumb / $h_src * $w_src);
            $h_dst = $thumb;
        }

        $img_dst = imagecreatetruecolor($w_dst, $h_dst);

        imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $w_dst, $h_dst, $w_src, $h_src);
        imagejpeg($img_dst, $file_dst);
        imagedestroy($img_src);
        imagedestroy($img_dst);
    }
?>