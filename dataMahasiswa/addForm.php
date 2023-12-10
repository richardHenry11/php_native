<?php
session_start();

if( !isset($_SESSION["login"]) )
{
    header("Location: loginForm.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Form</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <center><h3 class="m-0 font-weight-bold text-success mb-3 mt-3">Add Mahasiswa</h3></center>
            </div>
            <div class="card-body">
                <?php
                include 'controller.php';?>
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input name="nama" type="text" class="form-control" id="floatingInput" placeholder="Choki Skinhead">
                        <label for="floatingInput">Nama Mahasiswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="nim" type="text" class="form-control" id="floatingInput" placeholder="D111911078">
                        <label for="floatingInput">NIM</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="chokigans99@gmail.com">
                        <label for="floatingInput">Email Mahasiswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="jurusan" type="text" class="form-control" id="floatingInput" placeholder="Teknik Ngaduk Semen">
                        <label for="floatingInput">Prodi Mahasiswa</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label" style="margin-left: 12px;">Upload Photo Mahasiswa</label>
                        <input name="gambar" src="pict" class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                    <a href="view.php"><button type="button" class="btn btn-secondary mb-3 mt-3" style="margin-left: 20px; float : left;">Back</button></a>
                    <button name="submitAdd" type="submit" class="btn btn-success mb-3 mt-3" style="margin-right: 20px; float : right;">Add Data</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>