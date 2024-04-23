<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $jobs = $_SESSION['user']['jobs'];
    $avatar = $_SESSION['user']['avatar'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}

?>


<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default"></div>
        </div>
    </div>
</div>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Products</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="index.php?controller=product">Menu</a></li>
            <li class="nav-item"> <a class="nav-link" href="">Food</a></li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Customer</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Oder</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="" >
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Promotion</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Table</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Employee</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#system" aria-expanded="false" aria-controls="system">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">System</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="system">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">System</a></li>
            <li class="nav-item"> <a class="nav-link" href="">System</a></li>
            </ul>
        </div>
        </li>
    </ul>
</nav>



<!-- <div class="message-wrap content-wrap content-wrapper">
    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
    </section>
</div> -->