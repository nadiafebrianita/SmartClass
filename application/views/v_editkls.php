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
    <form action="<?php echo site_url('kls/update'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Edit Kelas</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Nama Kelas</label>
                <input type="hidden" class="form-control" name="id_kls" value="<?php echo $u->id_kls ?>">
                <input type="text" class="form-control" name="nama_kls" value="<?php echo $u->nama_kls ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Keterangan</label>
                <input type="text" class="form-control" name="ket" value="<?php echo $u->ket ?>">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>
      <?php } ?>