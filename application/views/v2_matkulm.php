    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row align-items-center">
            <div class="col-lg-5">
              <h6 class="h3 text-white d-inline-block mb-5">Program Studi</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-2 mr-4">
              <input type="text" class="form-control-sm" name="id_prodi" value="<?php echo $this->session->userdata("nama_prodi"); ?>" readonly>
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
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-notification<?php echo $u->id_mhsmatkul; ?>">Hapus</button>

                    <div class="modal fade" id="modal-notification<?php echo $u->id_mhsmatkul; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                            <button type="button" class="btn btn-white"><?php echo anchor('mhsmatkul/hapusmhs/'.$u->id_mhsmatkul,'Hapus');?></button>
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