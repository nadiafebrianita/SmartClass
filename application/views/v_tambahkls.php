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
    <form action="<?php echo site_url('kls/tambah_aksi'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Tambah Kelas</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" >Serial Number</label>
                <select required class="form-control" name="sn">
                  <?php
                  echo "<option>- Pilih Serial Number -</option>";
                  foreach ($ddsn->result() as $baris) {
                    echo "<option value='".$baris->sn."'>".$baris->sn."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label" >Nama Kelas</label>
                <input type="text" class="form-control" name="nama_kls" placeholder="Masukkan Nama Kelas contoh: E201" required>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Keterangan</label>
                <input type="text" class="form-control" name="ket" placeholder="Berikan keterangan" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">Program Studi</label>
                    <select required class="form-control" name="id_prodi" id="id_prodi">
                      <?php
                      $prodi = $this->session->userdata('id_prodi');
                      $namaprodi = $this->session->userdata('nama_prodi');
                      if(!empty($prodi)){
                        echo "<option value='".$prodi."'>".$namaprodi."</option>";
                      }
                      else{
                        echo "<option>- Pilih Prodi -</option>";
                        foreach ($dd->result() as $baris) {
                          echo "<option value='".$baris->id_prodi."'>".$baris->nama_prodi."</option>";
                        }
                      }
                      ?>
                </select>
               </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>