<?php 
    $server   = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "farmasidb";


    $con = mysqli_connect($server, $username, $password, $dbname);  

    if(!$con) die("cant connect on db");

    $sqlTable = "create table if not exists obat(
        id_obat int auto_increment not null primary key,
        kode_obat varchar(14) not null,
        nama_obat varchar(30) not null,
        jenis_obat varchar(10) not null,
        stock int not null default 0,
        gambar varchar(70) not null default '' 
    )";

    $query = mysqli_query($con, $sqlTable);
    
    if(!$query) die("cant create table");

?>