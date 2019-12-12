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
    <form action="<?php echo site_url('dosen/tambah_aksi'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Tambah Dosen</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label">Nama Dosen</label>
                <input type="hidden" class="form-control" name="id_dosen">
                <input type="text" class="form-control" name="nama_dosen" placeholder="Masukkan Nama Dosen beserta Gelar" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">NIP</label>
                <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">NIDN</label>
                <input type="text" class="form-control" name="nidn" placeholder="Masukkan NIDN" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">Alias</label>
                <input type="hidden" class="form-control" name="id_scan">
                <input type="text" class="form-control" name="alias" placeholder="Masukkan Nama Singkat" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>