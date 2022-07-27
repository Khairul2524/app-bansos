<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('/') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#perhitungan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calculator"></i><span>Perhitungan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="perhitungan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('/perhitungan') ?>">
                        <i class="bi bi-circle"></i><span>Aras</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#penduduk" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Penduduk</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="penduduk" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('/penduduk') ?>">
                        <i class="bi bi-circle"></i><span>Data Penduduk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/penduduk/form') ?>">
                        <i class="bi bi-circle"></i><span>Tambah Penduduk</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('/kriteria') ?>">
                <i class="bi bi-bookshelf"></i>
                <span>Kriteria</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('/bobot') ?>">
                <i class="bi bi-star-fill"></i>
                <span>Bobot</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-bounding-box"></i><span>Manajemen User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('/user') ?>">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/level') ?>">
                        <i class="bi bi-circle"></i><span>Level</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

    </ul>

</aside>