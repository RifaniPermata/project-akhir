<?php
       include('koneksi.php');
       //pengambilan data dari database mysql yang sudah terkoneksi
       $sql = "SELECT * FROM updatet ORDER BY Proker ASC"; //query sql
       $result = $db->query($sql); //execute query sql
   
?>
<div class="container">
<h1>DAFTAR ROHIS SMKN 1 SUBANG </h1>
<a href="proker.php" class="btn btn-primary">Tambah data</a> <br><br>
<table id="tabel_updatet" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Dokumentasi</th>
            <th>Acara</th>
            <th>Proker </th>
            <th>Tempat </th>
            <th> Waktu</th>
            <th width=12%> Banyak Orang</th>
            <th> Biaya</th>
            <th width=16%>TANGGAL ENTRI</th>
            <th width= 15%>KELANJUTAN</th>
        </tr>
    </thead>

    <tbody>
        <?php 
             $no = 0;
            while( $data = $result->fetch_assoc()): ?>
                <tr class="text-center">
                <td> <?php echo $no +=1 ?> </td>
                    <td> <img src="upload/<?= $data['file']; ?>" alt="gambar" width=40/> </td>
                    <td><?php echo $data['Acara'];?></td>
                    <td><?php echo $data['Proker']; ?></td>
                    <td><?php echo $data['Tempat']; ?></td>
                    <td><?php echo $data['Waktu']; ?></td>
                    <td><?php echo $data['Banyak_orang'];?></td>
                    <td><?php echo $data['Biaya'];?></td>
                    <td><?php echo $data['tgl_entri']; ?></td>
                    <td> 
                        <a href = 'editt.php?id=<?= $data['id']; ?>' class='btn btn-info btn-sm'>edit</a>
                        -
                        <a href = 'hpus.php?id=<?= $data['id']; ?>' onclick="return confirm('Yakin dihapus ?');"
                         class='btn btn-warning btn-sm'>hapus</a>
                
                    </td>
                </tr>  
            <?php endwhile;?>
    </tbody>
    </div>