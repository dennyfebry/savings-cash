<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="theme-color" content="#000000" />
	<title>Uang Kas</title>
	<meta name="description" content="Uang Kas Islami City">
	<meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png" sizes="32x32" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/icon/192x192.png" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
	<link rel="manifest" href="<?= base_url() ?>__manifest.json" />
</head>

<body>
	<!-- loader -->
	<div id="loader">
		<img src="<?= base_url() ?>assets/img/loading-icon.png" alt="icon" class="loading-icon" />
	</div>
	<!-- * loader -->

	<!-- App Header -->
	<div class="appHeader bg-warning text-light">
		<div class="left"></div>
		<div class="pageTitle">
			<img src="<?= base_url() ?>assets/img/logo.png" alt="logo" class="logo" />
		</div>
		<div class="right"></div>
	</div>
	<!-- * App Header -->

	<!-- App Capsule -->
	<div id="appCapsule">
		<!-- Wallet Card -->
		<div class="section wallet-card-section pt-1">
			<div class="wallet-card">
				<!-- Balance -->
				<div class="balance">
					<div class="left">
						<span class="title">Total Kas</span>
						<h1 class="total">Rp<?= number_format(($sumIncome->total - $sumExpense->total), 0, ",", ".") ?></h1>
					</div>
				</div>
				<!-- * Balance -->
				<!-- Wallet Footer -->
				<div class="wallet-footer">
					<div class="item">
						<a href="#" data-bs-toggle="modal" data-bs-target="#pemasukanActionSheet">
							<div class="icon-wrapper">
								<ion-icon name="arrow-up-outline"></ion-icon>
							</div>
							<strong>Pemasukan</strong>
						</a>
					</div>
					<div class="item">
						<a href="#" data-bs-toggle="modal" data-bs-target="#pengeluaranActionSheet">
							<div class="icon-wrapper bg-danger">
								<ion-icon name="arrow-down-outline"></ion-icon>
							</div>
							<strong>Pengeluaran</strong>
						</a>
					</div>

					<div class="item">
						<a href="<?= base_url() ?>Home/cash">
							<div class="icon-wrapper bg-success">
								<ion-icon name="card-outline"></ion-icon>
							</div>
							<strong>Kas</strong>
						</a>
					</div>
				</div>
				<!-- * Wallet Footer -->
			</div>
		</div>
		<!-- Wallet Card -->

		<!-- Pemasukan Action Sheet -->
		<div class="modal fade action-sheet" id="pemasukanActionSheet" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Pemasukan</h5>
					</div>
					<div class="modal-body">
						<div class="action-sheet-content">
							<form class="form-horizontal" action="<?= base_url() ?>home/directAddIncome" method="post">
								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="people">Nama</label>
										<select class="form-control custom-select" name="people" id="people">
											<option hidden>Silahkan Pilih</option>
											<?php foreach ($people as $row) { ?>
												<option value="<?= $row->id ?>"> <?= $row->name ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="date">Tanggal</label>
										<input type="date" class="form-control" id="date" name="date" placeholder="Tanggal">
										<i class="clear-input">
											<ion-icon name="close-circle"></ion-icon>
										</i>
									</div>
								</div>

								<div class="form-group basic">
									<label class="label" for="description">Keterangan</label>
									<input type="text" class="form-control" id="description" name="description" placeholder="Keterangan">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>

								<div class="form-group basic">
									<label class="label" for="amount">Total</label>
									<input type="number" class="form-control" id="amount" name="amount" placeholder="Total">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>

								<div class="form-group basic">
									<input class="btn btn-success" type="submit" name="submit" value="Pemasukan">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- * Pemasukan Action Sheet -->

		<!-- Pengeluaran Action Sheet -->
		<div class="modal fade action-sheet" id="pengeluaranActionSheet" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Pengeluaran</h5>
					</div>
					<div class="modal-body">
						<div class="action-sheet-content">
							<form class="form-horizontal" action="<?= base_url() ?>home/directAddExpense" method="post">
								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="date">Tanggal</label>
										<input type="date" class="form-control" id="date" name="date" placeholder="Tanggal">
										<i class="clear-input">
											<ion-icon name="close-circle"></ion-icon>
										</i>
									</div>
								</div>
								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="item">Item</label>
										<input type="text" class="form-control" id="item" name="item" placeholder="Keterangan">
										<i class="clear-input">
											<ion-icon name="close-circle"></ion-icon>
										</i>
									</div>
								</div>
								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="total">Total</label>
										<input type="number" class="form-control" id="total" name="total" placeholder="Total">
										<i class="clear-input">
											<ion-icon name="close-circle"></ion-icon>
										</i>
									</div>
								</div>

								<div class="form-group basic">
									<label class="label" for="amount">Harga</label>
									<input type="number" class="form-control" id="amount" name="amount" placeholder="Harga">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>

								<div class="form-group basic">
									<input class="btn btn-success" type="submit" name="submit" value="Pengeluaran">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- * Pengeluaran Action Sheet -->

		<!-- Stats -->
		<div class="section">
			<div class="row mt-2">
				<div class="col-6">
					<div class="stat-box">
						<div class="title">Pemasukan</div>
						<div class="value text-success">Rp<?php if (isset($sumIncome->total)) {
																echo number_format($sumIncome->total, 0, ",", ".");
															} else {
																echo 0;
															}  ?></div>
					</div>
				</div>
				<div class="col-6">
					<div class="stat-box">
						<div class="title">Pengeluaran</div>
						<div class="value text-danger">Rp<?php if (isset($sumExpense->total)) {
																echo number_format($sumExpense->total, 0, ",", ".");
															} else {
																echo 0;
															} ?></div>
					</div>
				</div>
			</div>
		</div>
		<!-- * Stats -->

		<!-- Transactions -->
		<div class="section mt-4">
			<div class="section-heading">
				<h2 class="title">Transaksi</h2>
				<a href="<?= base_url() ?>home/expense" class="link">Liat lainnya</a>
			</div>
			<div class="transactions">
				<?php foreach ($getTransaction as $row) { ?>
					<!-- item -->
					<a href="#" class="item">
						<div class="detail">
							<div>
								<strong><?= $row->name ?></strong>
								<p><?= $row->date ?></p>
								<?php if ($row->type == 'income') { ?>
									<p><?= $row->ket ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="right">
							<div class="price <?php if ($row->type == 'expense') {
													echo 'text-danger';
												} ?>"><?php if ($row->type == 'expense') {
															echo '-';
														} ?> Rp<?= number_format($row->amount, 0, ",", ".") ?></div>
						</div>
					</a>
					<!-- * item -->
				<?php } ?>
			</div>
		</div>
		<!-- * Transactions -->

		<!-- app footer -->
		<!-- <div class="appFooter">
        <div class="footer-title">Copyright © dennyfebrygo.com</div>
      </div> -->
		<!-- * app footer -->
	</div>
	<!-- * App Capsule -->

	<!-- App Bottom Menu -->
	<div class="appBottomMenu bg-warning text-light">
		<a href="<?= base_url() ?>" class="item active">
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
		<a href="<?= base_url() ?>Home/cash" class="item">
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

	<!-- iOS Add to Home Action Sheet -->
	<div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add to Home Screen</h5>
					<a href="#" class="close-button" data-bs-dismiss="modal">
						<ion-icon name="close"></ion-icon>
					</a>
				</div>
				<div class="modal-body">
					<div class="action-sheet-content text-center">
						<div class="mb-1">
							<img src="<?= base_url() ?>assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2" />
						</div>
						<div>
							Install <strong>Finapp</strong> on your iPhone's home screen.
						</div>
						<div>
							Tap <ion-icon name="share-outline"></ion-icon> and Add to
							homescreen.
						</div>
						<div class="mt-2">
							<button class="btn btn-warning btn-block" data-bs-dismiss="modal">
								CLOSE
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- * iOS Add to Home Action Sheet -->

	<!-- Android Add to Home Action Sheet -->
	<div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add to Home Screen</h5>
					<a href="#" class="close-button" data-bs-dismiss="modal">
						<ion-icon name="close"></ion-icon>
					</a>
				</div>
				<div class="modal-body">
					<div class="action-sheet-content text-center">
						<div class="mb-1">
							<img src="<?= base_url() ?>assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2" />
						</div>
						<div>
							Install <strong>Finapp</strong> on your Android's home screen.
						</div>
						<div>
							Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to
							homescreen.
						</div>
						<div class="mt-2">
							<button class="btn btn-warning btn-block" data-bs-dismiss="modal">
								CLOSE
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- * Android Add to Home Action Sheet -->

	<div id="cookiesbox" class="offcanvas offcanvas-bottom cookies-box" tabindex="-1" data-bs-scroll="true" data-bs-backdrop="false">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title">We use cookies</h5>
		</div>
		<div class="offcanvas-body">
			<div>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non
				lacinia quam. Nulla facilisi.
				<a href="#" class="text-secondary"><u>Learn more</u></a>
			</div>
			<div class="buttons">
				<a href="#" class="btn btn-warning btn-block" data-bs-dismiss="offcanvas">I understand</a>
			</div>
		</div>
	</div>

	<!-- ========= JS Files =========  -->
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>assets/js/lib/bootstrap.bundle.min.js"></script>
	<!-- Ionicons -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<!-- Splide -->
	<script src="<?= base_url() ?>assets/js/plugins/splide/splide.min.js"></script>
	<!-- Base Js File -->
	<script src="<?= base_url() ?>assets/js/base.js"></script>

	<script>
		// Add to Home with 2 seconds delay.
		AddtoHome('2000', 'once');
	</script>
</body>

</html>