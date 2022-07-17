<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
<h1 class="h3 mb-4 text-gray-800">Starlight (Mobile Legends)</h1>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($royal as $us) : ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div><?= $us['nama'] ?></div>
                                <div class="tetxt-xs font-weight-bold text-gray-800">Rp.<?= $us['harga'] ?></div>
                            </div>
                            
                        </div>
                        <div class="align-items-center">
                            <a href="<?= base_url('Profil/transaksi_royal/') . $us['id'] ?>" class="badge badge-warning badge-block">Beli</a>
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