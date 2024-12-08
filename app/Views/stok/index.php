<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Stok
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container">
    <h2>Manajemen Stok</h2>

    <!-- Tambah Stok Button -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Stok</button>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success mt-2"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stok as $key => $s): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <?php
                            // Ambil nama produk berdasarkan ID_Produk
                            $produk = $this->produkModel->find($s['ID_Produk']);
                            echo $produk ? $produk['Nama_Produk'] : 'Produk Tidak Ditemukan';
                            ?>
                        </td>
                        <td><?= $s['Jumlah_Stok'] ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $s['ID_Produk'] ?>">Edit</button>
                            <!-- Tombol Hapus -->
                            <form action="/produk/stok/delete/<?= $s['ID_Produk'] ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus stok ini?');">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit Stok -->
                    <div class="modal fade" id="modalEdit<?= $s['ID_Produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel">Edit Stok</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/produk/stok/update/<?= $s['ID_Produk'] ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_produk">Nama Produk</label>
                                            <select class="form-control" id="id_produk" name="id_produk" required>
                                                <option value="">Pilih Produk</option>
                                                <?php foreach ($produk as $p): ?>
                                                    <option value="<?= $p['ID_Produk'] ?>" <?= ($s['ID_Produk'] == $p['ID_Produk']) ? 'selected' : '' ?>><?= $p['Nama_Produk'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_stok">Jumlah Stok</label>
                                            <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" value="<?= $s['Jumlah_Stok'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Stok -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/produk/stok/create" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_produk">Nama Produk</label>
                        <select class="form-control" id="id_produk" name="id_produk" required>
                            <option value="">Pilih Produk</option>
                            <?php foreach ($produk as $p): ?>
                                <option value="<?= $p['ID_Produk'] ?>"><?= $p['Nama_Produk'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_stok">Jumlah Stok</label>
                        <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>