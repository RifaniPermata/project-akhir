<?php
    include("koneksi.php");
    include("foto.php");
    
    if (isset($_GET['id'])) {
        $row = $db->query("SELECT * FROM updatet WHERE id = {$_GET['id']}")->fetch_assoc();
    } else {
        // header("Location: hasil.php");
    }
    
    if (isset($_POST['siswa_submit'])) {
        global $row;

        if (isset($_FILES['file'])) {
            $file = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], "upload/{$_FILES['file']['name']}");
        }

        $sql = "
        UPDATE updatet SET
        Acara ='".$_POST['Acara']."',
        Proker = '".$_POST['Proker']."',
        Tempat = '".$_POST['Tempat']."',
        Waktu = '".$_POST['Waktu']."',
        Banyak_orang = '".$_POST['Banyak_orang']."',
        Biaya = '".$_POST['Biaya']."',
        file = '$file.'
        
        where id = '".$_POST['id']."'
        ;";

        $riw = $db->query($sql);
        
         if($riw) header("Location: hasil.php");
    }

?>


    <html>
        <head>
            <title></title>
        </head>
        <body>
            <h2 class="text-center">Edit data</h2>
            <div class="container">
                <form action="editt.php" method="POST" enctype="multipart/form-data">
                <img src="upload/<?=  $row['file'] ?>" width="50" alt="">
                <input type="hidden" name="id" value="<?php echo $row["id"];?>"/>
                        <div class="form-label-group">
                            <label>Dokumentasi </label>
                            <input class="col" type="file" name="file" 
                            value="upload/<?= $row['file']; ?>" id="fil"/>
                        </div>  
                        <div class="form-group">
                            <label>Acara</label>
                            <input class="form-text col-lg-5" type="text" name="Acara" required="required"
                             value="<?php echo $row["Acara"];?>"/>
                        </div>
                        <div class="form-group">
                            <label>Proker </label>
                            <input class="form-text col-lg-5" type="text" name="Proker" required="required" 
                            value="<?php echo $row["Proker"];?>"/> 
                        </div>
                        <div class="form-group">
                            <label>Tempat </label>
                            <input class="form-text col-lg-5" type="text" name="Tempat" required="required" 
                            value="<?php echo $row["Tempat"];?>"/> 
                        </div>
                        <div class="form-group">
                            <label>Waktu </label>
                            <input class="form-text col-lg-5" type="text" name="Waktu" required="required" 
                            placeholder="YYYY-MM-DD" value="<?php echo $row["Waktu"];?>"/> 
                        </div>
                        <div class="form-group">
                            <label>Banyak orang </label>
                            <input class="form-text col-lg-5" type="text" name="Banyak_orang" required="required"
                            value="<?php echo $row["Banyak_orang"];?>"/> 
                        </div>
                        <div class="form-group">
                            <label> Biaya </label>
                            <input class="form-text col-lg-5" type="text" name="Biaya" placeholder="Rp." required="required"
                            value="<?php echo $row["Biaya"];?>"/> 
                        </div>
                        <button class="btn btn-primary" type="submit" name="siswa_submit" value="1">Submit</button>

            </form>
            </div>
        </body>
    </html>
    