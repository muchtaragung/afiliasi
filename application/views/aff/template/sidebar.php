<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img style="filter: grayscale(100%);" src="<?= base_url() ?>assets/images/user.png">
        </div>
        <div class="user-name">
            <?= $this->session->userdata('name'); ?>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="icon-bag menu-icon"></i>
                <span class="menu-title">Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Histori penjualan</span>
            </a>
        </li>
    </ul>
</nav>