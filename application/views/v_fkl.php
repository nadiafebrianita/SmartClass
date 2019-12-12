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
                  <h3 class="mb-0">Pengaturan Fakultas</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('fkl/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="fkl" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Fakultas</th>
                    <th scope="col">Singkatan Fakultas</th>
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
                    <td><?php echo $u->nama_fakultas ?></td>
                    <td><?php echo $u->singkat ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-primary"><?php echo anchor('fkl/edit/'.$u->id_fakultas,'Edit');?></button>
                    <button type="button" class="btn btn-sm btn-outline-danger"><?php echo anchor('fkl/hapus/'.$u->id_fakultas,'Hapus', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?></button>
                    <script>
                    function confirmDialog() {
                        return confirm("Data berhubungan dengan Tabel Program Studi, Tabel Mata Kuliah, serta Tabel Jadwal dan data yang terhubung juga akan terhapus, Yakin akan menghapus?")
                    }
                    </script>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <script type="text/javascript">
                $(document).ready(function () {
                    $('#fkl').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                          {
                            extend: 'copyHtml5',
                            title: function(){
                              return "Data Fakultas - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2]
                            }
                          },
                          {
                            extend: 'pdfHtml5',
                            title: function(){
                              return "Data Fakultas - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2]
                            }
                          },
                          {
                            extend: 'excelHtml5',
                            title: function(){
                              return "Data Fakultas - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2]
                            }
                          },
                          {
                            extend: 'csvHtml5',
                            title: function(){
                              return "Data Fakultas - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2]
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
      