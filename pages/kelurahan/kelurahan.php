<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelurahan</title>
    <link rel="stylesheet" href="ibadah.css">
</head>
<body>
    <h2>Input Data Kelurahan</h2>
    <form id="kelurahan-form" action="c_kelurahan.php" method="post">
        <label for="kd-kelurahan">Kode Kelurahan:</label><br>
        <input type="text" id="kd-kelurahan" name="kd-kelurahan" required><br><br>
        
        <label for="nama-kelurahan">Nama Kelurahan:</label><br>
        <input type="text" id="nama-kelurahan" name="nama-kelurahan" required><br><br>
        
        <label for="jumlah-tempat">Jumlah Tempat:</label><br>
        <input type="number" id="jumlah-tempat" name="jumlah-tempat" required><br><br>
        
        <input type="submit" value="Submit">
        <input type="button" value="Update" id="update-button" onclick="updateData()" style="display: none;">
    </form>

    <!-- Tabel untuk menampilkan data yang sudah diinput -->
    <?php
    include '../../database/koneksi.php';

    // Query untuk mengambil data ibadah
    $query = "SELECT * FROM kelurahan";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Data yang sudah diinput:</h2>";
        echo "<table>";
        echo "<tr>
                <th>Kode Kelurahan</th>
                <th>Nama Kelurahan</th>
                <th>Jumlah Tempat Ibadah</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['kd_kelurahan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_kelurahan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jumlah_tempat_ibadah']) . "</td>";
            echo "<td>
                    <button onclick='selectData(" . json_encode($row) . ")'>Select</button>
                    <form action='d_kelurahan.php' method='post' style='display:inline;'>
                        <input type='hidden' name='kd-kelurahan' value='" . htmlspecialchars($row['kd_kelurahan']) . "'>
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
            document.getElementById('kd-kelurahan').value = data.kd_kelurahan;
            document.getElementById('nama-kelurahan').value = data.nama_kelurahan;
            document.getElementById('jumlah-tempat').value = data.jumlah_tempat_ibadah;
            document.getElementById('kelurahan-form').action = 'u_kelurahan.php';
            document.getElementById('update-button').style.display = 'inline';
            document.querySelector('input[type="submit"]').style.display = 'none';
        }

        function updateData() {
            document.getElementById('kelurahan-form').submit();
        }
    </script>
</body>
</html>
