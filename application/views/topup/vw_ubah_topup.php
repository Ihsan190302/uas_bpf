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
                    Form Ubah Game
                </div>

                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $topup['id']; ?>">
                        <div class="form-group">
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                <label for="gambar" class="custom-file-label">Choose File</label>
                                <?= form_error('gambar', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="game">Nama Game</label>
                            <input type="text" name="game" value="<?= $topup['game']; ?>" class="form-control" id="game" placeholder="Nama Game">
                            <?= form_error('game', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Nominal</label>
                            <input type="text" name="jumlah" value="<?= $topup['jumlah']; ?>" class="form-control" id="jumlah" placeholder="Jumlah Nominal">
                            <?= form_error('jumlah', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" value="<?= $topup['harga']; ?>" class="form-control" id="harga" placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('Topup') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Game</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>