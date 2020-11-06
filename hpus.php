<?php
	include('koneksi.php');
	$id_siswa = $_GET['id'];
		$sql = "DELETE FROM updatet WHERE id = '".$id_siswa."'";
		$result = $db->query($sql);
		
    header("location:hasil.php?pesan=hapus");
    
if($result){
    echo "
    <script>
    alert('Data berhasil ubah !');
    window.location = 'hasil.php';
    </script>
    ";
    }else{
    echo $sql;
    }
    ?>
    