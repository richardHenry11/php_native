<?php
include 'model.php';

class mhs
{
    private $conn;
    function __construct()
    {
        global $connect;
        $this->conn = $connect;   
    }

    function read($awalData, $jumlahDataPerHalaman)
    {

        $queryRead = mysqli_query($this->conn,"SELECT * FROM `mahasiswa` ORDER BY `id` DESC LIMIT $awalData, $jumlahDataPerHalaman");
        while($rows = mysqli_fetch_assoc($queryRead))
        {
            $data[] = $rows;
        }
        return $data;
    }

    function create($nama,$nim,$email,$jurusan,$newFileName)
    {

        mysqli_query($this->conn, "INSERT INTO mahasiswa (nama, nim, email, jurusan, gambar) VALUES ('$nama','$nim','$email', '$jurusan', '$newFileName')");
        return mysqli_affected_rows($this->conn);
    }

    function defSave($id,$nama,$nim,$email,$jurusan,$oldPict)
    {
        mysqli_query($this->conn, "UPDATE `mahasiswa` SET `id`='$id',`nama`='$nama',`nim`='$nim',`email`='$email',`jurusan`='$jurusan',`gambar`='$oldPict' WHERE `id`='$id'");
    }

    function showEdit($id)
    {
    $query = mysqli_query($this->conn, "SELECT * FROM mahasiswa where id='$id'");
    while($rows = mysqli_fetch_assoc($query))
        {
            $data[] = $rows;
        }
    return $data;
    }

    function updateDat($id,$nama,$nim,$email,$jurusan,$file_name)
    {
        mysqli_query($this->conn, "UPDATE `mahasiswa` SET `id`='$id',`nama`='$nama',`nim`='$nim',`email`='$email',`jurusan`='$jurusan',`gambar`='$file_name' WHERE `id`='$id'");
    }

    function delDat($id)
    {
        mysqli_query($this->conn, "DELETE FROM mahasiswa WHERE id='$id'");
    }

    function search($keyword,$nim,$jurusan,$email)
    {
        $queryR = mysqli_query($this->conn, "SELECT * FROM mahasiswa WHERE
        nama LIKE '%$keyword%' OR nim LIKE '%$nim%' OR jurusan LIKE '%$jurusan%' OR email LIKE '%$email%'");  
        while($rows = mysqli_fetch_assoc($queryR))
        {
            $data[] = $rows;
        }
        return $data;
    }

    function regist($data)
    {
        $username = strtolower(stripslashes($data['username']));
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $confirm = mysqli_real_escape_string($this->conn, $data['confirmPass']);
        
        //cek username
        $result = mysqli_query($this->conn, "SELECT user FROM t_user WHERE user='$username'");
        if( mysqli_fetch_assoc($result) )
        {
            echo "<script>
                    alert('Username Has Been Registered!');
                </script>";
                return false;
        }

        //konfirmasi password
        if( $password !== $confirm )
        {
            echo "<script>
                    alert('Both Password must be Same');
                    
                </script>";
            
            return false;
        }
    // tambah user baru ke database
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($this->conn, "INSERT INTO t_user (user, pass) VALUE ('$username','$password')");
    
    echo "<script>
            alert('Data Has Been Successfully Added!');
        </script>";

    return mysqli_affected_rows($this->conn);
    }
}
?>