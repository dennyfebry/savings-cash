<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Uang Kas</title>
    <meta name="description" content="Uang Kas Islami City">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="manifest" href="<?= base_url() ?>__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url() ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <!-- <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a> -->
        </div>
        <div class="pageTitle"><?= $title ?></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mt-2 mb-2">
            <div class="goals">
                <!-- item -->
                <?php foreach ($getCash as $row) { ?>
                    <div class="item">
                        <div class="in">
                            <div>
                                <h4><?= $row->name ?></h4>
                                <!-- <p>Gaming</p> -->
                            </div>
                            <div class="price">Rp<?php if ($row->amount == 0) {
                                                        echo '0';
                                                    } else {
                                                        echo number_format($row->amount, 0, ",", ".");
                                                    } ?></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= (($row->amount / $getCashMax->amount) * 100) ?>%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><?php if ($row->amount == 0) {
                                                                                                                                                                                                            echo '0';
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo number_format((($row->amount / $getCashMax->amount) * 100), 0, ",", "");
                                                                                                                                                                                                        }  ?>%</div>
                        </div>
                    </div>
                <?php } ?>
                <!-- * item -->

            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu bg-warning text-light">
        <a href="<?= base_url() ?>" class="item">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Overview</strong>
            </div>
        </a>
        <a href="<?= base_url() ?>Home/income" class="item">
            <div class="col">
                <ion-icon name="arrow-up-outline"></ion-icon>
                <strong>Pemasukan</strong>
            </div>
        </a>
        <a href="<?= base_url() ?>Home/expense" class="item">
            <div class="col">
                <ion-icon name="arrow-down-outline"></ion-icon>
                <strong>Pengeluaran</strong>
            </div>
        </a>
        <a href="<?= base_url() ?>Home/cash" class="item active">
            <div class="col">
                <ion-icon name="cash-outline"></ion-icon>
                <strong>Kas</strong>
            </div>
        </a>
        <a href="<?= base_url() ?>Home/user" class="item">
            <div class="col">
                <ion-icon name="person-circle-outline"></ion-icon>
                <strong>Anak</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->


    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?= base_url() ?>assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url() ?>assets/js/base.js"></script>


</body>

</html>