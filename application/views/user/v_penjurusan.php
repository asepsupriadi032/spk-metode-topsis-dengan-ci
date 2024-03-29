<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMA PKP Jakarta Islamic School</title>
  <!-- <base href="<?php //echo base_url("assets/user")?>/"> -->

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/user')?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/user')?>/css/agency.min.css" rel="stylesheet">
  <style type="text/css">
  	header.masthead{
  		background-image: url('<?php echo base_url('assets/user/fasilitas/abc.png') ?>') !important;
  	}
  </style>

</head>
<!--banner-->
<body id="page-top">

 
<?php
	if($row==0){ 
?>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><u><?php echo $pesan; ?></u></a>
    </div>
  </nav>

<?php }else{ ?>
		<table class="table table-bordered">
			<thead>
				<tr>
          <th>Tahun Ajaran</th>
          <th>NIS</th>
          <th>Nama</th>
					<th>Hasil</th>
				</tr>
			</thead>
			<tbody>
				<tr>
          <td><?php echo $key->tahun_ajaran?></td>
          <td><?php echo $key->nis?></td>
					<td><?php echo $key->nama_siswa?></td>
					<td><?php echo $key->hasil ?></td>
				</tr>
			</tbody>
		</table>
<?php } ?>	
