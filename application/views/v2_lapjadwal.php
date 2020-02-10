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
                <div class="col-lg-10">
                  <h3 class="mb-0">Laporan Jadwal</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="jadwal" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">Hari</th>
                  <th scope="col">Jam</th>
                  <?php 
                    foreach($jadwal as $j){ 
                  ?>
                    <th scope="col"><?php echo $j->nama_kls ?></th>
                  <?php } ?>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($jadwal as $j){ 
                ?>
                  <tr>
                    <td>Monday</td>
                    <td>07:00</td>
                    <td><?php echo $j->nama_matkul ?></td>
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
      