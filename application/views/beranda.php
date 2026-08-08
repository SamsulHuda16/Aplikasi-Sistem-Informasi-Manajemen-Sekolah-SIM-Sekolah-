<div class="main-content-inner">
    <!-- Welcome Banner Start -->
    <div class="row mt-4 mb-4">
        <div class="col-12">
            <div class="card bg-gradient-primary text-white shadow-sm border-0" style="background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%); border-radius: 15px;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap">
                    <div>
                        <h3 class="font-weight-bold mb-2 text-white">
                            <i class="fa fa-wave-square mr-2"></i>Selamat Datang Kembali, <?= $this->session->userdata('nama_lengkap') ? $this->session->userdata('nama_lengkap') : 'Administrator' ?>!
                        </h3>
                        <p class="mb-0 text-white-50" style="font-size: 1.05rem;">
                            Sistem Informasi Manajemen Sekolah terpadu. Pantau ringkasan data akademik Anda di sini.
                        </p>
                    </div>
                    <div class="mt-3 mt-md-0 text-right">
                        <span class="badge badge-light p-2 font-weight-normal shadow-sm" style="font-size: 0.9rem; border-radius: 8px;">
                            <i class="fa fa-calendar mr-1 text-primary"></i> <?= date('d F Y') ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome Banner End -->

    <!-- Statistics Cards Start -->
    <div class="sales-report-area mb-4">
        <div class="row">
            <!-- Siswa Card -->
            <div class="col-xl-3 col-ml-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-0 shadow-sm stat-card" style="border-radius: 12px; transition: transform 0.3s; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-uppercase text-white-50 font-weight-bold" style="font-size: 0.8rem; letter-spacing: 1px;">TOTAL SISWA</span>
                                <h2 class="text-white font-weight-bold mt-2 mb-0" style="font-size: 2.2rem;"><?= $s ?></h2>
                            </div>
                            <div class="stat-icon p-3 rounded-circle" style="background: rgba(255,255,255,0.2);">
                                <i class="fa fa-child fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-2 border-top border-light-50 d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('siswa') ?>" class="text-white-50 text-decoration-none font-weight-bold" style="font-size: 0.85rem;">
                                Kelola Data <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guru Card -->
            <div class="col-xl-3 col-ml-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-0 shadow-sm stat-card" style="border-radius: 12px; transition: transform 0.3s; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                    <div class="card-body text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-uppercase text-white-50 font-weight-bold" style="font-size: 0.8rem; letter-spacing: 1px;">TOTAL GURU</span>
                                <h2 class="text-white font-weight-bold mt-2 mb-0" style="font-size: 2.2rem;"><?= $gk ?></h2>
                            </div>
                            <div class="stat-icon p-3 rounded-circle" style="background: rgba(255,255,255,0.2);">
                                <i class="fa fa-black-tie fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-2 border-top border-light-50 d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('guru') ?>" class="text-white-50 text-decoration-none font-weight-bold" style="font-size: 0.85rem;">
                                Kelola Data <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kelas Card -->
            <div class="col-xl-3 col-ml-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-0 shadow-sm stat-card" style="border-radius: 12px; transition: transform 0.3s; background: linear-gradient(135deg, #ff9966 0%, #ff5e62 100%);">
                    <div class="card-body text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-uppercase text-white-50 font-weight-bold" style="font-size: 0.8rem; letter-spacing: 1px;">TOTAL KELAS</span>
                                <h2 class="text-white font-weight-bold mt-2 mb-0" style="font-size: 2.2rem;"><?= $k ?></h2>
                            </div>
                            <div class="stat-icon p-3 rounded-circle" style="background: rgba(255,255,255,0.2);">
                                <i class="fa fa-building fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-2 border-top border-light-50 d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('kelas') ?>" class="text-white-50 text-decoration-none font-weight-bold" style="font-size: 0.85rem;">
                                Kelola Data <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tahun Pelajaran Card -->
            <div class="col-xl-3 col-ml-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-0 shadow-sm stat-card" style="border-radius: 12px; transition: transform 0.3s; background: linear-gradient(135deg, #f857a6 0%, #ff5858 100%);">
                    <div class="card-body text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-uppercase text-white-50 font-weight-bold" style="font-size: 0.8rem; letter-spacing: 1px;">TAHUN AJARAN</span>
                                <h2 class="text-white font-weight-bold mt-2 mb-0" style="font-size: 2.2rem;"><?= isset($tp) ? $tp : 0 ?></h2>
                            </div>
                            <div class="stat-icon p-3 rounded-circle" style="background: rgba(255,255,255,0.2);">
                                <i class="ti-calendar fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-2 border-top border-light-50 d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('tahunajaran') ?>" class="text-white-50 text-decoration-none font-weight-bold" style="font-size: 0.85rem;">
                                Kelola Data <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Statistics Cards End -->

    <!-- Quick Shortcuts & System Status Start -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="header-title mb-4 font-weight-bold text-dark">
                        <i class="fa fa-bolt text-warning mr-2"></i>Pintasan Akses Cepat
                    </h5>
                    <div class="row text-center">
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= base_url('Admin/tambah_siswa') ?>" class="btn btn-outline-primary btn-block p-3 border-0 shadow-sm rounded-lg" style="background: #f8f9fa;">
                                <i class="fa fa-user-plus fa-2x text-primary d-block mb-2"></i>
                                <span class="font-weight-bold text-dark" style="font-size: 0.85rem;">Tambah Siswa</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= base_url('Admin/tambah_guru') ?>" class="btn btn-outline-success btn-block p-3 border-0 shadow-sm rounded-lg" style="background: #f8f9fa;">
                                <i class="fa fa-plus-circle fa-2x text-success d-block mb-2"></i>
                                <span class="font-weight-bold text-dark" style="font-size: 0.85rem;">Tambah Guru</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= base_url('Admin/tambah_kelas') ?>" class="btn btn-outline-warning btn-block p-3 border-0 shadow-sm rounded-lg" style="background: #f8f9fa;">
                                <i class="fa fa-building fa-2x text-warning d-block mb-2"></i>
                                <span class="font-weight-bold text-dark" style="font-size: 0.85rem;">Tambah Kelas</span>
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= base_url('users') ?>" class="btn btn-outline-info btn-block p-3 border-0 shadow-sm rounded-lg" style="background: #f8f9fa;">
                                <i class="fa fa-users-cog fa-2x text-info d-block mb-2"></i>
                                <span class="font-weight-bold text-dark" style="font-size: 0.85rem;">Kelola Users</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="header-title mb-4 font-weight-bold text-dark">
                        <i class="fa fa-info-circle text-info mr-2"></i>Status Sistem
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2 border-0">
                            <span class="text-muted"><i class="fa fa-database mr-2 text-primary"></i>Database</span>
                            <span class="badge badge-success badge-pill px-3 py-1">Terhubung (db_sekolah)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2 border-0">
                            <span class="text-muted"><i class="fa fa-user-shield mr-2 text-warning"></i>Hak Akses Level</span>
                            <span class="badge badge-primary badge-pill px-3 py-1"><?= strtoupper($this->session->userdata('level')) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2 border-0">
                            <span class="text-muted"><i class="fa fa-code mr-2 text-purple"></i>Framework</span>
                            <span class="badge badge-light badge-pill px-3 py-1">CodeIgniter 3.x</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick Shortcuts End -->
</div>

<style>
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
</style>