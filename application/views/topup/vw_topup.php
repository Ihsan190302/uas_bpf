<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
                    <div class="row">
                        <div class="col-md-6"><a href="<?= base_url() ?>Topup/tambah" class="btn btn-info mb-2">Tambah
                    Game</a></div>
                        <div class="col-md-12">
                            <?= $this->session->flashdata('message');?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Gambar</td>
                                        <td>Game</td>
                                        <td>Jumlah Nominal</td>
                                        <td>Harga</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach ($topup as $us) : ?>
                                        <tr>
                                            <td><?= $i; ?>.</td>
                                            <td><img src="<?= base_url('template/assets/images/topup/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                            <td><?= $us['game']; ?></td>
                                            <td><?= $us['jumlah']; ?></td>
                                            <td><?= $us['harga']; ?></td>
                                            <td>
                                                <a href="<?= base_url('Topup/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
                                                <a href="<?= base_url('Topup/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
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