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
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
        </div>
        <div class="float-right">

            <a href="<?= base_url('Penjualan/export') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>No Penjualan</td>
                        <td>Tanggal</td>
                        <td>Pelanggan</td>
                        <td>Email</td>
                        <td>Harga</td>
                        <td>Id Game</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penjualan_royal as $us) : ?>
                        <tr>
                            <td> <?= $i; ?>.</td>
                            <td><?= $us['no_penjualan']; ?></td>
                            <td><?= $us['tanggal']; ?></td>
                            <td><?= $us['nama']; ?></td>
                            <td><?= $us['email']; ?></td>
                            <td><?= $us['harga']; ?></td>
                            <td><?= $us['id_game']; ?></td>
                            <td><?= $us['status']; ?></td>
                            <td>

                                <a href="<?= base_url('Penjualan_royal/detail_royal/') . $us['no_penjualan']; ?>" class="badge badge-warning">Detail</a>

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
</div>