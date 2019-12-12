    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8 mt-2">
                      <h3 class="mb-0">Semester Aktif</h3>
                    </div>
                    <div class="col text-right mt-2">
                      <a href="<?php echo site_url('smt'); ?>" class="btn btn-sm btn-primary">Atur</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mt-2 mb-2">
                      <span class="h4 text-success font-weight-normal mb-0"><?php foreach($smt as $s) {echo $s->nama_smt, $s->tahun;}?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8 mt-2">
                      <h3 class="mb-0">Mata Kuliah</h3>
                    </div>
                    <div class="col text-right mt-2">
                      <a href="<?php echo site_url('matkul/aturmatkul'); ?>" class="btn btn-sm btn-primary">Atur</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mt-2 mb-2">
                      <span class="h3 text-success font-weight-normal mb-0"><?php echo $matkul; ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8 mt-2">
                      <h3 class="mb-0">Mahasiswa Mata Kuliah</h3>
                    </div>
                    <div class="col text-right mt-2">
                      <a href="<?php echo site_url('mhsmatkul/matkul'); ?>" class="btn btn-sm btn-primary">Atur</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mt-2 mb-2">
                      <span class="h3 text-success font-weight-normal mb-0"><?php echo $mhsmatkul; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--8">
      <div class="row mt-5">
        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
            <div class="row align-items-center">
                <div class="col-8 mt-2">
                  <h3 class="mb-0">Kelas</h3>
                </div>
                <div class="col text-right mt-2">
                  <a href="<?php echo site_url('kls/show_kls'); ?>" class="btn btn-sm btn-primary">Atur</a>
                </div>
              </div>
              <div class="row">
                <div class="col mt-2 mb-2">
                  <span class="h3 text-success font-weight-normal mb-0"><?php echo $kls; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
            <div class="row align-items-center">
                <div class="col-8 mt-2">
                  <h3 class="mb-0">Program Studi</h3>
                </div>
                <div class="col text-right mt-2">
                  <a href="<?php echo site_url('prodi'); ?>" class="btn btn-sm btn-primary">Atur</a>
                </div>
              </div>
              <div class="row">
                <div class="col mt-2 mb-2">
                  <span class="h3 text-success font-weight-normal mb-0"><?php echo $prodi; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
            <div class="row align-items-center">
                <div class="col-8 mt-2">
                  <h3 class="mb-0">Fakultas</h3>
                </div>
                <div class="col text-right mt-2">
                  <a href="<?php echo site_url('fkl'); ?>" class="btn btn-sm btn-primary">Atur</a>
                </div>
              </div>
              <div class="row">
                <div class="col mt-2 mb-2">
                  <span class="h3 text-success font-weight-normal mb-0"><?php echo $fkl; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row mt-5">
        <div class="col-xl">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                <h3 class="mb-0">Jadwal Hari Ini: <?php date_default_timezone_set('UTC');
                      echo date("l , j F Y");
                      ?></h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('jadwal/aturjadwal'); ?>" class="btn btn-sm btn-primary">Atur</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">Mulai</th>
                    <th scope="col">Akhir</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen 1</th>
                    <th scope="col">Dosen 2</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Program Studi</th>
                  </tr>
                  <?php 
                    $no = 1;
                    foreach($jadwal as $j){ 
                  ?>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $j->waktu ?></td>
                    <td><?php echo $j->akhir ?></td>
                    <td><?php echo $j->nama_matkul ?></td>
                    <td><?php echo $j->dosen1 ?></td>
                    <td><?php echo $j->dosen2 ?></td>
                    <td><?php echo $j->nama_kls ?></td>
                    <td><?php echo $j->nama_prodi ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>