<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Bootstrap Admin Theme</title>

	<!-- Bootstrap Core CSS -->
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Timeline CSS -->
	<link href="../dist/css/timeline.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<meta charset="utf-8" />
	<title>Penjadwalan Matapelajaran- <?php echo $page_title; ?></title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.css" />

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/badger.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/datepicker/css/datepicker.css" />
	<script src="<?php echo base_url() ?>assets/lib/jquery-latest.min.js" type="text/javascript"></script>
	<style type="text/css">
		body .frmModalMsg {
			/* new custom width */
			width: 740px;
			/* must be half of the width, minus scrollbar on the left (30px) */
			margin-left: -280px;
		}

		#line-chart {
			height: 300px;
			width: 800px;
			margin: 0px auto;
			margin-top: 1em;
		}

		.brand {
			font-family: georgia, serif;
		}

		.brand .first {
			color: #ccc;
			font-style: italic;
		}

		.brand .second {
			color: #fff;
			font-weight: bold;
		}

		#loading-div-background {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			background: #fff;
			width: 100%;
			height: 100%;
		}

		#loading-div {
			width: 300px;
			height: 150px;
			background-color: #fff;
			border: 5px solid #1468b3;
			text-align: center;
			color: #202020;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
		}

		/* Add a black background color to the top navigation */
		.topnav {
			background-color: #333;
			overflow: hidden;
			float: right;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
			background-color: #4CAF50;
			color: white;
		}
	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#loading-div-background").css({
				opacity: 0.5
			});
			<?php if (isset($clear_text_box)) { ?>
				$('input[type=text]').each(function() {
					$(this).val('');
				});
			<?php } ?>
		});

		function ShowProgressAnimation() {
			$("#loading-div-background").show();
		}

		function change_get() {
			var semester_tipe = document.getElementById('semester_tipe');
			var tahun_akademik = document.getElementById('tahun_akademik');
			window.location.href = "<?php echo base_url() . 'web/pengampu/' ?>" + semester_tipe.options[semester_tipe.selectedIndex].value + "/" + tahun_akademik.options[tahun_akademik.selectedIndex].value;
		}

		function change_guru_tidak_bersedia() {
			var kode_guru = document.getElementById('kode_guru');
			window.location.href = "<?php echo base_url() . 'web/waktu_tidak_bersedia/' ?>" + kode_guru.options[kode_guru.selectedIndex].value;
		}

		function get_matapelajaran() {
			var semester_tipe = document.getElementById('semester_tipe');
			//
			$.ajax({
				type: "POST",
				async: false,
				cache: false,
				url: "<?php echo base_url() ?>web/option_matapelajaran_ajax/" + semester_tipe.options[semester_tipe.selectedIndex].value,
				success: function(msg) {
					//alert(msg);
					$('#option_matapelajaran').html(msg);
				}
			});
			return false;
		}

		/*
	  $('#myTable tr').click({
		 $(this).remove();
		   return false;
	   };
		
		*/
		function delete_row(link, kode) {
			var answer = confirm('Anda yakin ingin menghapus data ini?');
			if (answer) {
				$.ajax({
					type: "POST",
					async: false,
					cache: false,
					url: "<?php echo base_url() ?>" + link + kode,
					success: function(msg) {
						//alert(msg);
						//$('#option_matapelajaran').html(msg);
						var tr = $('#row_' + kode);
						tr.css("background-color", "#FF3700");
						tr.fadeOut(400, function() {
							tr.remove();
						});
					}
				});

			}
			return false;
		}

		$(function() {
			applyPagination();

			function applyPagination() {
				$("#ajax_paging a").click(function() {

					var url = $(this).attr("href");
					$.ajax({
						type: "POST",
						data: "ajax=1",
						url: url,
						success: function(msg) {
							$('#content_ajax').fadeOut(0, function() {
								$('#content_ajax').html(msg);
								$("#content_ajax").removeAttr("style");
								applyPagination();
							}).fadeIn(0);
						}
					});
					return false;
				});
			}


		});
	</script>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
	<!-- Le fav and touch icons -->

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>

<!--[if lt IE 7 ]> 
   <body class="ie ie6">
      <![endif]-->
<!--[if IE 7 ]> 
      <body class="ie ie7 ">
         <![endif]-->
<!--[if IE 8 ]> 
         <body class="ie ie8 ">
            <![endif]-->
<!--[if IE 9 ]> 
            <body class="ie ie9 ">
               <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<body class="">
	<!--<![endif]-->
	<!-- <div class="navbar">

		<div style="margin-left: 81%;">
			<p>Selamat Datang, <?php echo $ses_nama; ?> |
				<?php
				if ($ses_level == 'admin') { ?>
					<a href="<?php echo base_url(); ?>pengaturan" title="Klik untuk merubah kata sandi">Pengaturan</a></p>
		<?php } ?>
		<?php
		if ($ses_level == 'guru') { ?>
			<a href="<?php echo base_url(); ?>keluar">Keluar</a>
		<?php } ?>
		</div>
	</div> -->


	<!-- <div class="sidebar-nav" style="padding-top: 5px"> -->
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="p-4 pt-5">
				<a href="#" class="img logo rounded-circle mb-5" style="background-image: url('<?php echo base_url(); ?>assets/img/logo.png');"></a>
				<?php
				if ($ses_level != 'admin') {
				?>
					<a href="<?php echo base_url(); ?>web" class="nav-header"><i class="icon-th-list"></i>Beranda</a>
					<a class="nav-header"><i class="icon-book"></i>Proses </a>
					<ul id="content-menu" class="nav nav-list collapse in">
						<li><a href="<?php echo base_url(); ?>penjadwalan"><i class="icon-th-list"></i>Penjadwalan</a></li>
						<li><a class="nav-header" href="<?php echo base_url() ?>waktu_tidak_bersedia"><i class="icon-ban-circle"></i>Waktu Tidak Bersedia</a></li>
					</ul>
					<a href="<?php echo base_url(); ?>keluar" class="nav-header"><i class="icon-signout"></i>Keluar</a>

				<?php } else { ?>
					<ul class="list-unstyled components mb-5">
						<li>
							<a href="<?php echo base_url(); ?>web" class="nav-header"><i class="icon-th-list"></i>Beranda</a>
						</li>

						<li>
							<a class="nav-header" href="<?php echo base_url() ?>guru"><i class="icon-user"></i>Guru</a>
						</li>
						<li>
							<a class="nav-header" href="<?php echo base_url() ?>matapelajaran"><i class="icon-book"></i>Mata Pelajaran</a>
						</li>
						<li>
							<a class="nav-header" href="<?php echo base_url(); ?>pengampu"><i class="icon-th-list"></i>Pengampu</a>
						</li>
						<li>
							<a class="nav-header" href="<?php echo base_url() ?>ruang"><i class="icon-home"></i>Ruang</a>
						</li>
						<li>
							<a class="nav-header" href="<?php echo base_url() ?>jam"><i class="icon-time"></i>Jam</a>
						</li>
						<li>
							<a class="nav-header" href="<?php echo base_url() ?>hari"><i class="icon-calendar"></i>Hari</a>
						</li>
						<!-- <a class="nav-header" href="<?php echo base_url() ?>fitnes"><i class="icon-calendar"></i>Fitnes</a>-->
						<li>
							<a class="nav-header" href="<?php echo base_url() ?>waktu_tidak_bersedia"><i class="icon-ban-circle"></i>Waktu Tidak Bersedia</a>
						</li>


						<li>
							<a class="nav-header" href="<?php echo base_url(); ?>penjadwalan"><i class="icon-th-list"></i>Penjadwalan</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>pengaturan" class="nav-header" title="Klik untuk merubah kata sandi"><i class="icon-cogs"></i>Pengaturan</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>keluar" class="nav-header" title="Klik untuk keluar dari Aplikasi"><i class="icon-signout"></i>Keluar</a>
						</li>
					</ul>
				<?php } ?>
			</div>
		</nav>

		<div id="content" class="p-4 p-md-5">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<!-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button> -->
					<!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-bars"></i>
					</button> -->

					<div class="topnav">
						<a class="nav-link">Selamat Datang, <?php echo $ses_nama; ?></a>
						<a class="nav-link" href="<?php echo base_url(); ?>pengaturan">Pengaturan</a>
						<a class="nav-link" href="<?php echo base_url(); ?>keluar">Keluar</a>

					</div>

					<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="#">Selamat Datang, <?php echo $ses_nama; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>pengaturan" title="Klik untuk merubah kata sandi">Pengaturan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>keluar">Keluar</a>
							</li>
						</ul>
					</div> -->
				</div>
			</nav>

			<?php
			$page_name .= ".php";
			include $page_name;
			?>
		</div>
	</div>





	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/jquery.slugit.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap-filestyle.min.js"> </script>

	<script type="text/javascript">
		$("[rel=tooltip]").tooltip();
		$(function() {
			$('.demo-cancel-click').click(function() {
				return false;
			});
		});
	</script>
</body>

</html>