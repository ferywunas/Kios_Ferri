<?= $this->extend('layout/main'); ?>
<?= $this->section('judul'); ?>
Pelanggan
<?= $this->endSection('judul'); ?>
<?= $this->section('isi'); ?>
<h2>Pelanggan</h2>
<!-- Button untuk Tambah Pelanggan -->
<button class="btn btn-primary" data-toggle="modal" data-target="#tambahPelangganModal">Tambah Pelanggan</button>

<!-- Notifikasi -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Tabel Pelanggan -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pelanggan as $item): ?>
            <tr>
                <td><?= $item['ID_Pelanggan']; ?></td>
                <td><?= $item['Nama']; ?></td>
                <td><?= $item['Email']; ?></td>
                <td><?= $item['Alamat']; ?></td>
                <td><?= $item['No_tlp']; ?></td>
                <!-- Button Edit: Fixed onclick -->
<td>
    <button type="button" class="btn btn-warning" onclick="editPelanggan(<?= $item['ID_Pelanggan']; ?>)">Edit</button>
    <form action="<?= base_url('/pelanggan/delete/' . $item['ID_Pelanggan']); ?>" method="post" style="display:inline;">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</button>
    </form>
</td>


            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- Modal Tambah Pelanggan -->
<div class="modal fade" id="tambahPelangganModal" tabindex="-1" role="dialog" aria-labelledby="tambahPelangganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/pelanggan/create'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPelangganLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">No Telepon</label>
                        <input type="text" class="form-control" name="no_tlp" required>
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

<!-- Modal Edit Pelanggan -->
<div class="modal fade" id="editPelangganModal" tabindex="-1" role="dialog" aria-labelledby="editPelangganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editPelangganForm" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPelangganLabel">Edit Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="edit_nama" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" name="email" id="edit_email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="edit_alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_no_tlp">No Telepon</label>
                        <input type="text" class="form-control" name="no_tlp" id="edit_no_tlp" required>
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

<!-- Script untuk mengisi data modal edit -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function editPelanggan(id) {
        $.ajax({
            url: '<?= base_url('/pelanggan/edit/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Isi data ke dalam input modal
                $('#edit_nama').val(data.Nama);
                $('#edit_email').val(data.Email);
                $('#edit_alamat').val(data.Alamat);
                $('#edit_no_tlp').val(data.No_tlp);

                // Set action pada form untuk update
                $('#editPelangganForm').attr('action', '<?= base_url('/pelanggan/update/') ?>' + id);

                // Tampilkan modal edit
                $('#editPelangganModal').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan saat mengambil data pelanggan: ' + xhr.responseJSON?.error || error);
            }
        });
    }
</script>
...
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Consolidate Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function editPelanggan(id) {
        $.ajax({
            url: '<?= base_url('/pelanggan/edit/') ?>' + id,
            type: 'GET',
            dataType: 'json', // Ensure server returns JSON
            success: function(data) {
                // Fill modal fields with data
                $('#edit_nama').val(data.Nama);
                $('#edit_email').val(data.Email);
                $('#edit_alamat').val(data.Alamat);
                $('#edit_no_tlp').val(data.No_tlp);

                // Set form action for update
                $('#editPelangganForm').attr('action', '<?= base_url('/pelanggan/update/') ?>' + id);

                // Show the modal
                $('#editPelangganModal').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan saat mengambil data pelanggan: ' + xhr.responseJSON?.error || error);
            }
        });
    }
</script>
<?= $this->endSection('isi'); ?>