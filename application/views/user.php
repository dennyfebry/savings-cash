<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
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
		<br>
		<center>
			<a href="<?= base_url()?>Home/addUser" class="btn btn-primary me-1">+ Tambah Anak</a>
		</center>
		<br>
        <!-- <div class="listview-title mt-2">with Header & Footer Inset</div> -->
        <ul class="listview image-listview inset">
			<?php if($this->session->flashdata('success')){ ?>
				<div class="alert alert-success mb-1" role="alert">
					<?= $this->session->flashdata('success')?>
				</div>
				<br>
			<?php }else if($this->session->flashdata('danger')){ ?>
				<div class="alert alert-danger mb-1" role="alert">
					<?= $this->session->flashdata('danger')?>
				</div>
				<br>
			<?php } ?>
			<?php foreach ($getData as $row) { ?>
            <li>
				<!-- <img src="<?= base_url() ?>assets/img/sample/avatar/avatar1.jpg" alt="image" class="image"> -->
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogIconedButtonInline<?= $row->id ?>">
                    <div class="in">
						<div>
							<header><?= $row->name ?></header>
							<?= $row->ttl ?>
							<footer><?= $row->address ?></footer>
						</div>
						<span class="text-muted">Edit</span>
					</div>
				</a>
			</li>
			<?php } ?>
        </ul>

    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu bg-warning text-light">
		<a href="<?= base_url()?>" class="item">
			<div class="col">
				<ion-icon name="pie-chart-outline"></ion-icon>
				<strong>Overview</strong>
			</div>
		</a>
		<a href="<?= base_url()?>Home/income" class="item">
			<div class="col">
				<ion-icon name="arrow-up-outline"></ion-icon>
				<strong>Pemasukan</strong>
			</div>
		</a>
		<a href="<?= base_url()?>Home/expense" class="item">
			<div class="col">
				<ion-icon name="arrow-down-outline"></ion-icon>
				<strong>Pengeluaran</strong>
			</div>
		</a>
		<a href="<?= base_url()?>Home/cash" class="item">
			<div class="col">
				<ion-icon name="cash-outline"></ion-icon>
				<strong>Kas</strong>
			</div>
		</a>
		<a href="<?= base_url()?>Home/user" class="item active">
			<div class="col">
				<ion-icon name="person-circle-outline"></ion-icon>
				<strong>Anak</strong>
			</div>
		</a>
	</div>
    <!-- * App Bottom Menu -->

	<!-- Dialog Iconed Inline -->
	<?php foreach ($getData as $row) { ?>
		<div class="modal fade dialogbox" id="DialogIconedButtonInline<?= $row->id ?>" data-bs-backdrop="static" tabindex="-1"
			role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<!-- <h5 class="modal-title">Sending $50 to John</h5> -->
					</div>
					<div class="modal-body">
						Apakah anda ingin mengedit data ini?
					</div>
					<div class="modal-footer">
						<div class="btn-inline">
							<a href="#" class="btn btn-text-danger" >
								<ion-icon name="close-outline"></ion-icon>
								Tidak
							</a>
							<a href="<?= base_url()?>Home/editUser/<?= $row->id ?>" class="btn btn-text-primary" >
								<ion-icon name="checkmark-outline"></ion-icon>
								Ya
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- * Dialog Iconed Inline -->


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