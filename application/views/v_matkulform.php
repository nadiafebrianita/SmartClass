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
              <h3 class="mb-0">Import Mata Kuliah</h3></div>
          <div class="col text-right">
              <a href="<?php echo base_url("csv/Matkul.csv"); ?>" class="btn btn-sm btn-success">Download Format</a>
          </div>
        </div>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
        <div class="row">
          <div class="col">
            <div class="form-group">
              <form method="post" action="<?php echo site_url("matkul/form"); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-2"><label class="form-control-label">Import Mata Kuliah</label></div>
                  <div class="col-sm-3"><input type="file" class="btn btn-sm" name="file"></div>
                  <div class="col-sm-4"><input type="submit" class="btn btn-sm btn-success" name="preview" value="Preview"></div>
                </div>
              </form>
            </div>
            <div class="form-group">
              <form method="post" action="<?php echo site_url("matkul/import"); ?>" enctype="multipart/form-data">
              <input type="hidden" name="id_prodi">
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
              <th>Kode Mata Kuliah</th>
              <th>Nama Mata Kuliah</th>
              <th>Program Studi</th>
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
                $kode = strtoupper($get[1]); 
                $nama = ucwords(strtolower($get[2])); 
                $prodi = ucwords(strtolower($get[3])); 
          
                // Cek jika semua data tidak diisi
                if($kode == "" && $nama == "" && $prodi == "")
                  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
          
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                  // Validasi apakah semua data telah diisi
                  $kode_td = ( ! empty($kode))? "" : " style='background: #E07171;'";
                  $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'";
                  $prodi_td = ( ! empty($prodi))? "" : " style='background: #E07171;'";
          
                  // Jika salah satu data ada yang kosong
                  if($kode == "" or $nama == "" or $prodi == ""){
                    $kosong++; // Tambah 1 variabel $kosong
                  }
          
                  echo "<tr>";
                  echo "<td".$kode_td.">".$kode."</td>";
                  echo "<td".$nama_td.">".$nama."</td>";
                  echo "<td".$prodi_td.">".$prodi."</td>";
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
              echo "<a class='btn' href='".site_url("matkul/form")."'>Cancel</a>";
              }
              
              echo "</form>";
          }
          ?>
        </form>
        </div>     
        </div>
        </div>
