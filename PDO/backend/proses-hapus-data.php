<?php 
    include "kelas-judol.php";

    // membuat objek
    $jdl = new Judol();

    // unbox dan set param
    $id = $_GET['id'];

    // manggil method   
    $respon_status = $jdl->hapusData($id);

    if($respon_status == true){
        header("location:../frontend/view-tampil-data.php");
    }else{
        echo "Data gagal dihapus";
    }
?>