    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row align-items-center py-1">
            <div class="col-lg-8 col-7">
              <h6 class="h3 text-white d-inline-block mb-5">Semester Aktif</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-2 mr-4">
              <input type="text" class="form-control-sm" name="tahun" value="<?php foreach ($a->result() as $a) {
                          echo $a->nama_smt; echo $a->tahun;}?>"readonly>
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
                <div class="col">
                  <h3 class="mb-0">Daftar Semester</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo site_url('smt/tambah'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Semester</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                  </tr>
                  <?php 
                  $no = 1;
                  foreach($u as $u){ 
                ?>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->nama_smt ?></td>
                    <td><?php echo $u->tahun ?></td>
                    <td><?php echo $u->status ?></td>
                    <td>
                    <button type="button" class="btn btn-sm btn-outline-success"><?php echo anchor('smt/aktif/'.$u->id_smt,'Aktif');?></button>
                    <button type="button" class="btn btn-sm btn-outline-primary"><?php echo anchor('smt/edit/'.$u->id_smt,'Edit');?></button>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-notification<?php echo $u->id_smt; ?>">Hapus</button>

                    <div class="modal fade" id="modal-notification<?php echo $u->id_smt; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                            <button type="button" class="btn btn-white"><?php echo anchor('smt/hapus/'.$u->id_smt,'Hapus');?></button>
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
            </div>
          </div>
        </div>
      </div>