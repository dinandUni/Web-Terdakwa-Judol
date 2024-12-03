<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Terdakwa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f4f4f9;
        }

        h2 {
            text-align: center;
            margin: 30px 0 40px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin: 0 5px;
        }

        .btn-tambah {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-bottom: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data Terdakwa Kasus Judi Online</h2>
        <a href="view-tambah-data.php" class="btn-tambah">Tambah Data</a>

        <?php
        include "../backend/kelas-judol.php";

        $jdl = new Judol();
        $dtt = $jdl->tampilkanData();

        $no_urut = 1;

        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>No</th>";
        echo "<th>ID</th>";
        echo "<th>Nama Terdakwa</th>";
        echo "<th>Nomor Rekening</th>";
        echo "<th>Status</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        foreach ($dtt as $d) {
            echo "<tr>";
            echo "<td>" . $no_urut++ . "</td>";
            echo "<td>" . $d["id"] . "</td>";
            echo "<td>" . $d["nama"] . "</td>";
            echo "<td>" . $d["no_rek"] . "</td>";
            echo "<td>" . $d["status"] . "</td>";
            echo "<td>";
            echo "<a href='view-ubah-data.php?id=" . $d["id"] . "' class='btn'>Ubah</a>";
            echo " <a href='#' class='btn btn-danger' onclick='confirmDelete(" . $d["id"] . ")'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
        ?>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../backend/proses-hapus-data.php?id=${id}`;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Data Anda aman.",
                        icon: "error"
                    });
                }
            });
        }
    </script>
</body>

</html>
