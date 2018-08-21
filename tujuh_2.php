        <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "d321";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);        

        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $kdpangkat = $_POST['kdpangkat'];
        $kdkesatuan = $_POST['kdkesatuan'];
        $tempatlahir = $_POST['tempatlahir'];
        $tgllahir = $_POST['tgllahir'];
        if ($_FILES['foto']['error'] > 0) {
            echo 'Error: ' . $_FILES['foto']['error'] . '<br>';
        } else {
            $path=$_FILES['foto']['name'];
            $ext=pathinfo($path, PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $nrp.'.'.$ext)) {
                echo  "Sukses memasukkan data";
                $datafoto= $nrp .'.'. $ext;
            }
        }


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO mahasiswa (nrp, nama,kdpangkat,kdkesatuan,tempatlahir,tgllahir,foto) 
               VALUES ('" .$nrp. "','" .$nama. "',$kdpangkat,
               $kdkesatuan,'" .$tempatlahir. "','" .$tgllahir. "','" . $datafoto. "')";

        if (mysqli_query($conn, $sql)) {
            print "Tambah data berhasil ";
            print "<a href= tiga_2.php>lihat data</a>";
        }else {
            print "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        
        ?> 
