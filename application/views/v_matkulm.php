    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="col">
            <div class="row">
              <form action="<?php echo site_url('mhsmatkul/prodi'); ?>" method="post">
              <form role="form">
                <h6 class="h3 text-white d-inline-block mb-5 mr-1">Program Studi</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                  <select class="form-control-sm" style="width: 200px" name="id_prodi">
                    <option value="0">Semua</option>
                      <?php
                        if ($p!==1) {
                          echo "<option value selected='".$u[0]->id_mhsmatkul."'>".$u[0]->nama_prodi."</option>";                      }
                      ?>
                      <?php
                        foreach ($ddprodi->result() as $dd) {
                          echo "<option value='".$dd->id_prodi."'>".$dd->nama_prodi."</option>";
                        }
                      ?>
                  </select>
                  <button type="submit" class="btn btn-sm btn-success">Set</a>
                </nav>
                </form>
                </form>
                <!-- <form action="<?php echo site_url('mhsmatkul/filter'); ?>" method="post">
                <form role="form">
                <h6 class="h3 text-white d-inline-block mb-5 mr-1 ml-4">Mata Kuliah</h6> 
                <select class="form-control-sm" style="width: 200px" name="id_jadwal">
                  <option value="0">Semua</option>
                  <?php
                      if (!empty($s)) {
                        echo "<option value selected='".$s[0]->id_jadwal."'>".$s[0]->nama_matkul."</option>";
                      }
                    ?>
                  <?php
                    foreach ($ddmatkul->result() as $dd) {
                      echo "<option value='".$dd->id_jadwal."'>".$dd->nama_matkul."</option>";
                    }
                  ?>
                </select>
                <button type="submit" class="btn btn-sm btn-success">Set</a>
              </form>
              </form> -->
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
                <div class="col-lg-10">
                  <h3 class="mb-0">Pengaturan Mahasiswa - Mata Kuliah</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('mhsmatkul/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('mhsmatkul/form'); ?>" class="btn btn-sm btn-success">Import</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="mhsmatkul" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">Nama Mahasiswa</th>
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
                    <td><?php echo $u->nama_mhs ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-danger"><?php echo anchor('mhsmatkul/hapusmhs/'.$u->id_mhsmatkul,'Hapus');?></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <script type="text/javascript">
                $(document).ready(function () {
                    $('#mhsmatkul').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                          {
                            extend: 'copyHtml5',
                            title: function(){
                              return "Data Mahasiswa Mata Kuliah - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          },
                          {
                            extend: 'pdfHtml5',
                            title: function(){
                              return "Data Mahasiswa Mata Kuliah - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          },
                          {
                            extend: 'excelHtml5',
                            title: function(){
                              return "Data Mahasiswa Mata Kuliah - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          },
                          {
                            extend: 'csvHtml5',
                            title: function(){
                              return "Data Mahasiswa Mata Kuliah - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          }
                        ]
                    });
                });
              </script>
            </div>
          </div>
        </div>
      </div>      