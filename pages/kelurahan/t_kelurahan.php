<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Kelurahan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/style/t_ibadah.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-T4mxzZL3dXox4U6DR4jTptHuxYrwJp8jKcNk8y9QbJqXH1QyVlT8oRqkLJ9CtfhO4IVZ9lql0SiHvcV+9ThdVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <h3>Input Data Kelurahan</h3>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="kelurahan.php" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card px-3">
                    <form class="mb-3 mt-3" id="kelurahan-form" action="c_kelurahan.php" method="post">
                            <label for="kd-kelurahan">Kode Kelurahan:</label>
                            <input type="text" class="form-control" id="kd-kelurahan" name="kd-kelurahan" required>
                        
                            <label for="nama-kelurahan">Nama Kelurahan:</label>
                            <input type="text" class="form-control" id="nama-kelurahan" name="nama-kelurahan" required>
                        
                            <label for="jumlah-tempat">Jumlah Tempat Ibadah:</label>
                            <input type="number" class="form-control" id="jumlah-tempat" name="jumlah-tempat" required>

                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="button" class="btn btn-primary" value="Update" id="update-button" onclick="updateData()" style="display: none;">
                    </form>
                </div>
            </div>
           
    <!-- Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
