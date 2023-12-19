<?php 
    include '../include/header.php';
?>

<div class="flex flex-col items-center justify-center">
    <h2 class="text-2xl font-bold my-4">INPUT OBAT</h2>
    <form action="/save_data.php" method="post" enctype="multipart/form-data">
        <table class="table-auto">
            <tr>
                <td class="px-6 py-2 font-semibold">Foto</td>
                <td>
                    <input type="file" name="gambar">
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 font-semibold">Kode Obat </td>
                <td>
                    <input class="px-6 py-2 border-b focus:outline-none" type="text" name="kode_obat" id="">
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 font-semibold">Nama Obat</td>
                <td>
                    <input class="px-6 py-2 border-b focus:outline-none" type="text" name="nama_obat" id="">
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 font-semibold">Jenis Obat</td>
                <td>
                    <input class="px-6 py-2 border-b focus:outline-none" type="text" name="jenis_obat" id="">
                </td>
            </tr>
            <tr>
                <td class="px-6 py-2 font-semibold">Stock Obat</td>
                <td>
                    <input class="px-6 py-2 border-b focus:outline-none" type="text" name="stock" id="">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="py-2">
                    <button type="submit" name='proses' class="px-2 py-2 bg-gray-300 font-semibold rounded-md hover:bg-green-500">Simpan</button>
                    <button type="reset" name='reset' class="px-2 py-2 font-semibold bg-inherit ml-2 rounded-md hover:bg-gray-500">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>