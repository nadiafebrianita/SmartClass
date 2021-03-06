    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9">
      <div class="card mb-4">
    <!-- Card header -->
        <div class="card-header">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Import</h3></div>
        <div class="col text-right">
            <a href="<?php echo base_url("excel/format.xlsx"); ?>" class="btn btn-sm btn-success">Download Format</a>
        </div>
        </div>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
        <div class="row">
            <div class="col">
            <form method="post" action="<?php echo site_url("mhsmatkul/form"); ?>" enctype="multipart/form-data">
              <div class="form-group">
              <div class="row">
              <div class="col-sm-1"><label class="form-control-label">Pilih File</label></div>
              <div class="col-sm-3"><input type="file" class="btn btn-sm" name="file"></div>
              <div class="col-sm-4"><input type="submit" class="btn btn-sm btn-success" name="preview" value="Preview"></div>
              </div>
            </div>
            </form>
            </div>
            </div>
            <?php
            if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                if(isset($upload_error)){ // Jika proses upload gagal
                echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                die; // stop skrip
                }
                
                // Buat sebuah tag form untuk proses import data ke database
                echo "<form method='post' action='".base_url("index.php/mhsmatkul/import")."'>";
                
                // Buat sebuah div untuk alert validasi kosong
                echo "<div style='color: red;' id='kosong'>
                Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";
                
                echo "<table border='1' cellpadding='8'>
                <tr>
                <th colspan='5'>Preview Data</th>
                </tr>
                <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                </tr>";
                
                $numrow = 1;
                $kosong = 0;
                
                // Lakukan perulangan dari data yang ada di excel
                // $sheet adalah variabel yang dikirim dari controller
                foreach($sheet as $row){ 
                // Ambil data pada excel sesuai Kolom
                $nim = $row['A']; // Ambil data NIS
                $nama = $row['B']; // Ambil data nama
                
                // Cek jika semua data tidak diisi
                if($nim == "" && $nama == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                    // Validasi apakah semua data telah diisi
                    $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    
                    // Jika salah satu data ada yang kosong
                    if($nim == "" or $nama == ""){
                    $kosong++; // Tambah 1 variabel $kosong
                    }
                    
                    echo "<tr>";
                    echo "<td".$nim_td.">".$nim."</td>";
                    echo "<td".$nama_td.">".$nama."</td>";
                    echo "</tr>";
                }
                
                $numrow++; // Tambah 1 setiap kali looping
                }
                
                echo "</table>";
                
                // Cek apakah variabel kosong lebih dari 0
                // Jika lebih dari 0, berarti ada data yang masih kosong
                if($kosong > 0){
                ?>  
                <script>
                $(document).ready(function(){
                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                    
                    $("#kosong").show(); // Munculkan alert validasi kosong
                });
                </script>
                <?php
                }else{ // Jika semua data sudah diisi
                echo "<hr>";
                
                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button class='btn btn-primary' type='submit' name='import'>Import</button>";
                echo "<a class='btn' href='".base_url("mhsmatkul/form")."'>Cancel</a>";
                }
                
                echo "</form>";
            }
            ?>
        
