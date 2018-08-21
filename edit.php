<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "d321"; //sesuai nama database kalian masing-masing
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname); 
    
$id = $_GET['id'];
$query  = mysqli_query($conn, "SELECT * FROM `mahasiswa` where nrp='$id'");
$row        = mysqli_fetch_array($query);
session_start();  //memulai sesion
$_SESSION['nrp_lama'] = $id; //nrp lama dikirim ke beda file php -> lima_3.php

?>

<html>
      <head>  
           <title>Pertemuan 7</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head> 
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="edit_1.php" method="post" enctype="multipart/form-data">
                    NRP : <input type="text" value ="<?php echo $row['nrp']; ?>"name="nrp" class="form-control"> <br> <br>
                    Nama: <input type="text" value ="<?php echo $row['nama']; ?>"name="nama" class="form-control"> <br> <br>
                    Kode pangkat: <input type="text" value ="<?php echo $row['kdpangkat']; ?>"name="kdpangkat" class="form-control"> <br> <br>
                    Kode kesatuan: <input type="text" value ="<?php echo $row['kdkesatuan']; ?>" name="kdkesatuan" class="form-control"> <br> <br>
                    Tempat Lahir: <input type="text" value ="<?php echo $row['tempatlahir']; ?>" name="tempatlahir" class="form-control"> <br> <br>
                    Tanggal Lahir: <input type="date" value ="<?php echo $row['tgllahir']; ?>" name="tgllahir" class="form-control"> <br> <br>
                    Foto (maks size = 2 MB): <input type="file" name="foto" class="form-control-file" id="fotoku" class="form-control-file"> <br><br>
                    <input type="submit" value="Update Data" class="btn btn-success">
                </form>
            </div>
            <div class="col-md-6">
                <div> <img id="blah" src="uploads/<?php echo $row['foto']; ?>" alt="Foto Kamu" class="img-responsive" style="width:50%; margin-top:90px; margin-left:25px" /></div>
            </div>
        </div>
    </div>
        
    </body>

    <script>
        function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
        }

        $("#fotoku").change(function() {
        readURL(this);
        });
    </script>
</html>
