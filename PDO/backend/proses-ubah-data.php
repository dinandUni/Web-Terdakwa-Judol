<?php 
    include "kelas-judol.php";

    // objek
    $jdl = new Judol();

    // unbox dan set param
    $_id = $_POST['txtid'];
    $_nama = $_POST['txtnama'];
    $_no_rek = $_POST['txtno_rek'];
    $_status = $_POST['radstatus'];

    // manggil method
    $respon_status = $jdl->ubahData($_id, $_nama, $_no_rek, $_status);

    if($respon_status == true){
        header("location:../frontend/view-tampil-data.php");
    }else{
        echo "Data gagal diubah";
    }
?>