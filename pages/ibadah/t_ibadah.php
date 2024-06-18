<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Ibadah</title>
    <link rel="stylesheet" href="../../assets/style/t_ibadah.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-T4mxzZL3dXox4U6DR4jTptHuxYrwJp8jKcNk8y9QbJqXH1QyVlT8oRqkLJ9CtfhO4IVZ9lql0SiHvcV+9ThdVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <h3>Input Data Tempat ibadah</h3>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="ibadah.php" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    <div>
        <div class="col">
            <div class="card px-3">
                    <form class="col-md-6 mb-3 mt-3" id="ibadah-form" action="c_ibadah.php" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3 mt-3">
                            <label for="kd-tempat">Kode Tempat:</label><br>
                            <input type="text" id="kd-tempat" name="kd-tempat" required><br><br>
                        </div>
                        <div class="col-md-6 mb-3 mt-3">
                            <label for="nama-tempat">Nama Tempat:</label><br>
                            <input type="text" id="nama-tempat" name="nama-tempat" required><br><br>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 mb-3"> 
                            <label for="kd-kelurahan">Kode Kelurahan:</label><br>
                            <input type="text" id="kd-kelurahan" name="kd-kelurahan" required><br><br>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kapasitas-tempat">Kapasitas Tempat:</label><br>
                            <input type="number" id="kapasitas-tempat" name="kapasitas-tempat" required><br><br>
                        </div>        
                    </div>  
                            <label for="jenis-tempat">Jenis Tempat:</label><br>
                            <input type="text" id="jenis-tempat" name="jenis-tempat" required><br><br>

                            <label for="alamat-tempat">Alamat Tempat:</label><br>
                            <textarea id="alamat-tempat" name="alamat-tempat" rows="4" required></textarea><br><br>

                        <input type="submit" value="Submit">
                        <input type="button" value="Update" id="update-button" onclick="updateData()" style="display: none;">
                    </form>
            </div>
        </div>
    </div>
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

        // Populate the form if query parameters are present
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('kd_tempat')) {
                document.getElementById('kd-tempat').value = urlParams.get('kd_tempat');
                document.getElementById('nama-tempat').value = urlParams.get('nama');
                document.getElementById('jenis-tempat').value = urlParams.get('jenis');
                document.getElementById('alamat-tempat').value = urlParams.get('alamat');
                document.getElementById('kd-kelurahan').value = urlParams.get('kd_kelurahan');
                document.getElementById('kapasitas-tempat').value = urlParams.get('kapasitas');
                document.getElementById('ibadah-form').action = 'u_ibadah.php';
                document.getElementById('update-button').style.display = 'inline';
                document.querySelector('input[type="submit"]').style.display = 'none';
            }
        }
    </script>
</body>
</html>
