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
    <form action="<?php echo site_url('admin/update'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Edit Admin</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label">Username</label>
                <input type="hidden" class="form-control" name="id_admin" value="<?php echo $u->id_admin ?>">
                <input type="text" class="form-control" name="username" value="<?php echo $u->username ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label">Password</label>
                <input pattern=".{6,}" type="password" class="form-control" name="password" title="Password harus terdiri dari minimal 6 karakter" placeholder="Masukkan Password, minimal 6 karakter" required />
              </div>
              <div class="form-group">
                <label class="form-control-label">Prodi</label>
                    <select required class="form-control" name="id_prodi">
                      <option value="<?php echo $u->id_prodi ?>"><?php echo $u->nama_prodi ?></option>
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
      <?php } ?>