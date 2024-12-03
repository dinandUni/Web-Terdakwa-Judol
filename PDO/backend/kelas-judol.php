<?php
class Judol
{
    //Attribute
    //Attribute yang berhubungan dengan konfigurasi
    public $host = "127.0.0.1";
    public $nama = "db_judol";
    public $user = "root";
    public $pass = "";
    public $db;

    //Konstruktor
    //Fungsi yang otomatis terpanggil ketika objek dibuat
    public function __construct()
    {
        //String connection: string untuk terhubung dg db
        $this->db = new PDO(
            "mysql:host={$this->host};dbname={$this->nama}",
            $this->user,
            $this->pass
        );
    }

    //SELECT
    public function tampilkanData()
    {
        //Query
        $query = $this->db->prepare(
            "SELECT * FROM tb_terdakwa"
        );

        //Menjalankan Query
        $query->execute();

        //Menampung data hasil query ke dalam arry
        $data = $query->fetchAll();

        //kembalikan ke yg memanggil
        return $data;
    }

    // INSERT
    public function simpanData($_nama, $_no_rek, $_status)
    {
        $query = $this->db->prepare(
            "INSERT INTO tb_terdakwa (nama, no_rek, status) VALUES (:nama, :no_rek, :status)"
        );

        $query->bindParam(":nama", $_nama);
        $query->bindParam(":no_rek", $_no_rek);
        $query->bindParam(":status", $_status);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // UPDATE
    // ada 2 proses : 
    // 1. Select ... where untuk nampilkan data laluu..
    // 2. Update ... untuk update data

    public function tampilkanDataById($id)
    {
        $query = $this->db->prepare(
            "SELECT * FROM tb_terdakwa WHERE id=:id"
        );

        $query->bindParam(":id", $id);
        $query->execute();

        $data = $query->fetchAll();

        return $data;
    }

    public function ubahData($_id, $_nama, $_no_rek, $_status)
    {
        $query = $this->db->prepare(
            "UPDATE tb_terdakwa SET nama=:nama, no_rek=:no_rek, status=:status WHERE id=:id"
        );

        $query->bindParam(":id", $_id);
        $query->bindParam(":nama", $_nama);
        $query->bindParam(":no_rek", $_no_rek);
        $query->bindParam(":status", $_status);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // DELETE
    public function hapusData($id)
    {
        $query = $this->db->prepare(
            "DELETE FROM tb_terdakwa WHERE id=:id"
        );

        $query->bindParam(":id", $id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
