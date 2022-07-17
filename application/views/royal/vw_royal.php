<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h1 class="h3 mb-4 text-gray-800">Halaman Starlight</h1>
                    <div class="row">
                        <div class="col-md-6"><a href="<?= base_url() ?>Royal/tambah" class="btn btn-info mb-2">Tambah
                    Royal Pass</a></div>
                        <div class="col-md-12">
                            <?= $this->session->flashdata('message');?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Starlight</td>
                                        <td>Harga</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach ($royal as $us) : ?>
                                        <tr>
                                            <td><?= $i; ?>.</td>
                                            <td><?= $us['nama']; ?></td>
                                            <td><?= $us['harga']; ?></td>
                                            <td>
                                                <a href="<?= base_url('Royal/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Royal/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
                                            </td>
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>          
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->