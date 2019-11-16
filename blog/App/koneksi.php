<?php
	class Database{
		public $host = 'localhost',
					$user = 'root',
					$pass = 123,
					$db = 'blog';
		public $koneksi;
		public function __construct(){
			$this->koneksi = mysqli_connect(
				$this->host,
				$this->user,
				$this->pass,
				$this->db
			);

			if ($this->koneksi) {
				
			}else{
				echo "Koneksi Gagal";
			}
		}
	}

	$db = new Database();
 ?>