<?php
	require 'App/init.php';
	$produk1=new buku("JAVA Referensi Lengkap untuk Programmer","RH.Sianipar","ANDI","386 halaman",180000);
	$produk2=new buku("7 IN 1 PEMROGRAMAN WEB UNTUK PEMULA","Rohi Abdulloh","ELEX MEDIA KOMPUTINDO","320 halaman",74800);
	$produk3=new buku("HTML 5 Dasar,CSS,JavaScript","BETHA SIDIK","Penerbit INFORMATIKA","308 halaman",90000);
	use App\Produk\User as ProdukUser;
	use App\Service\User as ServiceUser;
	
	new ProdukUser;
	echo "<br>";
	new ServiceUser;
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Produk</title>
	<link rel="stylesheet" type="text/css" href="../produk.css">
</head>
<body>
	<h1>Buku</h1>
	<table>
	<div class="kiri">
		<tr>
			<td>
				<div class="image1"></div>
			</td>
		</tr>
		<tr>
			<td id="produk1">
				<h3><?= $produk1->getJudul(); ?></h3>
				<?= $produk1->getPembuat(); ?>
				<br>
				<?= "<span style=text-decoration:line-through;>".$produk1->getHarga()."</span>"; ?>

				<?= $produk1->setDiskon(5); ?>
				<?= $produk1->getDiskon(); ?>%
			</td>
		</tr>	
		<tr>
			<td>
				<?php if (isset($_GET["detail"])): ?>
					<?= $produk1->getInfoProduk(); ?>
				<?php endif ?>
				<button type="button">
					<a href="?detail=#produk1" class="tes">Detail</a>
				</button>
			</td>
		</tr>
	</div>

	<div class="kiri">
		<tr>
			<td>	
				<div class="image2"></div>
			</td>
		</tr>
		<tr>
			<td id="produk2"> 
				<h3><?= $produk2->getJudul(); ?></h3>
				<?= $produk2->getPembuat(); ?>
				<br>
				<?= $produk2->getHarga(); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php if (isset($_GET["detail2"])): ?>
					<?= $produk2->getInfoProduk(); ?>
				<?php endif ?>
				<button type="button">
					<a href="?detail2=#produk2" class="tes">Detail</a>
				</button>	
			</td>
		</tr>
	</div>

	<div class="kiri">	
		<tr>
			<td>
				<div class="image3"></div>
			</td>
		</tr>
		<tr>
			<td id="produk3">
				<h3><?= $produk3->getJudul(); ?></h3>
				<?= $produk3->getPembuat(); ?>
				<br>
				<?= $produk3->getHarga(); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php if (isset($_GET["detail3"])): ?>
					<?= $produk3->getInfoProduk(); ?>
				<?php endif ?>
				<button type="button">
					<a href="?detail3=#produk3" class="tes">Detail</a>
				</button>
			</td>
		</tr>
	</div>
	</table>

</body>
</html>