<!-- Begin Page Content -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <img src="<?= base_url('template/assets/images/topup/') . $topup['gambar']; ?>" style="width:400px" class="img-thumbnail">
                        </div>
                        <div class="col mr-2">
                            <div class="card-body">
                                <form action="" method="POST">
                                <input type="hidden" name="id_topup" value="<?= $topup['id']; ?>">
                                <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                                <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                                <div class="form-group">
                                    <label for="game">Game</label>
                                    <input name="game" type="text" style="color:black;" value="<?= $topup['game']; ?>" readonly class="form-control" id="game">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Nominal</label>
                                    <input name="jumlah" type="text" style="color:black;" value="<?= $topup['jumlah']; ?>" readonly class="form-control" id="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input name="harga" type="text" style="color:black;" value="<?= $topup['harga']; ?>" readonly class="form-control" id="harga">
                                </div>
                                <button type="submit" id="tambah" name="tambah" class="btn btn-primary float-right">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>