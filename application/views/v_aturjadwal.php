    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row align-items-center">
            <div class="col-lg-5">
              <form action="<?php echo site_url('jadwal/prodi'); ?>" method="post">
              <form role="form">
                <h6 class="h3 text-white d-inline-block mb-5">Program Studi</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-2 mr-2">
                  <select class="form-control-sm" style="width: 200px" name="id_prodi">
                    <option value="0">Semua</option>
                    <?php
                      if ($p!==1) {
                        echo "<option value selected='".$jadwal[0]->id_jadwal."'>".$jadwal[0]->nama_prodi."</option>";                      }
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
                <div class="col-lg-10">
                  <h3 class="mb-0">Pengaturan Jadwal</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('jadwal/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('jadwal/form'); ?>" class="btn btn-sm btn-success">Import</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="jadwal" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Mulai</th>
                    <th scope="col">Akhir</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen 1</th>
                    <th scope="col">Dosen 2</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach($jadwal as $j){ 
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $j->hari ?></td>
                    <td><?php echo $j->waktu ?></td>
                    <td><?php echo $j->akhir ?></td>
                    <td><?php echo $j->nama_matkul ?></td>
                    <td><?php echo $j->dosen1 ?></td>
                    <td><?php echo $j->dosen2 ?></td>
                    <td><?php echo $j->nama_kls ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-primary"><?php echo anchor('jadwal/edit/'.$j->id_jadwal,'Edit');?></button>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-notification">Hapus</button>

                    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                          <div class="modal-content bg-gradient-danger">
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-notification"></h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <div class="py-3 text-center">
                                      <i class="ni ni-bell-55 ni-3x"></i>
                                      <h4 class="heading mt-4">Yakin Hapus Data ?</h4>
                                      <p></p>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-white"><?php echo anchor('jadwal/hapus/'.$j->id_jadwal,'Hapus');?></button>
                                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button> 
                              </div>
                          </div>
                      </div>
                    </div>


                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <script type="text/javascript">
                $(document).ready(function () {
                    $('#jadwal').DataTable({
                      "dom" : 'Bfrtip',
                      "order": [],
                      "columnDefs": [ {
                        "targets"  : [1],
                        "orderable": false,
                      }],
                      buttons: [
                          {
                            extend: 'copyHtml5',
                            title: function(){
                              return "Data Jadwal - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
                            }
                          },
                          {
                            extend: 'pdfHtml5',
                            title: function(){
                              return "Data Jadwal - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
                            }
                          },
                          {
                            extend: 'excelHtml5',
                            title: function(){
                              return "Data Jadwal - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6]
                            }
                          },
                          {
                            extend: 'csvHtml5',
                            title: function(){
                              return "Data Jadwal - Smart Class"
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
      