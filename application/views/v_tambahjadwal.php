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
                <input type="text" class="form-control" name="hari" placeholder="Masukkan Hari">
              </div>
              <div class="form-group">
                <label class="form-control-label">Waktu</label>
                <input type="time" class="form-control" name="waktu">
              </div>
              <div class="form-group">
                <label class="form-control-label">Mata Kuliah</label>
                  <!-- <div class="row">
                  <div class="col-md-11"> -->
                      <select class="form-control" name="id_matkul" id="id_matkul">
                        <option>- Pilih Mata Kuliah -</option>
                        <?php
                          foreach ($ddmatkul->result() as $baris) {
                            echo "<option value='".$baris->id_matkul."'>".$baris->nama_matkul."</option>";
                          }
                        ?>
                  </select>
                </div>
              <div class="form-group">
                <label class="form-control-label">Dosen</label>
                    <select class="form-control" name="id_dosen" id="id_dosen">
                      <option>- Pilih Dosen -</option>
                      <?php
                        foreach ($dddosen->result() as $baris) {
                          echo "<option value='".$baris->id_dosen."'>".$baris->nama_dosen."</option>";
                        }
                      ?>
                </select>
               </div>
              <div class="form-group">
                <label class="form-control-label">Kelas</label>
                    <select class="form-control" name="id_kls" id="id_kls">
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
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>
      <?php } ?>