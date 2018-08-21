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
             <form action="tujuh_2.php" method="post" enctype="multipart/form-data">
                NRP : <input type="text" name="nrp" class="form-control" placeholder="Masukkan NRP"> <br> <br>
                Nama: <input type="text" name="nama" class="form-control" placeholder="Masukan Nama"> <br> <br>
                Kode pangkat: <input type="text" name="kdpangkat" class="form-control" placeholder="Masukan Kode Pangkat"> <br> <br>
                Kode kesatuan: <input type="text" name="kdkesatuan"class="form-control" placeholder="Masukkan Kode Kesatuan"> <br> <br>
                Tempat Lahir: <input type="text" name="tempatlahir"class="form-control" placeholder="Masukkan Tempat Lahir"> <br> <br>
                Tanggal Lahir: <input type="date" name="tgllahir" class="form-control"> <br> <br>
                Foto (maks size = 2 MB): <input type="file" name="foto" class="form-control-file" id="fotoku"> <br><br>
                <input type="submit" value="Masukkan Data" name="submit" class="btn btn-primary">
            </form>
            </div>
            <div class="col-md-6"> <img id="blah" src="#" alt="Foto Kamu" class="img-responsive" style="width:50%; 
			margin-top:90px; margin-left:25px" /></div>
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
