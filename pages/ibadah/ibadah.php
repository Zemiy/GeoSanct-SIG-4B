<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tempat Ibadah</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/style/ibadah.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-T4mxzZL3dXox4U6DR4jTptHuxYrwJp8jKcNk8y9QbJqXH1QyVlT8oRqkLJ9CtfhO4IVZ9lql0SiHvcV+9ThdVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Tempat Ibadah</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="t_ibadah.php" class="btn btn-success">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>

        <?php
        include '../../database/koneksi.php';

        // Query untuk mengambil data ibadah
        $query = "SELECT * FROM ibadah";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
            echo "<thead class='thead-light'>
                    <tr>
                        <th scope='col'>Kode Tempat</th>
                        <th scope='col'>Nama Tempat</th>
                        <th scope='col'>Jenis Tempat</th>
                        <th scope='col'>Alamat Tempat</th>
                        <th scope='col'>Kode Kelurahan</th>
                        <th scope='col'>Kapasitas Tempat</th>
                        <th scope='col'>Opsi</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['kd_tempat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jenis']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kd_kelurahan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kapasitas']) . "</td>";
                echo "<td>
                        <button onclick='selectData(" . json_encode($row) . ")' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i> Edit</button>
                        <form action='d_ibadah.php' method='post' style='display:inline;'>
                            <input type='hidden' name='kd-tempat' value='" . htmlspecialchars($row['kd_tempat']) . "'>
                            <button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Delete</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='mt-3'>Tidak ada data yang diinput.</p>";
        }

        mysqli_close($conn);
        ?>

    </div>

    <!-- Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function selectData(data) {
            // Redirect to the input form page with data as query parameters
            let url = "t_ibadah.php?";
            for (let key in data) {
                url += `${key}=${encodeURIComponent(data[key])}&`;
            }
            window.location.href = url.slice(0, -1); // Remove the last '&'
        }
    </script>
</body>
</html>
