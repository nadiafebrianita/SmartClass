    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
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
              <h3 class="mb-0">Import Mahasiswa</h3></div>
          <div class="col text-right">
              <a href="<?php echo base_url("csv/Mahasiswa.csv"); ?>" class="btn btn-sm btn-success">Download Format</a>
          </div>
        </div>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
        <div class="row">
          <div class="col">
            <div class="form-group">
              <form method="post" action="<?php echo site_url("mhs/form"); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-2"><label class="form-control-label">Import Mahasiswa</label></div>
                  <div class="col-sm-3"><input type="file" class="btn btn-sm" name="file"></div>
                  <div class="col-sm-4"><input type="submit" class="btn btn-sm btn-success" name="preview" value="Preview"></div>
                </div>
              </form>
            </div>
            <div class="form-group">
              <form method="post" action="<?php echo site_url("mhs/import"); ?>" enctype="multipart/form-data">
              <input type="hidden" name="id_scan">
          <?php
          if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
              if(isset($upload_error)){ // Jika proses upload gagal
              echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
              die; // stop skrip
              }
              
              // Buat sebuah tag form untuk proses import data ke database
              // echo "<form method='post' action='".base_url("index.php/mhsmatkul/import")."'>";
              
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
              <th>Nama</th>
              </tr>";
              
              $numrow = 1;
              $kosong = 0;
              
              // Lakukan perulangan dari data yang ada di excel
              // $sheet adalah variabel yang dikirim dari controller
              foreach($sheet as $row){
                // START -->
                // Skrip untuk mengambil value nya
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
          
                $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
                foreach ($cellIterator as $cell) {
                  array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
                }
                // <-- END
          
                // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
                $nim = $get[1]; // Ambil data NIS
                $nama = ucwords(strtolower($get[2])); // Ambil data nama
          
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
              echo "<a class='btn' href='".base_url("mhs/form")."'>Cancel</a>";
              }
              
              echo "</form>";
          }
          ?>
        </form>
        </div>     
        </div>
        </div>
