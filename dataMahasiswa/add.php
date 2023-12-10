<?php
session_start();

if( !isset($_SESSION["login"]) )
{
    header("Location: loginForm.php");
}

?>
<?php
include 'controller.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$gambar = $_FILES['gambar'];

$dat = new mhs();
if(isset($_POST['submitAdd']))
                {
                    $dir = "pict/";
                    $file_name = $gambar ['name'];
                    $file_size = $gambar['size'];
                    $error = $gambar['error'];
                    $extValid = ['jpg','jpeg','png'];
                    $extPict = explode('.', $file_name);
                    $extPict = strtolower(end($extPict));
                    //cek ekstensi gambar
                        if( !in_array($extPict, $extValid))
                            {
                                echo "<script>
                                        alert('you must upload file contains (jpg,jpeg,png) extension!');
                                        document.location.href = 'view.php';
                                    </script>";
                                return false;
                            }
                    //cek ukuran gambar
                        if($file_size > 1000000)
                        {
                            echo "<script>
                                    alert('image is too big! find image that less than 1mb'); 
                                    document.location.href ='view.php';
                                </script>";
                            return false;
                        }
                    //cek error gambar
                        if( $error === 4 )
                            {
                                echo "<script>
                                        alert('Choose Pict First! input failed 004');
                                        document.location.href = 'view.php';
                                    </script>";
                                
                                return false;
                
                            }
                    
                     
                        //generate nama file baru setiap upoad 
                        $newFileName = uniqid();
                        $newFileName .= '.';
                        $newFileName .= $extPict;
                        
                        // data terkirim
                        move_uploaded_file($gambar['tmp_name'],$dir.$newFileName);
                        $dat->create($nama,$nim,$email,$jurusan,$newFileName);
                        
                        echo "<script>
                                alert('Data Succesfully Added!')
                                document.location.href= 'view.php';
                            </script>";


                        
                       
            }                                   
    
?>