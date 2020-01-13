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
    <form action="<?php echo site_url('mhsmatkul/tambah_aksi'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Tambah Mahasiswa - Mata Kuliah</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label">Mata Kuliah</label>
                <select required class="form-control mt-2" name="id_jadwal">
                  <option value="">- Pilih Mata Kuliah -</option>
                  <?php
                    $prodi=$this->session->userdata("id_prodi");
                    if(!empty($prodi)){
                      foreach ($ddmatkulprodi->result() as $baris) {
                        echo "<option value='".$baris->id_jadwal."'>".$baris->nama_matkul."</option>";
                      }
                    }
                    else{
                      foreach ($ddmatkul->result() as $baris) {
                        echo "<option value='".$baris->id_jadwal."'>".$baris->nama_matkul."</option>";
                      } 
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Mahasiswa</label>
                <select required class="form-control mt-2" name="nim">
                  <option value="">- Pilih Mahasiswa -</option>
                  <?php
                    foreach ($ddmhs->result() as $baris) {
                      echo "<option value='".$baris->nim."'>".$baris->nama_mhs."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>