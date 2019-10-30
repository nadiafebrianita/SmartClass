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
    <form action="<?php echo site_url('fkl/update'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Edit Fakultas</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Nama Fakultas</label>
                <input type="hidden" class="form-control" name="id_fakultas" value="<?php echo $u->id_fakultas ?>">
                <input type="text" class="form-control" name="nama_fakultas" value="<?php echo $u->nama_fakultas ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Singkatan Fakultas</label>
                <input type="text" class="form-control" name="singkat" value="<?php echo $u->singkat ?>">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>
      <?php } ?>