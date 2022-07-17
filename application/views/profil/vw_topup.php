<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
<h1 class="h3 mb-4 text-gray-800">Halaman Top Up</h1>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($topup as $us) : ?>
            <div class="col-xl-4 col-md-6 mb-8">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <img src="<?= base_url('template/assets/images/topup/') . $us['gambar']; ?>" style="width:100px" class="img-thumbnail">
                            </div>
                            <div class="col mr-2">
                                <div><?= $us['game'] ?></div>
                                <div class="tetxt-xs font-weight-bold text-gray-800">Rp.<?= $us['harga'] ?> (<?= $us['jumlah'] ?>) </div>
                            </div>
                            
                        </div>
                        <div class="align-items-center">
                            <a href="<?= base_url('Profil/transaksi/') . $us['id'] ?>" class="badge badge-warning badge-block">Beli</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>