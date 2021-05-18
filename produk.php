<?php 

	interface infoProduk{
		public function getInfo();
	}

	abstract class Produk{
			protected $judul,
				   $pembuat,
				   $penerbit,
				   $harga,
				   $diskon=0;
			
			public function __construct($judul="judul",$pembuat="pembuat",$penerbit="penerbit",$harga="harga"){
				$this->judul=$judul;
				$this->pembuat=$pembuat;
				$this->penerbit=$penerbit;
				$this->harga=$harga;
			}

			public function setJudul($judul){
				if (!is_string($judul)) {
					throw new Exception("Judul Harus String");
				}
				$this->judul=$judul;
			}

			public function getJudul(){
				return $this->judul;
			}

			public function setPembuat($pembuat){
				if (!is_string($pembuat)) {
					throw new Exception("Pembuat Harus String");
				}
				$this->pembuat=$pembuat;
			}

			public function getPembuat(){
				return $this->pembuat;
			}

			public function setPenerbit($penerbit){
				if (!is_string($penerbit)) {
					throw new Exception("Penerbit Harus String");
				}
				$this->penerbit=$penerbit;
			}

			public function getPenerbit(){
				return $this->penerbit;
			}

			public function setDiskon($diskon){
				if (is_string($diskon)) {
					throw new Exception("Diskon Harus Angka");
				}
				$this->diskon=$diskon;
			}

			public function getDiskon(){
				return $this->diskon."%";
			}

			public function setHarga($harga){
				if (is_string($harga)) {
					throw new Exception("Harga Harus Angka");
				}
				$this->harga=$harga;
			}

			public function getHarga(){
				return "Rp ".$this->harga-($this->harga*$this->diskon/100);
			}
			abstract public function getPembuatPenerbit();
			abstract public function getInfoProduk();
		}

	class buku extends Produk implements infoProduk{
		public $jumlahHalaman;
		public function __construct($judul="judul",$pembuat="pembuat",$penerbit="penerbit",$jumlahHalaman="jumlahhalaman",$harga="harga"){
			parent::__construct($judul,$pembuat,$penerbit,$harga);
			$this->jumlahHalaman=$jumlahHalaman;
		}

		public function getPembuatPenerbit(){
			return "
						<li><b>Pembuat</b> : $this->pembuat</li> 
						<li><b>Penerbit</b> : $this->penerbit</li>
					";
		} 

		public function getInfo(){
			$str="
					<ul>
						<li><b>Judul</b> : $this->judul</li> 
						{$this->getPembuatPenerbit()}
						<li><b>Harga</b> : {$this->getHarga()}</li>
				";
			return $str;
		}

		public function getInfoProduk(){
			$str=" 
					".$this->getInfo()."
					<li><b>Jumlah Halaman</b> : $this->jumlahHalaman</li>
					</ul>
				";
			return $str;
		}
	}

	// class CetakInfoProduk{
	// 	public $daftarProduk=[];
	// 	public function tambahProduk(Produk $produk){
	// 		$daftarProduk[]=$produk;
	// 	}
	// 	public function cetak(){
	// 		$str="DAFTAR PRODUK:<br>";
	// 		foreach ($daftarProduk as $p) {
	// 			$str.=$p->getInfoProduk();
	// 		}
	// 		return $str;
	// 	} 
	// }	 

	$produk1=new buku("JAVA Referensi Lengkap untuk Programmer","RH.Sianipar","ANDI","386 halaman",180000);
	$produk2=new buku("7 IN 1 PEMROGRAMAN WEB UNTUK PEMULA","Rohi Abdulloh","ELEX MEDIA KOMPUTINDO","320 halaman",74800);
	$produk3=new buku("HTML 5 Dasar,CSS,JavaScript","BETHA SIDIK","Penerbit INFORMATIKA","308 halaman",90000);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Produk</title>
	<link rel="stylesheet" type="text/css" href="produk.css">
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
				<?= $produk1->getDiskon(); ?>
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