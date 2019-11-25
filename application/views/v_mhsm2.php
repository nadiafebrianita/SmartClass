    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row align-items-center py-1">
            <div class="col-lg-5">
            <form action="<?php echo site_url('mhsmatkul/pilih'); ?>" method="post">
            <form role="form">
              <h6 class="h3 text-white d-inline-block mb-5">Tampilkan Berdasarkan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-2 mr-2">
                <select class="form-control-sm" name="pilih">
                  <option value="1">Semua</option>
                  <option value="2" selected>Mahasiswa</option>
                  <option value="3">Mata Kuliah</option>
                </select>
                <button type="submit" class="btn btn-sm btn-success">Set</a>
              </nav>
              </form>
              </form>
              </div>
            <div class="col-lg-5">
              <h6 class="h3 text-white d-inline-block mb-5">Nama Mahasiswa</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-2 mr-2">
              <input type="hidden" class="form-control-sm" name="nim" value="<?php echo $m; ?>">
              <input type="text" class="form-control-sm" name="nama_mhs" size="35" value="<?php foreach($s as $s) {echo $s->nama_mhs;} ?>"readonly>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabel -->
    <div class="container-fluid mt--9">
      <div class="row mt-3">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Pengaturan Mahasiswa - Mata Kuliah</h3>
                </div>
                <form action="<?php echo site_url('mhsmatkul/tambahmatkul'); ?>" method="post">
                <form role="form">
                <div class="col text-right">
                <input type="hidden" class="form-control" name="nim" value="<?php echo $m;?>">
                  <select class="form-control-sm" name="id_jadwal">
                    <option>- Pilih Mata Kuliah -</option>
                      <?php
                        foreach ($ddmatkul->result() as $dd) {
                          echo "<option value='".$dd->id_jadwal."'>".$dd->nama_matkul."</option>";
                        }
                      ?>
                  </select>
                  <button type="submit" class="btn btn-sm btn-primary">Tambah</a>
                </div>
                </form>
                </form>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  foreach($u as $u){ 
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->kode_matkul ?></td>
                    <td><?php echo $u->nama_matkul ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-danger"><?php echo anchor('mhsmatkul/hapus/'.$u->id_mhsmatkul,'Hapus');?></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>