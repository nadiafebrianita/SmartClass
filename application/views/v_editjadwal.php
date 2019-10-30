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
    <?php foreach($u as $u){ ?>
    <form action="<?php echo site_url('jadwal/update'); ?>" method="post">
      <form role="form">
      <div class="card-header">
        <h3 class="mb-0">Edit Jadwal</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label">Hari</label>
                <input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $u->id_jadwal ?>">
                <input type="hidden" class="form-control" name="id_smt" value="<?php echo $u->id_smt ?>">
                <input type="text" class="form-control" name="hari" value="<?php echo $u->hari ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label">Waktu</label>
                <input type="text" class="form-control" name="waktu" value="<?php echo $u->waktu ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label">Mata Kuliah</label>
                    <select class="form-control" name="id_matkul">
                      <option value="<?php echo $u->id_matkul ?>">- Pilih Mata Kuliah -</option>
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
                      <option value="<?php echo $u->id_dosen ?>">- Pilih Dosen -</option>
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
                      <option value="<?php echo $u->id_kls ?>">- Pilih Kelas -</option>
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