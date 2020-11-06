<?php
//Buat konfigurasi upload
//Folder tujuan upload file
include("koneksi.php");
function gambar(){
$eror		= false;
$folder		= 'upload/';
//type file yang bisa diupload
$file_type	= array('jpg','jpeg','png','gif','bmp','doc','docx','xls','xlsx','sql');
//tukuran maximum file yang dapat diupload
$max_size	= 10000000; // 1MB
if(isset($_POST['siswa_submit'])){
	//Mulai memproses data
	$file_name	= $_FILES['file']['name'];
	$file_size	= $_FILES['file']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		$pesan .= '- Type file yang anda upload tidak sesuai<br />';
	}
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= '- Ukuran file melebihi batas maximum<br />';
	}
	//check ukuran file apakah sudah sesuai

	if($eror == true){
		echo '<div id="eror">'.$pesan.'</div>';
	}
	else{
		//mulai memproses upload file
		if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$file_name)){
			//catat nama file ke database
			echo '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
		} else{
			echo "Proses upload eror";
		}
	}

	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$file_name;
            
	// Set path folder tempat menyimpan fotonya
	$path = "upload/".$fotobaru;
	$sql = "SELECT * FROM updatet WHERE id = '".$id_siswa."'";
	$result = mysqli_query($db,$sql);
	$connect =mysqli_query($connect, $sql);
	$baru = mysqli_fetch_array($connect);

	if(is_file("upload/".$data['file'])) // Jika foto ada
        unlink("upload/".$data['file']); //untuk menghapus foto
	
	
	
}
return $file_name;
}
?>