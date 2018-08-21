<html>
    <head>
        <title>Pertemuan ke 5 topik 3</title>
    </head>
    <body>
        <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "d321";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
        $id=$_SESSION['nrp_lama']; //menerima variabel nrp lama dari file -> lima_2.php

        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $kdpangkat = $_POST['kdpangkat'];
        $kdkesatuan = $_POST['kdkesatuan'];
        $tempatlahir = $_POST['tempatlahir'];
        $tgllahir = $_POST['tgllahir']; 
         if ($_FILES['foto']['error'] > 0) {
            echo 'Error: ' . $_FILES['foto']['error'] . '<br>';
            $sql = "UPDATE `mahasiswa` SET `nrp`='$nrp',`nama`='$nama',`kdpangkat`='$kdpangkat',`kdkesatuan`='$kdkesatuan',`tempatlahir`='$tempatlahir',`tgllahir`= '$tgllahir' WHERE `nrp`='$id'";
        } else {
            $path=$_FILES['foto']['name'];
            $ext=pathinfo($path,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $nrp.'.'.$ext)) {
                echo  "Sukses memasukkan data";
                $datafoto= $nrp .'.'. $ext;
                $sql = "UPDATE `mahasiswa` SET `nrp`='$nrp',`nama`='$nama',`kdpangkat`='$kdpangkat',`kdkesatuan`='$kdkesatuan',`tempatlahir`='$tempatlahir',`tgllahir`= '$tgllahir', `foto`='$datafoto' WHERE `nrp`='$id'";
            }
        }
               
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
       
        if (mysqli_query($conn, $sql)) {
            header("Location:tujuh_3.php");
        }else {
            print "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        
        ?> 
    </body>
</html>
