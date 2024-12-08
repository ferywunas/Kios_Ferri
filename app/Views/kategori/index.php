<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Kategori
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="container">
    <h2>Manajemen Kategori</h2>

    <!-- Tambah Kategori Button -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Kategori</button>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success mt-2"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $key => $k): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $k['Nama_Kategori'] ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $k['ID_Kategori'] ?>">Edit</button>

                            <!-- Tombol Hapus -->
                            <form action="/produk/kategori/delete/<?= $k['ID_Kategori'] ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>

                            <!-- Tombol Lihat Produk -->
                            <button class="btn btn-info" onclick="showProduk(<?= $k['ID_Kategori'] ?>)">Lihat Produk</button>
                        </td>
                    </tr>

                    <!-- Modal Edit Kategori -->
                    <div class="modal fade" id="modalEdit<?= $k['ID_Kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel">Edit Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/produk/kategori/update/<?= $k['ID_Kategori'] ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $k['Nama_Kategori'] ?>" required>
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/produk/kategori/create" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
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

<!-- Modal Detail Produk -->
<div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="modalProdukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProdukLabel">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody id="produk-list">
                        <!-- Produk list akan dimasukkan lewat AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function showProduk(id_kategori) {
        $.ajax({
            url: '/produk/kategori/produkByKategori/' + id_kategori,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var produkList = '';
                if (data.length > 0) {
                    data.forEach(function(produk) {
                        produkList += '<tr>' +
                            '<td>' + produk.Nama_Produk + '</td>' +
                            '<td>' + produk.Harga_Produk + '</td>' +
                            '<td>' + produk.Stok + '</td>' +
                            '</tr>';
                    });
                } else {
                    produkList = '<tr><td colspan="3">Tidak ada produk dalam kategori ini.</td></tr>';
                }
                $('#produk-list').html(produkList);
                $('#modalProduk').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    }
</script>

<?= $this->endSection() ?>