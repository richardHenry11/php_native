<?php
session_start();

if( !isset($_SESSION["login"]) )
{
    header("Location: loginForm.php");
}

?>
<?php
include 'controller.php';



$dt = new mhs();

if(isset($_POST['submitEdit']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $oldPict = $_POST['oldPict'];
    $gambar = $_FILES['gambar'];
    $dir = 'pict/';
    $file_name = $gambar['name'];
    $file_tmp = $gambar['tmp_name'];
    $error = $gambar['error'];
        if ($error === 4)
            {
                $dt->defSave($id,$nama,$nim,$email,$jurusan,$oldPict);
                move_uploaded_file($gambar['tmp_name'], $dir.$oldPict);
            }else
                {
                    $dt->updateDat($id,$nama,$nim,$email,$jurusan,$file_name);
                    move_uploaded_file($file_tmp,$dir.$file_name);
                }    
    echo "<script>
            alert('Data Succesfully Edited');
            document.location.href = 'view.php';
        </script>";
}
?>