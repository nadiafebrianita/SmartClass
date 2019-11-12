    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--9">
      <div class="row mt-3">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Pengaturan Jadwal</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('jadwal/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Hari</th>
                    <th scope="col">Mulai</th>
                    <th scope="col">Akhir</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen 1</th>
                    <th scope="col">Dosen 2</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Opsi</th>
                  </tr>
                  <?php 
                  $no = 1;
                  foreach($jadwal as $j){ 
                ?>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $j->hari ?></td>
                    <td><?php echo $j->waktu ?></td>
                    <td><?php echo $j->akhir ?></td>
                    <td><?php echo $j->nama_matkul ?></td>
                    <td><?php echo $j->alias ?></td>
                    <td><?php echo $j->id_dosen2 ?></td>
                    <td><?php echo $j->nama_kls ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-primary"><?php echo anchor('jadwal/edit/'.$j->id_jadwal,'Edit');?></button>
                    <button type="button" class="btn btn-sm btn-outline-danger"><?php echo anchor('jadwal/hapus/'.$j->id_jadwal,'Hapus', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?></button>
                    <script>
                    function confirmDialog() {
                        return confirm("Data berhubungan dengan Tabel Mahasiswa-Mata Kuliah dan data yang terhubung juga akan terhapus, Yakin akan menghapus?")
                    }
                    </script>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      