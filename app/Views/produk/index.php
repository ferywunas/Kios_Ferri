<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Produk
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container">
    <h2>Manajemen Produk</h2>

    <!-- Tambah Produk Button -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Produk</button>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success mt-2"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $p): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $p['Nama_Produk'] ?></td>
                        <td><?= $p['Harga_Produk'] ?></td>
                        <td><?= $p['Stok'] ?></td>
                        <td><?= $p['Deskripsi_Produk'] ?></td>
                        <td>
                            <?php
                            foreach ($kategori as $k) {
                                if ($k['ID_Kategori'] == $p['ID_Kategori']) {
                                    echo $k['Nama_Kategori'];
                                    break;
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $p['ID_Produk'] ?>">Edit</button>
                            <!-- Tombol Hapus -->
                            <form action="/produk/produk/delete/<?= $p['ID_Produk'] ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit Produk -->
                    <div class="modal fade" id="modalEdit<?= $p['ID_Produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel">Edit Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/produk/produk/update/<?= $p['ID_Produk'] ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $p['Nama_Produk'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_produk">Harga Produk</label>
                                            <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="<?= $p['Harga_Produk'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Stok">Stok</label>
                                            <input type="number" class="form-control" id="Stok" name="Stok" value="<?= $p['Stok'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_produk">Deskripsi Produk</label>
                                            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk"><?= $p['Deskripsi_Produk'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($kategori as $k): ?>
                                                    <option value="<?= $k['ID_Kategori'] ?>" <?= ($p['ID_Kategori'] == $k['ID_Kategori']) ? 'selected' : '' ?>><?= $k['Nama_Kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
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

<!-- Modal Tambah Produk -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/produk/produk/create" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_produk">Harga Produk</label>
                        <input type="number" class="form-control" id="harga_produk" name="harga_produk" required>
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok</label>
                        <input type="number" class="form-control" id="Stok" name="Stok" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['ID_Kategori'] ?>"><?= $k['Nama_Kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
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