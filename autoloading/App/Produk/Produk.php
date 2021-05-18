<?php 
	abstract class Produk{
			public function __construct(
					protected $judul="judul",
					protected $pembuat="pembuat",
					protected $penerbit="penerbit",
					protected $harga=0,
					protected $diskon=0,
				){
			}

			public function setJudul($judul){
				$this->judul=$judul;
			}

			public function getJudul(){
				return $this->judul;
			}

			public function setPembuat($pembuat){
				$this->pembuat=$pembuat;
			}

			public function getPembuat(){
				return $this->pembuat;
			}

			public function setPenerbit($penerbit){
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
				return $this->diskon;
			}

			public function setHarga($harga){
				if (is_string($harga)) {
					throw new Exception("Harga Harus Angka");
				}
				$this->harga=$harga;
			}

			public function getHarga(){
				return $this->harga-($this->harga*$this->diskon/100);
			}
			abstract public function getPembuatPenerbit();
			abstract public function getInfoProduk();
		}