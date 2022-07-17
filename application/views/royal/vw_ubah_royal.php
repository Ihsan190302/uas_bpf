<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
                <div class="card-header justify-content-center">
                    Form Ubah Royal Pass
                </div>

                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $royal['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Starlight</label>
                            <input type="text" name="nama" value="<?= $royal['nama']; ?>" class="form-control" id="nama" placeholder="Nama Starlight">
                            <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" value="<?= $royal['harga']; ?>" class="form-control" id="harga" placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('Royal') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Royal Pass</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>