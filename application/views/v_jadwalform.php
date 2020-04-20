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
              <h3 class="mb-0">Import Jadwal</h3></div>
          <div class="col text-right">
              <a href="<?php echo base_url("csv/Jadwal.csv"); ?>" class="btn btn-sm btn-success">Download Format</a>
          </div>
        </div>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
        <div class="row">
          <div class="col">
            <div class="form-group">
              <form method="post" action="<?php echo site_url("jadwal/importsmt"); ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-2"><label class="form-control-label">Pilih Semester Lain</label></div>
                  <div class="col-sm-3">
                    <select class="form-control-sm" style="width: 200px" name="id_smt">
                      <option>- Pilih Semester -</option>
                        <?php
                          foreach ($ddsmtall as $dd) {
                            echo "<option value='".$dd->id_smt."'>".$dd->nama_smt,$dd->tahun."</option>";
                          }
                        ?>
                    </select>
                  </div>
                  <div class="col-sm-4"><input type="submit" class="btn btn-sm btn-success" name="preview" value="Import"></div>
                </div>
              </form>
              <form method="post" action="<?php echo site_url("jadwal/form"); ?>" enctype="multipart/form-data">
                <div class="row mt-5">
                  <div class="col-sm-2"><label class="form-control-label">Pilih File</label></div>
                  <div class="col-sm-3"><input type="file" class="btn btn-sm" name="file"></div>
                  <div class="col-sm-4"><input type="submit" class="btn btn-sm btn-success" name="preview" value="Preview"></div>
                </div>
              </form>
              <div class="row mt-2">
                  <div class="col-sm-2"><label class="form-control-label">Keterangan</label></div>
                  <div class="col-sm-6"><label class="col-form-label-sm">Mata Kuliah, Dosen, dan Kelas harus sudah terdaftar</label></div>
                </div>
            </div>
            <div class="form-group">
              <form method="post" action="<?php echo site_url("jadwal/import"); ?>" enctype="multipart/form-data">
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
              <th colspan='7'>Preview Data</th>
              </tr>
              <tr>
              <th>Hari</th>
              <th>Waktu Awal</th>
              <th>Waktu Akhir</th>
              <th>Mata Kuliah</th>
              <th>Dosen 1</th>
              <th>Dosen 2</th>
              <th>Kelas</th>
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
                $hari = ucwords(strtolower($get[1])); 
                $waktuawal = $get[2]; 
                $waktuakhir = $get[3]; 
                $matkul = ucwords(strtolower($get[4])); 
                $dosen1 = strtoupper($get[5]); 
                $dosen2 = strtoupper($get[6]); 
                $kls = strtoupper($get[7]);
          
                // Cek jika semua data tidak diisi
                if($hari == "" && $waktu_awal == "" && $waktu_akhir == "" && $matkul == "" && $dosen1 == ""  && $kls == "")
                  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
          
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                  // Validasi apakah semua data telah diisi
                  $hari_td = ( ! empty($hari))? "" : " style='background: #E07171;'";
                  $waktuawal_td = ( ! empty($waktuawal))? "" : " style='background: #E07171;'";
                  $waktuakhir_td = ( ! empty($waktuakhir))? "" : " style='background: #E07171;'";
                  $matkul_td = ( ! empty($matkul))? "" : " style='background: #E07171;'";
                  $dosen1_td = ( ! empty($dosen1))? "" : " style='background: #E07171;'";
                  $dosen2_td = (empty($dosen2))? "" : " style=''";
                  $kls_td = ( ! empty($kls))? "" : " style='background: #E07171;'";
          
                  // Jika salah satu data ada yang kosong
                  if($hari == "" or $waktuawal == "" or $waktuakhir == "" or $matkul == "" or $dosen1 == "" or $kls == ""){
                    $kosong++; // Tambah 1 variabel $kosong
                  }
          
                  echo "<tr>";
                  echo "<td".$hari_td.">".$hari."</td>";
                  echo "<td".$waktuawal_td.">".$waktuawal."</td>";
                  echo "<td".$waktuakhir_td.">".$waktuakhir."</td>";
                  echo "<td".$matkul_td.">".$matkul."</td>";
                  echo "<td".$dosen1_td.">".$dosen1."</td>";
                  echo "<td".$dosen2_td.">".$dosen2."</td>";
                  echo "<td".$kls_td.">".$kls."</td>";
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
              echo "<a class='btn' href='".site_url("jadwal/form")."'>Cancel</a>";
              }
              
              echo "</form>";
          }
          ?>
        </form>
        </div>     
        </div>
        </div>
