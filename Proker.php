<?php
    include("koneksi.php");
    include("foto.php");

    $submit = isset($_POST["siswa_submit"])? $_POST["siswa_submit"]:"";
    if($submit){
        $gambarku = gambar();
        if(!$gambarku):
            echo "<script>
                alert('gambar tidak ada');
            </script>";
        endif;
        $sql = "
            INSERT INTO updatet
            VALUES(
                    '',
                    '".$_POST["Acara"]."',
                    '".$_POST["Proker"]."',
                    '".$_POST["Tempat"]."',
                     '".$_POST["Waktu"]."',
                    '".$_POST["Banyak_orang"]."',
                    '".$_POST["Biaya"]."',
                    '$gambarku',

                    NOW()

            );
        ";
        $result = $db-> query ($sql);
        if(result){
            echo"
                <script>
                alert('Data berhasil ditambahkan!');
                window.location ='hasil.php';
                </script>
            ";
        }else{
            echo $sql;
        }
    }
    
?>

<!DOCTYPE html>
    <html>
        <head>
            <title></title>
        </head>
        <body>
            <h2 class="text-center">Masukan data terbaru</h2>
            <div class="container">
                <form action="" method="post" enctype="multipart/form-data" >
                <div class="">
                    <label>Dokumentasi </label>
                    <input class="col" type="file" name="file" required="required"/> 
                </div>
            <div class="form-group">
                <label>Acara</label>
                <input class="form-text col-lg-5" type="text" name="Acara" required="required"/>
                </div>
                <div class="form-group">
                    <label>Proker </label>
                    <input class="form-text col-lg-5" type="text" name="Proker" required="required"/> 
                </div>
                <div class="form-group">
                    <label>Tempat </label>
                    <input class="form-text col-lg-5" type="text" name="Tempat" required="required"/> 
                </div>
                <div class="form-group">
                    <label>Waktu </label>
                    <input class="form-text col-lg-5" type="text" name="Waktu" required="required" placeholder="YYYY-MM-DD"/> 
                </div>
                <div class="form-group">
                    <label>Banyak orang </label>
                    <input class="form-text col-lg-5" type="text" name="Banyak_orang" required="required"/> 
                </div>
                <div class="form-group">
                    <label> Biaya </label>
                    <input class="form-text col-lg-5" type="text" name="Biaya" placeholder="Rp." required="required"/> 
                </div>
               
                <input class="btn btn-primary" type="submit" name="siswa_submit" value="simpan">

            </form>
            </div>
        </body>
    </html>