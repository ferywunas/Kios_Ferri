<?= $this->extend('layout/main'); ?>
<?= $this->section('judul'); ?>
Pembayaran
<?= $this->endSection('judul'); ?>
<?= $this->section('isi'); ?>

<!-- Notifikasi -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- Tombol Tambah Data -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPaymentModal">Tambah Pembayaran</button>

<!-- Tabel Pembayaran -->
<table class="table">
    <thead>
        <tr>
            <th>ID Pembayaran</th>
            <th>ID Penjualan</th>
            <th>Metode Pembayaran</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembayaran as $item): ?>
            <tr>
                <td><?= $item['ID_Pembayaran']; ?></td>
                <td><?= $item['Nama']; ?></td> <!-- Menampilkan Nama Pelanggan -->
                <td><?= $item['Metode_Pembayaran']; ?></td>
                <td><?= $item['Status_Pembayaran']; ?></td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editPaymentModal" data-id="<?= $item['ID_Pembayaran']; ?>">Edit</button>
                    <form action="/transaksi/pembayaran/delete/<?= $item['ID_Pembayaran']; ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Tambah Pembayaran -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/transaksi/pembayaran/create" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Tambah Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ID_Penjualan">ID Penjualan</label>
                        <select name="ID_Penjualan" class="form-control" required>
                            <option value="">Pilih Penjualan</option> <!-- Default option -->
                            <?php foreach ($penjualan as $penjualanItem): ?>
                                <option value="<?= $penjualanItem['ID_Penjualan']; ?>"><?= $penjualanItem['ID_Pelanggan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Metode_Pembayaran">Metode Pembayaran</label>
                        <input type="text" name="Metode_Pembayaran" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Status_Pembayaran">Status Pembayaran</label>
                        <input type="text" name="Status_Pembayaran" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Pembayaran -->
<div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editPaymentForm" action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPaymentModalLabel">Edit Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ID_Pembayaran" id="editID_Pembayaran">
                    <div class="form-group">
                        <label for="editID_Penjualan">ID Penjualan</label>
                        <select name="ID_Penjualan" id="editID_Penjualan" class="form-control" required>
                            <option value="">Pilih Penjualan</option> <!-- Default option -->
                            <?php foreach ($penjualan as $penjualanItem): ?>
                                <option value="<?= $penjualanItem['ID_Penjualan']; ?>"><?= $penjualanItem['ID_Pelanggan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editMetode_Pembayaran">Metode Pembayaran</label>
                        <input type="text" name="Metode_Pembayaran" id="editMetode_Pembayaran" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editStatus_Pembayaran">Status Pembayaran</label>
                        <input type="text" name="Status_Pembayaran" id="editStatus_Pembayaran" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $('#editPaymentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');

        $.ajax({
            url: '/transaksi/pembayaran/edit/' + id,
            method: 'GET',
            success: function(data) {
                $('#editID_Pembayaran').val(data.ID_Pembayaran);
                $('#editID_Penjualan').val(data.ID_Penjualan);
                $('#editMetode_Pembayaran').val(data.Metode_Pembayaran);
                $('#editStatus_Pembayaran').val(data.Status_Pembayaran);
                $('#editPaymentForm').attr('action', '/transaksi/pembayaran/update/' + id);
            }
        });
    });
</script>

<?= $this->endSection('isi'); ?>