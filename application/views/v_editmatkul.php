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
    <form action="<?php echo site_url('matkul/update'); ?>" method="post">
      <form role="form">
    <div class="card-header">
        <h3 class="mb-0">Edit Mata Kuliah</h3>
        </div>
        <!-- Card body -->
        <div class="card-body" >
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Kode Mata Kuliah</label>
                <input type="hidden" class="form-control" name="id_matkul" value="<?php echo $u->id_matkul ?>">
                <input type="text" class="form-control" name="kode_matkul" value="<?php echo $u->kode_matkul ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Nama Mata Kuliah</label>
                <input type="text" class="form-control" name="nama_matkul" value="<?php echo $u->nama_matkul ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label">Program Studi</label>
                    <select class="form-control" name="id_prodi">
                      <option value="<?php echo $u->id_prodi ?>">- Pilih Prodi -</option>
                      <?php
                        foreach ($dropdown->result() as $baris) {
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