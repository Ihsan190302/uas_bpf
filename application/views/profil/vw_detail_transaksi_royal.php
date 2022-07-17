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
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Starlight</td>
                        <td>Harga</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?= base_url('Profil/pesanan_royal'); ?>" method="POST" enctype="multipart/form-data">
                        <?php
                        function rupiah($angka)
                        {
                            $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                            return $hasil_rupiah;
                        }
                        $i = 1;
                        $total_bayar = 0;
                        $total_p = 0; ?>
                        <?php foreach ($transaksi_royal as $us) :
                        $total_bayar += $us['harga'];
                        ?>
                            <tr>
                                <td><?= $us['tanggal']; ?></td>
                                <td><?= $us['nama']; ?></td>
                                <td><?= $us['harga']; ?></td>
                                <td><a href="<?= base_url('profil/deltransaksi_royal/') . $us['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></a></td>
                            </tr>
                            <input type="hidden" name="royal[]" value="<?= $us['id_royal']; ?>">
                            <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                            <input type="hidden" name="harga" value="<?= $us['harga']; ?>">

                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td>Id Game</td>
                            <td colspan="5"><input name="id_game" type="text" class="form-control" id="id_game"></td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td colspan="3">
                                <select name="pembayaran" id="pembayaran" class="form-control">
                                    <option value="">Pilih Bank</option>
                                    <option value="BRI">BRI - 1111-11111-11111-1111</option>
                                    <option value="MANDIRI">MANDIRI - 2222-2222-2222</option>
                                    <option value="BNI">BNI - 3333-3333-3333</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Transfer</td>
                            <td colspan="3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                    <label for="gambar" class="custom-file-label">Choose File</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right"><strong>Total : </strong></td>
                            <td><?= rupiah($total_bayar); ?></td>
                            <td>
                                <input type="hidden" name="no_penjualan" value="PJ<?= time() ?>" readonlylass="form-control">
                                <input type="hidden" name="bayar" value="<?= $total_bayar; ?>">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Pesan</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>