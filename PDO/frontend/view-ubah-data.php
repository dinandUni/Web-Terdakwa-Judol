<?php 
include "../backend/kelas-judol.php";

// Membuat objek
$jdl = new Judol();

if (!isset($_GET['id'])) {
    echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error</title>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Data belum dipilih',
                        text: 'Silahkan pilih data terlebih dahulu',
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            window.location.href = 'view-tampil-data.php';
                        }
                    });
                });
            </script>
        </body>
        </html>
    ";
    exit;
}

// Mengambil parameter ID
$id = $_GET['id'];

// Memanggil metode untuk mendapatkan data berdasarkan ID
$data_by_id = $jdl->tampilkanDataById($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Terdakwa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .radio-group {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 30%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .btn-group{
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
            text-align: center;
            display: block;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            padding: 10px;
            width: 25%;
        }

        .btn-cancel:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="../backend/proses-ubah-data.php" method="POST">
            <h2>Edit Data Terdakwa</h2>
            <?php foreach ($data_by_id as $d): ?>
                <label>ID:</label>
                <strong><?= $d['id']; ?></strong>
                <input type="hidden" name="txtid" value="<?= $d['id']; ?>" readonly>

                <label for="txtnama">Nama Terdakwa:</label>
                <input type="text" name="txtnama" id="txtnama" value="<?= $d['nama']; ?>" required>

                <label for="txtno_rek">Nomor Rekening:</label>
                <input type="text" name="txtno_rek" id="txtno_rek" value="<?= $d['no_rek']; ?>" required>

                <label>Status:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="radstatus" value="Aktif" <?= $d["status"] === "Aktif" ? 'checked' : ''; ?>> Aktif
                    </label>
                    <label>
                        <input type="radio" name="radstatus" value="Tidak Aktif" <?= $d["status"] === "Tidak Aktif" ? 'checked' : ''; ?>> Tidak Aktif
                    </label>
                </div>

                <div class="btn-group">
                    <input type="submit" value="Ubah">
                    <a href="view-tampil-data.php" class="btn-cancel">Batal</a>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</body>

</html>
