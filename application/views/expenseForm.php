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

<?php
if (!isset($edit)) {
    $id             = set_value('id');
    $date           = date('Y-m-d');
    $item           = set_value('item');
    $total          = set_value('total');
    $amount         = set_value('amount');
} else {
    $id             = $getRow->id;
    $date           = $getRow->date;
    $item           = $getRow->item;
    $total          = $getRow->total;
    $amount         = $getRow->amount;
}
?>
    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url() ?>assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= base_url()?>Home/expense" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"><?= $title ?></div>
        <div class="right">
            <?php if(isset($edit)){ ?>
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasicDelete">
                <ion-icon name="trash-outline" role="img" class="md hydrated" aria-label="trash outline"></ion-icon>
            </a>
            <?php } ?>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <!-- <div class="section-title">Add Anak</div> -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-05">
                        <!-- Type something to activate animation. -->
                    </div>
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label" for="date">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Tanggal" value="<?= $date ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-wrapper">
                                <label class="label" for="item">Item</label>
                                <input type="text" class="form-control" id="item" name="item" placeholder="Keterangan" value="<?= $item ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                            <div class="input-wrapper">
                                <label class="label" for="total">Total</label>
                                <input type="number" class="form-control" id="total" name="total" placeholder="Total" value="<?= $total ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                <?php echo form_error('total') ?>
                            </div>
                            <div class="input-wrapper">
                                <label class="label" for="amount">Harga</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Harga" value="<?= $amount ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                <?php echo form_error('amount') ?>
                            </div>
                            <br><br>
                            <center>
                                <input class="btn btn-success" type="submit" name="submit" value="Save">
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
		<a href="<?= base_url()?>Home/income" class="item ">
			<div class="col">
				<ion-icon name="arrow-up-outline"></ion-icon>
				<strong>Pemasukan</strong>
			</div>
		</a>
		<a href="<?= base_url()?>Home/expense" class="item active">
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
    <div class="modal fade dialogbox" id="DialogBasicDelete" data-bs-backdrop="static" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title">Sending $50 to John</h5> -->
                </div>
                <div class="modal-body">
                    Apakah anda ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-danger" >
                            <ion-icon name="close-outline"></ion-icon>
                            Tidak
                        </a>
                        <a href="<?= base_url()?>Home/deleteExpense/<?= $id ?>" class="btn btn-text-primary" >
                            <ion-icon name="checkmark-outline"></ion-icon>
                            Ya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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