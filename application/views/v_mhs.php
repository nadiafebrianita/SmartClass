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
                <div class="col-lg-10">
                  <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('mhs/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('mhs/form'); ?>" class="btn btn-sm btn-success">Import</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="mhs" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $no = 1;
                  foreach($mhs as $u){ 
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->nama_mhs ?></td>
                    <td><?php echo $u->nim ?></td>
                    <td><?php echo $u->alias ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-primary"><?php echo anchor('mhs/edit/'.$u->nim,'Edit');?></button>
                    <button type="button" class="btn btn-sm btn-outline-danger"><?php echo anchor('mhs/hapus/'.$u->nim,'Hapus', array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?></button>
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
              <script type="text/javascript">
                $(document).ready(function () {
                    $('#mhs').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                          {
                            extend: 'copyHtml5',
                            title: function(){
                              return "Data Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          },
                          {
                            extend: 'pdfHtml5',
                            title: function(){
                              return "Data Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          },
                          {
                            extend: 'excelHtml5',
                            title: function(){
                              return "Data Mahasiswa - Smart Class"
                            },
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                          },
                          {
                            extend: 'csvHtml5',
                            title: function(){
                              return "Data Mahasiswa - Smart Class"
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
      