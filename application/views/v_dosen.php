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
                  <h3 class="mb-0">Data Dosen</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('dosen/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="dosen" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  foreach($dosen as $u){ 
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->nama_dosen ?></td>
                    <td><?php echo $u->nip ?></td>
                    <td><?php echo $u->nidn ?></td>
                    <td><?php echo $u->alias ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-primary"><?php echo anchor('dosen/edit/'.$u->id_dosen,'Edit');?></button>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-notification<?php echo $u->id_dosen; ?>">Hapus</button>

                    <div class="modal fade" id="modal-notification<?php echo $u->id_dosen; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                            <button type="button" class="btn btn-white"><?php echo anchor('dosen/hapus/'.$u->id_dosen,'Hapus');?></button>
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
                    $('#dosen').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                          {
                            extend: 'copyHtml5',
                            title: function(){
                              return "Data Dosen - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4]
                            }
                          },
                          {
                            extend: 'pdfHtml5',
                            title: function(){
                              return "Data Dosen - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4]
                            }
                          },
                          {
                            extend: 'excelHtml5',
                            title: function(){
                              return "Data Dosen - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4]
                            }
                          },
                          {
                            extend: 'csvHtml5',
                            title: function(){
                              return "Data Dosen - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4]
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
      