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
    <?php foreach ($ddsmt->result() as $baris) { ?>
    <form action="<?php echo site_url('jadwal/tambah_aksi'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Tambah Jadwal Kuliah</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
            <div class="form-group">
                <label class="form-control-label">Semester</label>
                <input type="hidden" class="form-control" name="id_smt" value="<?php echo $baris->id_smt?>">
                <input readonly type="text" class="form-control" name="nama_smt" value="<?php echo $baris->nama_smt , $baris->tahun?>">
               </div>
              <div class="form-group">
                <label class="form-control-label">Hari</label>
                <select class="form-control" name="hari">
                  <option>- Pilih Hari -</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                </select>              
              </div>
              <!-- 1 -->
              <div class="row align-items-center py-1">
                <div class="col-lg-3">
                  <div class="form-group">
                    <div class="row align-items-center py-1">
                      <div class="col-lg-6"><label class="form-control-label">Waktu Mulai</label></div>
                      <div class="col-lg-6"><label class="form-control-label">Waktu Akhir</label></div>
                    </div>
                    <div class="row align-items-center py-1">
                      <div class="col-lg-6"><input type="time" class="form-control" name="waktu"></div>
                      <div class="col-lg-6"><input type="time" class="form-control" name="akhir"></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label">Mata Kuliah</label>
                    <select class="form-control mt-2" name="id_matkul1">
                      <option>- Pilih Mata Kuliah -</option>
                      <?php
                        foreach ($ddmatkul->result() as $baris) {
                          echo "<option value='".$baris->id_matkul."'>".$baris->nama_matkul."</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <label class="form-control-label">Dosen 1</label>
                    <select class="form-control mt-2" name="id_dosen1">
                      <option>- Pilih Dosen 1 -</option>
                      <?php
                        foreach ($dddosen->result() as $baris) {
                          echo "<option value='".$baris->id_dosen."'>".$baris->alias."</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <label class="form-control-label">Dosen 2</label>
                    <select class="form-control mt-2" name="id_dosen2">
                      <option>- Pilih Dosen 2 -</option>
                      <?php
                        foreach ($dddosen->result() as $baris) {
                          echo "<option value='".$baris->id_dosen."'>".$baris->alias."</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <label class="form-control-label">Kelas</label>
                      <select class="form-control mt-2" name="id_kls1">
                        <option>- Pilih Kelas -</option>
                        <?php
                          foreach ($ddkelas->result() as $baris) {
                            echo "<option value='".$baris->id_kls."'>".$baris->nama_kls."</option>";
                          }
                        ?>
                      </select>
                  </div>
                </div>
              </div>
<!-- SELESAI -->
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>
      <?php } ?>