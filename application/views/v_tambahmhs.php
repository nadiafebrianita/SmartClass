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
    <form action="<?php echo site_url('mhs/tambah_aksi'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Tambah Mahasiswa</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label">Nama Mahasiswa</label>
                <input type="hidden" class="form-control" name="nim">
                <input type="text" class="form-control" name="nama_mhs" placeholder="Masukkan Nama Mahasiswa" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">NIM</label>
                <input type="hidden" name="id_scan">
                <input type="number" pattern=".{5,10}" class="form-control" name="nim" placeholder="Masukkan NIM Mahasiswa" title="NIM terdiri dari 14 angka" required>
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
                        foreach ($ddprodi->result() as $baris) {
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