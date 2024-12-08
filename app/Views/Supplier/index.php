<?= $this->extend('layout/main'); ?>
<?= $this->section('judul'); ?>
Supplier
<?= $this->endSection('judul'); ?>

<?= $this->section('isi'); ?>
<div class="container">
    <h2>Manajemen Supplier</h2>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah Supplier -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Supplier</button>

    <!-- Tabel Supplier -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplier as $key => $s): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $s['Nama_Supplier'] ?></td>
                        <td><?= $s['Alamat_Supplier'] ?></td>
                        <td><?= $s['Telepon_Supplier'] ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $s['ID_Supplier'] ?>">Edit</button>

                            <!-- Form Hapus Supplier -->
                            <form action="/produk/supplier/delete/<?= $s['ID_Supplier'] ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?');">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit Supplier -->
                    <div class="modal fade" id="modalEdit<?= $s['ID_Supplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel">Edit Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/produk/supplier/update/<?= $s['ID_Supplier'] ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_supplier">Nama Supplier</label>
                                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $s['Nama_Supplier'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_supplier">Alamat</label>
                                            <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" value="<?= $s['Alamat_Supplier'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon_supplier">Telepon</label>
                                            <input type="text" class="form-control" id="telepon_supplier" name="telepon_supplier" value="<?= $s['Telepon_Supplier'] ?>" required>
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

<!-- Modal Tambah Supplier -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/produk/supplier/create" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_supplier">Alamat</label>
                        <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon_supplier">Telepon</label>
                        <input type="text" class="form-control" id="telepon_supplier" name="telepon_supplier" required>
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

<?= $this->endSection('isi'); ?>