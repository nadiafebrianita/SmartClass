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
    <form action="<?php echo site_url('admin/tambah_aksi'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Tambah Admin</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Password</label>
                <input pattern=".{6,}" type="password" class="form-control" name="password" title="Password harus terdiri dari minimal 6 karakter" placeholder="Masukkan Password, minimal 6 karakter" required />
              </div>
              <div class="form-group">
                <label class="form-control-label">Prodi</label>
                    <select required class="form-control" name="id_prodi">
                      <option value="">- Pilih Prodi -</option>
                      <?php
                        foreach ($dd->result() as $baris) {
                          echo "<option value='".$baris->id_prodi."'>".$baris->nama_prodi."</option>";
                        }
                      ?>
                </select>
               </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>