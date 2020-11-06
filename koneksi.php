<head>
    <title>CRUD siswa PHP</title>
    <meta name="viewport" content="width=device=width, initial-scale=1, shring-to-fit=no">

     <link rel="stylesheet" href="tempat/css/bootstrap.min.css">
    <script src="tempat/js/bootstrap.min.js"></script>
    <script src="tempat/js/jquery-3.3.1.js"></script>
    <script src="tempat/js/jquery.dataTables.min.js"></script>
    <script src="tempat/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tabel_updatet').DataTable();
        });
    </script>


</head>

<?php
    // membuat koneksi php ke database
    //mysqli(source, username, password, nama_db)

    $db = new mysqli("localhost", "root", "", "rohis");
    if (mysqli_connect_errno()){
        echo "Error : " . mysqli_connect_error();
    }else{
        //echo "success";
    }
    
?>

