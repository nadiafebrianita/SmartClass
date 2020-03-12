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
                <label class="form-control-label" >Serial Number</label>
                <input type="text" class="form-control" name="sn" value="<?php echo $u->sn ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Nama Kelas</label>
                <input type="hidden" class="form-control" name="id_kls" value="<?php echo $u->id_kls ?>">
                <input type="text" class="form-control" name="nama_kls" value="<?php echo $u->nama_kls ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Keterangan</label>
                <input type="text" class="form-control" name="ket" value="<?php echo $u->ket ?>">
              </div>
              <div class="form-group">
                <label class="form-control-label">Program Studi</label>
                    <select required class="form-control" name="id_prodi" id="id_prodi">
                    <option value="<?php echo $u->id_prodi ?>"><?php echo $u->nama_prodi ?></option>
                      <?php
                      $prodi = $this->session->userdata('id_prodi');
                      $namaprodi = $this->session->userdata('nama_prodi');
                      if(!empty($prodi)){
                        echo "<option value='".$prodi."'>".$namaprodi."</option>";
                      }
                      else{
                        foreach ($dd->result() as $baris) {
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
      <?php } ?>