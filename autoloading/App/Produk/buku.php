<?php 	
	class buku extends Produk implements infoProduk{
		public int|string $jumlahHalaman;
		public function __construct($judul="judul",$pembuat="pembuat",$penerbit="penerbit",int|string $jumlahHalaman=0,int|float $harga=0){
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