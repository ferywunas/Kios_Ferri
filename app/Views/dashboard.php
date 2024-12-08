<?= $this->extend('layout/main') ?>

<?= $this->section('judul') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<h2>Selamat datang di Dashboard</h2>
<div class="card card-success">
    <div class="card-body">
        <div class="row">
            <!-- CSS untuk ukuran gambar dan overlay -->
            <style>
                .card-img-top {
                    width: 100%;
                    height: 250px;
                    /* Atur tinggi yang seragam */
                    object-fit: cover;
                    /* Mengatur gambar agar sesuai dengan card */
                }

                .card-img-overlay {
                    background-color: rgba(0, 0, 0, 0.5);
                    /* Background semi-transparan untuk overlay */
                    color: #fff;
                    /* Warna teks putih */
                }
            </style>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/pelanggan.png" alt="Pelanggan">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Pelanggan</h5>
                        <p class="card-text pb-2 pt-1">memberikan informasi lengkap dan kemudahan dalam mengelola data pelanggan</p>
                        <a href="/pelanggan" class="text-white">
                            <i class="fas fa-user-friends"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/produk.png" alt="Produk">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Produk</h5>
                        <p class="card-text pb-2 pt-1">memberikan informasi lengkap dan kemudahan dalam pengelolaan data produk.</p>
                        <a href="/produk/produk" class="text-white">
                            <i class="fas fa-box"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/kategori.png" alt="Kategori">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Kategori</h5>
                        <p class="card-text pb-2 pt-1">mengelompokkan dan mengelola produk berdasarkan kategori tertentu</p>
                        <a href="/produk/kategori" class="text-white">
                            <i class="fas fa-tags"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/supplier.png" alt="Supplier">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Supplier</h5>
                        <p class="card-text pb-2 pt-1">mengelola informasi terkait pemasok atau supplier yang menyuplai produk ke kios</p>
                        <a href="/produk/supplier" class="text-white">
                            <i class="fas fa-truck"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/pembelian.png" alt="Pembelian">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Pembelian</h5>
                        <p class="card-text pb-2 pt-1">mengelola semua transaksi pembelian produk dari supplier</p>
                        <a href="/transaksi/pembelian" class="text-white">
                            <i class="fas fa-shopping-cart"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/penjualan.png" alt="Penjualan">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Penjualan</h5>
                        <p class="card-text pb-2 pt-1">mengelola dan mencatat semua transaksi penjualan produk kepada pelanggan.</p>
                        <a href="#" class="text-white">
                            <i class="fas fa-dollar-sign"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/pembayaran.png" alt="Pembayaran">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Pembayaran</h5>
                        <p class="card-text pb-2 pt-1">mengelola dan mencatat semua transaksi pembayaran yang dilakukan oleh pelanggan.</p>
                        <a href="#" class="text-white">
                            <i class="fas fa-credit-card"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top img-fluid" src="<?= base_url() ?>/dist/img/laporan.png" alt="Laporan">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Laporan</h5>
                        <p class="card-text pb-2 pt-1">mengumpulkan dan menyajikan data keuangan dan operasional dari berbagai transaksi dalam sistem.</p>
                        <a href="#" class="text-white">
                            <i class="fas fa-file-alt"></i> Go ->
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>