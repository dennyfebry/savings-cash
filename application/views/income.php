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
        <div class="pageTitle">
            <?= $title ?>
        </div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">
		<br>
		<center>
			<a href="<?= base_url()?>Home/addIncome" class="btn btn-primary me-1">+ Tambah Pemasukan</a>
		</center>
		<br>
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
        <!-- Transactions -->
		<?php foreach ($getDate as $date) { ?>
        <div class="section mt-2">
            <div class="section-title"><?= date('M d, Y', strtotime($date->date))?></div>
            <div class="transactions">
                <!-- item -->
				<?php foreach ($getData as $row) { 
					if($date->date == $row->date){?>
					<a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogIconedButtonInline<?= $row->id ?>">
						<div class="detail">
							<!-- <img src="<?= base_url() ?>assets/img/sample/brand/1.jpg" alt="img" class="image-block imaged w48"> -->
							<div>
								<strong><?= $row->name?></strong>
								<p><?= $row->description?></p>
							</div>
						</div>
						<div class="right">
							<div class="price">Rp<?= number_format($row->amount,0,',','.')?></div>
						</div>
					</a>
				<?php }} ?>
                <!-- * item -->
            </div>
        </div>
        <!-- * Transactions -->
		<?php } ?>

        <!-- <div class="section mt-2 mb-2">
            <a href="#" class="btn btn-primary btn-block btn-lg">Load More</a>
        </div> -->


    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
   <div class="appBottomMenu bg-warning text-light">
		<a href="<?= base_url()?>" class="item ">
			<div class="col">
				<ion-icon name="pie-chart-outline"></ion-icon>
				<strong>Overview</strong>
			</div>
		</a>
		<a href="<?= base_url()?>Home/income" class="item active">
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
		<a href="<?= base_url()?>Home/user" class="item">
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
							<a href="<?= base_url()?>Home/editIncome/<?= $row->id ?>" class="btn btn-text-primary" >
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