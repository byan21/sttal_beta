<html>
    <head>  
        <title>Pertemuan 7</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head> 
<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered"> 
                    <tr> 
                        <th>No</th> 
                        <th>NRP</th> 
                        <th>Nama</th> 
                        <th>Kode Pangkat</th>
                        <th>Kode Kesatuan</th>  
                        <th>Tempat Lahir</th> 
                        <th>Tanggal Lahir</th>
                        <th>Edit/Delete</th>
                        <th>Foto</th>
                    </tr>
                <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "d321"; //nama database pakai punya pak Arief
                    // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);  
                    // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $myquery = mysqli_query($conn, "SELECT * FROM mahasiswa order by nama;");
                $i = 0;
                while ($row = mysqli_fetch_array($myquery)) {
                    $i++;
                    print "<tr>";
                    print "<td>" . $i . "</td>";
                    print "<td>" . $row['nrp'] . "</td>";
                    print "<td>" . $row['nama'] . "</td>";
                    print "<td>" . $row['kdpangkat'] . "</td>";
                    print "<td>" . $row['kdkesatuan'] . "</td>";
                    print "<td>" . $row['tempatlahir'] . "</td>";
                    print "<td>" . $row['tgllahir'] . "</td>";
                    print "<td> <a href=\"edit.php?id=$row[nrp]\">Edit</a> | <a href=\"delete.php?id=$row[nrp]\" onClick=\"return confirm('Apa kamu yakin mau dihapus?')\">Delete</a></td>";
                    print "<td>";
                    if (!empty($row['foto'])) {
                        print "<a href ='uploads/" . $row['foto'] . "' > Lihat Foto </a> ";
                    } else {
                        echo "Tidak ada foto";
                    }
                    print "</td>";
                    print "</tr>";
                }
                mysqli_close($conn);
                ?>
                </table>
                <a href="tujuh_1.php" class="btn btn-primary">Masukan Data</a>
            </div>
            <div class="col-md-4">
            <img src="logo.png" class="img-responsive" alt="Logo" style="width:65%;">
            </div>
        </div>
    </div>

</body>
</html>
