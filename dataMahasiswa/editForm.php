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
    <title>Edit Data</title>]
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container container-sm">
        <div class="card shadow">
            <div class="card-header">
                <center><h3 class="m-0 font-weight-bold text-warning">Edit Data Mahasiswa</h3></center>
            </div>
            <div class="card-body">
                <?php
                include 'controller.php';
                $id = $_GET['id'];

                $dat = new mhs();
                foreach($dat->showEdit($id) as $d):
                ?>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-floating mb-3">
                        <input  value="<?= $d['id'];?>" name="id" type="text" class="form-control m-0 font-weight-bold text-primary" id="floatingInput" placeholder="1" readonly>
                        <label for="floatingInput">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input  value="<?= $d['nama'];?>" name="nama" type="text" class="form-control" id="floatingInput" placeholder="Richard Hendrik">
                        <label for="floatingInput">Nama Mahasiswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input  value="<?= $d['nim'];?>" name="nim" type="text" class="form-control" id="floatingInput" placeholder="Richard Hendrik">
                        <label for="floatingInput">NIM</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input  value="<?= $d['email'];?>" name="email" type="email" class="form-control m-0 font-weight-bold text-primary" id="floatingInput" placeholder="choki@gmail.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input  value="<?= $d['jurusan'];?>" name="jurusan" type="text" class="form-control" id="floatingInput" placeholder="<?= $d['jurusan'];?>">
                        <label for="floatingInput">Prodi</label>
                    </div>
                    <input type="hidden" name="oldPict" value="<?=$d['gambar'];?>">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label" style="margin-left: 12px;"><strong class="m-0 font-weight-bold text-primary">Photo Mahasiswa</strong> <?= $d['gambar'];?></label><br>
                        <img style="margin-left: 50px;" src="pict/<?=$d['gambar'];?>" alt="Photo <?=$d['nama'];?>" width="80px" height="100px"><br>
                        <input value="<?=$d['gambar'];?>" name="gambar" src="pict" class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                    <a href="view.php"><button type="button" class="btn btn-secondary" style="margin-left:20px; float:left;">Back</button></a>
                    <button name="submitEdit" type="submit" class="btn btn-primary" style="margin-right:20px; float:right;" onclick="return confirm('Save These Changes?')">Save</button>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>