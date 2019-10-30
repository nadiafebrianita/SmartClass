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
    <form action="<?php echo site_url('prodi/update'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Edit Program Studi</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Nama Program Studi</label>
                <input type="hidden" class="form-control" name="id_prodi" value="<?php echo $u->id_prodi ?>">
                <input type="text" class="form-control" name="nama_prodi" value="<?php echo $u->nama_prodi ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label">Fakultas</label>
                    <select class="form-control" name="id_fakultas">
                      <option value="<?php echo $u->id_fakultas ?>">- Pilih Prodi -</option>
                      <?php
                        foreach ($dd->result() as $baris) {
                          echo "<option value='".$baris->id_fakultas."'>".$baris->nama_fakultas."</option>";
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