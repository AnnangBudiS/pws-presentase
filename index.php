<?php 
    include "./include/header.php";
    include "config.php";

    $sql = "select * from obat";
    $query = mysqli_query($con, $sql);
    
    if(!$query) die ("failed get data obat");

    
?>

<div class="p-2 flex flex-col items-center justify-center py-10 container mx-auto">
    <div class="flex items-center justify-between mb-5 w-full">
        <h2 class=" text-2xl font-bold ">Daftar Obat</h2>
        <a href="/page/input_obat.php" class='text-gray-300 hover:text-sky-500'>
            <i class="fa-solid fa-square-plus text-2xl"></i>
        </a>
    </div>
    <table class='table-auto w-full p-2 text-center '>
        <thead class="bg-sky-500">
            <th class="py-2 px-2 md:px-6 ">No</th>
            <th class="py-2 px-2 md:px-6 ">Kode Obat</th>
            <th class="py-2 px-2 md:px-6 ">Nama Obat</th>
            <th class="py-2 px-2 md:px-6 ">Jenis Obat</th>
            <th class="py-2 px-2 md:px-6 ">Stock</th>
            <th class="py-2 px-2 md:px-6 ">Operation</th>
        </thead>
        <tbody>
            <?php 
                $no = 0;
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<tr class='border-b'>";
                    echo "<td class='py-2 px-2 md:px-6'>". ++$no ."</td>";
                    echo "<td class='py-2 px-2 md:px-6'>".$row['kode_obat']."</td>";
                    echo "<td class='py-2 px-2 md:px-6'>".$row['nama_obat']."</td>";
                    echo "<td class='py-2 px-2 md:px-6'>".$row['jenis_obat']."</td>";
                    echo "<td class='py-2 px-2 md:px-6'>".$row['stock']."</td>";
                    echo "<td class='py-2 px-2 md:px-6 flex items-center justify-center gap-4 text-gray-400'>
                            <a href='/page/detail_obat.php?id_obat=".$row['id_obat']."'><i class='fa-solid fa-circle-info hover:text-orange-500'></i></a>
                            <a href='/page/update_obat.php?id_obat=".$row['id_obat']."'><i class='fa-solid fa-pencil hover:text-sky-500'></i></a>
                            <a href='/page/delete_obat.php?id_obat=".$row['id_obat']."'><i class='fa-solid fa-trash hover:text-red-500'></i></a>
                            </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
