<?php 
class Database {
    // $host = untuk memberitau kita menggunakan server lokal yaitu localhost,
    // $user = username dari localhost
    // $pass = password untuk masuk ke localhost mysql kita, kosongkan jika tidak menggunakan password
    // $db = untuk memberi akses kita menggunakan database mana di server lokal kita (localhost)
    public $host = "localhost", $user = "root", $pass = 123, $db="latihan";
    public $koneksi;
    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        
        if($this->koneksi)
        {
            // echo "berhasil";
        } else {
            echo "Koneksi Database Gagal";
        }
    }
}
class Siswa extends Database {
    // Menampilkan Semua Data
    public function index()
    {
        
        $datasiswa = mysqli_query($this->koneksi,"select * from commerce");
        // var_dump($datasiswa);
        return $datasiswa;
    }

    // Menambah Data
    public function create($nama, $gambar, $kategori, $jml, $hrg, $sub)
    {
         mysqli_query($this->koneksi,"INSERT INTO `commerce`(`nm_produk`, `gambar`, `kategori`, `jml_produk`, `hrg_produk`, `sub_total`) VALUES ('$nama', '$gambar', '$kategori', $jml, $hrg, $sub)");
        
    }
    // Menampilkan Data Berdasarkan ID
    public function show($id)
    {
        $datasiswa = mysqli_query($this->koneksi,"select * from commerce where id='$id'");
        return $datasiswa;
    }

    // Menampilkan data berdasarkan id
    public function edit($id)
    {
        $datasiswa = mysqli_query($this->koneksi,"select * from commerce where id='$id'");
        return $datasiswa;
    }

    // mengupdate data berdasarkan id
    public function update($id, $nama, $gambar, $kategori, $jml, $hrg, $sub)
    {
        mysqli_query($this->koneksi,"UPDATE `commerce` SET `nm_produk`='$nama', `gambar`='$gambar',`kategori`='$kategori',`jml_produk`='$jml',`hrg_produk`='$hrg',`sub_total`='$sub' WHERE `id`='$id'");
    }

    // menghapus data berdasarkan id
    public function delete($id)
    {
        mysqli_query($this->koneksi,"delete from commerce where id='$id'");
    }
}
// koneksi DB
$db = new Siswa();

?>