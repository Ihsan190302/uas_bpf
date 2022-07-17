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
                        </div>
                        <div class="col mr-2">
                            <div class="card-body">
                                <form action="" method="POST">
                                <input type="hidden" name="id_royal" value="<?= $royal['id']; ?>">
                                <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                                <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                                <div class="form-group">
                                    <label for="nama">Nama Game</label>
                                    <input name="nama" type="text" style="color:black;" value="<?= $royal['nama']; ?>" readonly class="form-control" id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input name="harga" type="text" style="color:black;" value="<?= $royal['harga']; ?>" readonly class="form-control" id="harga">
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