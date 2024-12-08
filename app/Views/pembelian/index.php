<?= $this->extend('layout/main'); ?>
<?= $this->section('judul'); ?>
Pembelian
<?= $this->endSection('judul'); ?>

<?= $this->section('isi'); ?>
<div class="container">
    <h2>Manajemen Pembelian</h2>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah Pembelian -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Pembelian</button>

    <!-- Tabel Pembelian -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Pembelian</th>
                    <th>Supplier</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembelian as $key => $p): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $p['Tanggal_Pembelian'] ?></td>
                        <td>
                            <?php
                            foreach ($supplier as $s) {
                                if ($s['ID_Supplier'] == $p['ID_Supplier']) {
                                    echo $s['Nama_Supplier'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($produk as $pr) {
                                if ($pr['ID_Produk'] == $p['ID_Produk']) {
                                    echo $pr['Nama_Produk'];
                                }
                            }
                            ?>
                        </td>
                        <td><?= $p['Jumlah'] ?></td>
                        <td><?= $p['Harga_Satuan'] ?></td>
                        <td><?= $p['Total_Harga'] ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $p['ID_Pembelian'] ?>">Edit</button>

                            <!-- Form Hapus Pembelian -->
                            <form action="/transaksi/pembelian/delete/<?= $p['ID_Pembelian'] ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pembelian ini?');">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit Pembelian -->
                    <div class="modal fade" id="modalEdit<?= $p['ID_Pembelian'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel">Edit Pembelian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/transaksi/pembelian/update/<?= $p['ID_Pembelian'] ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tanggal_pembelian">Tanggal Pembelian</label>
                                            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="<?= $p['Tanggal_Pembelian'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_supplier">Supplier</label>
                                            <select class="form-control" id="id_supplier" name="id_supplier" required>
                                                <?php foreach ($supplier as $s): ?>
                                                    <option value="<?= $s['ID_Supplier'] ?>" <?= $p['ID_Supplier'] == $s['ID_Supplier'] ? 'selected' : '' ?>><?= $s['Nama_Supplier'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_produk">Produk</label>
                                            <select class="form-control" id="id_produk" name="id_produk" required>
                                                <?php foreach ($produk as $pr): ?>
                                                    <option value="<?= $pr['ID_Produk'] ?>" <?= $p['ID_Produk'] == $pr['ID_Produk'] ? 'selected' : '' ?>><?= $pr['Nama_Produk'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $p['Jumlah'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_satuan">Harga Satuan</label>
                                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= $p['Harga_Satuan'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Pembelian -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/transaksi/pembelian/create" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal_pembelian">Tanggal Pembelian</label>
                            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Supplier</label>
                            <select class="form-control" id="id_supplier" name="id_supplier" required>
                                <?php foreach ($supplier as $s): ?>
                                    <option value="<?= $s['ID_Supplier'] ?>"><?= $s['Nama_Supplier'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_produk">Produk</label>
                            <select class="form-control" id="id_produk" name="id_produk" required>
                                <?php foreach ($produk as $pr): ?>
                                    <option value="<?= $pr['ID_Produk'] ?>"><?= $pr['Nama_Produk'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_satuan">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan JavaScript untuk interaksi modal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection(); ?>