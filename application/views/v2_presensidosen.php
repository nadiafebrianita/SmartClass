    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <!-- Tabel -->
    <div class="container-fluid mt--9">
      <div class="row mt-3">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Presensi Dosen</h3>
                </div>
                <!-- <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary"></a>
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
                    <th scope="col">Kode MK</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Dosen</th>
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
                    <td><?php echo $u->nama_dosen ?></td>
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
     