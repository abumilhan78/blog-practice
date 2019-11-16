<?php
include '../../App/koneksi.php';
$artikel = new Artikel();

$aksi = $_GET['aksi'];
if (isset($_POST['save'])) {
    // $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $tgl_dibuat = date('Y-m-d');
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul"])));
    $id_kategori = $_POST['id_kategori'];
    $id_user = $_POST['id_user'];
    function upload()
    {
        // Upload Foto
        $foto = $_FILES['foto']['name'];
        $sizeFoto = $_FILES['foto']['size'];
        $fotoError = $_FILES['foto']['error'];
        $tmpFoto = $_FILES['foto']['tmp_name'];

        // ekstensi
        $ekstensi = ["jpg", "jpeg", "png"];
        $ekstensiFoto = explode('.', $foto);
        $ekstensiFoto = strtolower(end($ekstensiFoto));

        if ($fotoError === 4) {
            echo "<script>
        alert('Maaf file yang anda masukan terlalu besar!');
        </script>";
            return false;
        }

        if ($sizeFoto > 2400000) {
            echo "<script>
        alert('Maaf file yang anda masukan terlalu besar!');
        </script>";
            return false;
        }
        if (!in_array($ekstensiFoto, $ekstensi)) {
            echo "<script>
        alert('Maaf file yang masukan bukan sebuah foto!');
        </script>";
            return false;
        }
        // mengubah nama foto
        $namaFoto = uniqid();
        $namaFoto .= ".";
        $namaFoto .= $ekstensiFoto;
        move_uploaded_file($tmpFoto, 'img/' . $namaFoto);
        return $namaFoto;
    }
    $foto = upload();
}

if ($aksi == "create") {
    $artikel->create($judul, $konten, $foto, $tgl_dibuat, $slug, $id_kategori, $id_user);
    header("location:index.php");
} elseif ($aksi == "update") {
    $artikel->update($id, $judul, $konten, $foto, $tgl_dibuat, $slug, $id_kategori, $id_user);
    header("location:index.php");
} elseif ($aksi == "delete") {
    $artikel->delete($_GET['id']);
    header("location:index.php");
}
