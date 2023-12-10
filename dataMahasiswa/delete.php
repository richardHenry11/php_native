<?php
session_start();

if( !isset($_SESSION["login"]) )
{
    header("Location: loginForm.php");
}

?>
<?php
include 'controller.php';

$id = $_GET['id'];

$data = new mhs();
$data->delDat($id);
header("Location: view.php")
?>