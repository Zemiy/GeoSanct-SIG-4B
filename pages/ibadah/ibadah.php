<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Ibadah</title>
    <link rel="stylesheet" href="ibadah.css">
</head>
<body>
    <h2>Input Data Ibadah</h2>
    <form id="ibadah-form" action="c_ibadah.php" method="post">
        <label for="kd-tempat">Kode Tempat:</label><br>
        <input type="text" id="kd-tempat" name="kd-tempat" required><br><br>
        
        <label for="nama-tempat">Nama Tempat:</label><br>
        <input type="text" id="nama-tempat" name="nama-tempat" required><br><br>
        
        <label for="jenis-tempat">Jenis Tempat:</label><br>
        <input type="text" id="jenis-tempat" name="jenis-tempat" required><br><br>
        
        <label for="alamat-tempat">Alamat Tempat:</label><br>
        <textarea id="alamat-tempat" name="alamat-tempat" rows="4" required></textarea><br><br>
        
        <label for="kd-kelurahan">Kode Kelurahan:</label><br>
        <input type="text" id="kd-kelurahan" name="kd-kelurahan" required><br><br>
        
        <label for="kapasitas-tempat">Kapasitas Tempat:</label><br>
        <input type="number" id="kapasitas-tempat" name="kapasitas-tempat" required><br><br>
        
        <input type="submit" value="Submit">
        <input type="button" value="Update" id="update-button" onclick="updateData()" style="display: none;">
    </form>

    <!-- Tabel untuk menampilkan data yang sudah diinput -->
    <?php
    include '../../database/koneksi.php';

    // Query untuk mengambil data ibadah
    $query = "SELECT * FROM ibadah";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Data yang sudah diinput:</h2>";
        echo "<table>";
        echo "<tr>
                <th>Kode Tempat</th>
                <th>Nama Tempat</th>
                <th>Jenis Tempat</th>
                <th>Alamat Tempat</th>
                <th>Kode Kelurahan</th>
                <th>Kapasitas Tempat</th>
                <th>Aksi</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['kd_tempat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jenis']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kd_kelurahan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kapasitas']) . "</td>";
            echo "<td>
                    <button onclick='selectData(" . json_encode($row) . ")'>Select</button>
                    <form action='d_ibadah.php' method='post' style='display:inline;'>
                        <input type='hidden' name='kd-tempat' value='" . htmlspecialchars($row['kd_tempat']) . "'>
                        <input type='submit' value='Delete'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data yang diinput.</p>";
    }

    mysqli_close($conn);
    ?>

    <script>
        function selectData(data) {
            document.getElementById('kd-tempat').value = data.kd_tempat;
            document.getElementById('nama-tempat').value = data.nama;
            document.getElementById('jenis-tempat').value = data.jenis;
            document.getElementById('alamat-tempat').value = data.alamat;
            document.getElementById('kd-kelurahan').value = data.kd_kelurahan;
            document.getElementById('kapasitas-tempat').value = data.kapasitas;
            document.getElementById('ibadah-form').action = 'u_ibadah.php';
            document.getElementById('update-button').style.display = 'inline';
            document.querySelector('input[type="submit"]').style.display = 'none';
        }

        function updateData() {
            document.getElementById('ibadah-form').submit();
        }
    </script>
</body>
</html>
