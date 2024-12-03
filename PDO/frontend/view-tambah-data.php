<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data</title>
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

        h2{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }


        .radio-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-group{
            display: flex;
            justify-content: center;
        }

        #btn-submit{
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
            width: 30%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input[type="text"],
            input[type="submit"] {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    
    <form id="data-form" action="../backend/proses-tambah-data.php" method="POST">
        <h2>Form Data Terdakwa</h2>
        <label><strong>Nama:</strong></label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>

        <label><strong>Nomor Rekening:</strong></label>
        <input type="text" name="no_rek" id="no_rek" placeholder="Masukkan nomor rekening" required>

        <label><strong>Status:</strong></label>
        <div class="radio-group">
            <label><input type="radio" name="status" value="Aktif" checked> Aktif</label>
            <label><input type="radio" name="status" value="Tidak Aktif"> Tidak Aktif</label>
        </div>

        <div class="btn-group">
            <input id="btn-submit" type="submit" value="Tambah">
        </div>
    </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const form = document.getElementById('data-form');

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        Toast.fire({
            icon: "success",
            title: "Data berhasil ditambahkan"
        }).then(() => {
            form.submit();
        });
    });
</script>

</html>
