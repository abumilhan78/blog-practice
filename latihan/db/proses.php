<?php 
include 'database.php';
$siswa = new Siswa();

// public function upload()
// {
//     $namafile = $_FILES['gbr']['name'];
//     $ukuranfile = $_FILES['gbr']['size'];
//     $error = $_FILES['gbr']['error'];
//     $tmp = $_FILES['gbr']['tmp_name'];

//     //cek apakah yang diupload adalah gambar
//     $extgbrvalid = ['jpg','jpeg','png'];
//     $extgbr = explode('.', $namafile);
//     $extgbr  = strtolower(end($extgbr));

//     move_uploaded_file($tmp, '../' . $namafile);

//     return $namafile;
// }

$aksi = $_GET['aksi'];
if(isset($_POST['save']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $jml = $_POST['jml'];
    $hrg = $_POST['hrg'];
    $sub = $jml*$hrg;
    $gbrlm = $_POST['gbrlm'];
    


     // upload gambar
   
     function upload(){

        $namafile = $_FILES['gbr']['name'];
        $ukuranfile = $_FILES['gbr']['size'];
        $error = $_FILES['gbr']['error'];
        $tmp = $_FILES['gbr']['tmp_name'];
        // cek apakah tidak ada gambar yang di upload
        // if ($error === 4) {
        //     echo "<script>
        //         alert('pilih gambar terlebih dahulu');
        //     </script>";
        //     return false;
        // }

        // cek apakah yang di upload adalah gambar
        $extgbrvalid = ['jpg','jpeg','png'];
        $extgbr = explode('.', $namafile);
        $extgbr = strtolower(end($extgbr));

        //generate nama baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $extgbr;
        move_uploaded_file($tmp, '../'.$namafilebaru);
        return $namafilebaru;
     }
     
     $gambar = upload();
}

if($aksi == "tambah")
{
    $siswa->create($nama, $gambar, $kategori, $jml, $hrg, $sub);
    header("location:../index.php");
    
}elseif($aksi == "update")
{
    if ( $_FILES['gbr']['error'] === 4) {
        $gambar = $gbrlm;
     }else{
        $gambar = upload();
    }
    $siswa->update($id, $nama, $gambar, $kategori, $jml, $hrg, $sub);
    header("location:../index.php");
}elseif($aksi == "delete")
{
    $siswa->delete($_GET['id']);
    header("location:../index.php");
}
?>