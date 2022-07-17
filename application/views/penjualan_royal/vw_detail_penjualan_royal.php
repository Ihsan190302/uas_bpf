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
                            <img src="<?= base_url('template/assets/images/pembayaran_royal/') . $penjualan_royal['gambar']; ?>" style="width:400px" class="img-thumbnail">

                        </div>
                        <div class="col mr-2">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="no_penjualan">No Penjualan</label>
                                        <input name="no_penjualan" style="color:black;" type="text" value="<?= $penjualan_royal['no_penjualan'];

                                                                                        ?>" readonly class="form-control" id="no_penjualan">

                                    </div>
                                    <div class="form-group">
                                        <label for="pelanggan">Pelanggan</label>
                                        <input name="pelanggan" style="color:black;" value="<?= $penjualan_royal['nama']; ?>" type="text" readonly class="form-control" id="pelanggan">
                                    </div>

                                    <div class="form-group">
                                        <label for="total_bayar">Total Pembayaran</label>
                                        <input name="total_bayar" style="color:black;" value="<?= $penjualan_royal['harga']; ?>" type="text" readonly class="form-control" id="total_bayar">

                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Pilih Status</option>
                                            <option value="Dalam Proses">Dalam Proses</option>
                                            <option value="Berhasil Dikirim">Berhasil Dikirim</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" id="tambah" name="tambah" class="btn btn-primary float-right">Ubah Status</button>

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