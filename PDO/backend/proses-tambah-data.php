<?php 
    include "kelas-judol.php";

    //buat objek
    $jdl = new Judol();

    //unbox dan set param
    $_nama = $_POST['nama'];
    $_no_rek = $_POST['no_rek'];
    $_status = $_POST['status'];

    // manggil method  
    $respon_method = $jdl->simpanData($_nama, $_no_rek, $_status);

    if($respon_method = true){
        header("location: ../frontend/view-tampil-data.php");
    }else if($respon_method = false){
        echo "<script>";
        echo "alert('Gagal menambahkan data');";
        echo "</script>";
    }

?>