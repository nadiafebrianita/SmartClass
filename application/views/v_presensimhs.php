    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row align-items-center">
            <div class="col-lg-5">
              <form action="<?php echo site_url('presensimhs/prodi'); ?>" method="post">
              <form role="form">
                <h6 class="h3 text-white d-inline-block mb-5">Program Studi</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-2 mr-2">
                  <select class="form-control-sm" style="width: 200px" name="id_prodi">
                    <option value="0">Semua</option>
                    <?php
                      if ($p!==1) {
                        echo "<option value selected='".$u[0]->id_jadwal."'>".$u[0]->nama_prodi."</option>";                      }
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
                  <h3 class="mb-0">Presensi Mahasiswa</h3>
                </div>
                <!-- <div class="col text-right">
                  <a href="<?php echo site_url('presensimhs'); ?>" class="btn btn-sm btn-primary">Log</a>
                </div> -->
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="prmhs" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Mahasiswa</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($u as $u){ 
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->hari_scan ?></td>
                    <td><?php echo $u->tanggal_scan ?></td>
                    <td><?php echo $u->waktu_scan ?></td>
                    <td><?php echo $u->kode_matkul ?></td>
                    <td><?php echo $u->nama_matkul ?></td>
                    <td><?php echo $u->nama_prodi ?></td>
                    <td><?php echo $u->nama_mhs ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <script type="text/javascript">
                $(document).ready(function () {
                    $('#prmhs').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                          {
                            extend: 'copyHtml5',
                            title: function(){
                              return "Data Presensi Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
                            }
                          },
                          {
                            extend: 'pdfHtml5',
                            title: function(){
                              return "Data Presensi Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
                            }
                          },
                          {
                            extend: 'excelHtml5',
                            title: function(){
                              return "Data Presensi Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
                            }
                          },
                          {
                            extend: 'csvHtml5',
                            title: function(){
                              return "Data Presensi Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
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
     