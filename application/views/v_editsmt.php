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
    <form action="<?php echo site_url('smt/update'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Edit Semester</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Nama Semester</label>
                <input type="hidden" class="form-control" name="id_smt" value="<?php echo $u->id_smt ?>">
                  <select class="form-control mt-2" name="nama_smt">
                    <option value="<?php echo $u->nama_smt ?>"><?php echo $u->nama_smt ?></option>
                    <option>Gasal</option>
                    <option>Genap</option>
                  </select>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Tahun</label>
                <input type="text" class="form-control" name="tahun" value="<?php echo $u->tahun ?>">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 25px">Simpan</button>
      </div>
      </form>
      <?php } ?>