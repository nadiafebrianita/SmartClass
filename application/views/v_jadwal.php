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
                  <h3 class="mb-0">Jadwal Kuliah</h3>
                </div>
                <!-- <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary"></a>
                </div> -->
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Semester</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Kelas</th>
                  </tr>
                  <?php 
                  $no = 1;
                  foreach($jadwal as $j){ 
                ?>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $j->nama_smt ?></td>
                    <td><?php echo $j->hari ?></td>
                    <td><?php echo $j->waktu ?></td>
                    <td><?php echo $j->nama_matkul ?></td>
                    <td><?php echo $j->nama_dosen ?></td>
                    <td><?php echo $j->nama_kls ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      