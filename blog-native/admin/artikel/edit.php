<?php
session_start();
if (!$_SESSION['login']) {
    header("location:../login.php");
} else {
    include '../../App/koneksi.php';
    $user = new Database();
    $user = mysqli_query($user->koneksi, "select * from users where password='$_SESSION[login]'");
    $user = mysqli_fetch_array($user);

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bootstrap Dashboard by Bootstrapious.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="/assets/template/admin/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="/assets/template/admin/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Fontastic Custom icon font-->
        <link rel="stylesheet" href="/assets/template/admin/css/fontastic.css">
        <!-- Google fonts - Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <!-- jQuery Circle-->
        <link rel="stylesheet" href="/assets/template/admin/css/grasp_mobile_progress_circle-1.0.0.min.css">
        <!-- Custom Scrollbar-->
        <link rel="stylesheet" href="/assets/template/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="/assets/template/admin/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="/assets/template/admin/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="/assets/template/admin/img/favicon.ico">
        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <!-- DataTable -->
        <link rel="stylesheet" href="/assets/DataTables/datatables.min.css">
    </head>

    <body>
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <div class="side-navbar-wrapper">
                <!-- Sidebar Header    -->
                <div class="sidenav-header d-flex align-items-center justify-content-center">
                    <!-- User Info-->
                    <div class="sidenav-header-inner text-center"><img src="/assets/template/admin/img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
                        <h2 class="h5"><?php echo $user['nama']; ?></h2><span><?php echo $user['email']; ?></span>
                    </div>
                    <!-- Small Brand information, appears on minimized sidebar-->
                    <div class="sidenav-header-logo"><a href="/admin" class="brand-small text-center">
                            <strong>B</strong><strong class="text-primary">D</strong></a></div>
                </div>
                <!-- Sidebar Navigation Menus-->
                <div class="main-menu">
                    <h5 class="sidenav-heading">Main</h5>
                    <ul id="side-main-menu" class="side-menu list-unstyled">
                        <li><a href="/admin"> <i class="icon-home"></i>Home </a></li>
                        <li><a href="/admin/kategori"> <i class="icon-form"></i>Kategori </a></li>
                        <li><a href="/admin/artikel"> <i class="fa fa-bar-chart"></i>Artikel </a></li>
                    </ul>
                </div>
                <div class="admin-menu">
                    <h5 class="sidenav-heading">Second menu</h5>
                </div>
            </div>
        </nav>
        <div class="page">
            <!-- navbar-->
            <header class="header">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars">
                                    </i></a><a href="/admin" class="navbar-brand">
                                    <div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div>
                                </a></div>
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                <!-- Notifications dropdown-->
                                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                                    <ul aria-labelledby="notifications" class="dropdown-menu">
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification d-flex justify-content-between">
                                                    <div class="notification-content"><i class="fa fa-envelope"></i>You have
                                                        6 new messages </div>
                                                    <div class="notification-time"><small>4 minutes ago</small></div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification d-flex justify-content-between">
                                                    <div class="notification-content"><i class="fa fa-twitter"></i>You have
                                                        2 followers</div>
                                                    <div class="notification-time"><small>4 minutes ago</small></div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification d-flex justify-content-between">
                                                    <div class="notification-content"><i class="fa fa-upload"></i>Server
                                                        Rebooted</div>
                                                    <div class="notification-time"><small>4 minutes ago</small></div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification d-flex justify-content-between">
                                                    <div class="notification-content"><i class="fa fa-twitter"></i>You have
                                                        2 followers</div>
                                                    <div class="notification-time"><small>10 minutes ago</small></div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">
                                                <strong> <i class="fa fa-bell"></i>view all notifications </strong></a></li>
                                    </ul>
                                </li>
                                <!-- Messages dropdown-->
                                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                                    <ul aria-labelledby="notifications" class="dropdown-menu">
                                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-profile"> <img src="/assets/template/admin/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                                <div class="msg-body">
                                                    <h3 class="h5">Jason Doe</h3><span>sent you a direct
                                                        message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-profile"> <img src="/assets/template/admin/img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                                <div class="msg-body">
                                                    <h3 class="h5">Frank Williams</h3><span>sent you a direct
                                                        message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-profile"> <img src="/assets/template/admin/img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                                <div class="msg-body">
                                                    <h3 class="h5">Ashley Wood</h3><span>sent you a direct
                                                        message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">
                                                <strong> <i class="fa fa-envelope"></i>Read all messages </strong></a></li>
                                    </ul>
                                </li>
                                <!-- Languages dropdown    -->
                                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="/assets/template/admin/img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                                    <ul aria-labelledby="languages" class="dropdown-menu">
                                        <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="/assets/template/admin/img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="/assets/template/admin/img/flags/16/FR.png" alt="English" class="mr-2"><span>French </span></a></li>
                                    </ul>
                                </li>
                                <!-- Log out-->
                                <li class="nav-item"><a href="../logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- End Nav -->

            <!-- breadcumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                </ol>
            </nav>
            <!-- end breadcumb -->

            <!-- Content -->
            <div class="container" style="padding-top:20px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Tambah Artikel
                            </div>
                            <div class="card-body">
                                <?php
                                    $artikel = new Artikel();
                                    foreach ($artikel->edit($_GET['id']) as $data) {
                                        $id = $data['id'];
                                        $judul = $data['judul'];
                                        $konten = $data['konten'];
                                        $foto = $data['foto'];
                                    }
                                    // var_dump($artikel);                                    
                                    ?>
                                <form action="/admin/artikel/proses.php?aksi=update" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Konten</label>
                                        <textarea type="text" class="form-control" rows="5" name="konten" required><?php echo $data['konten']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto Artikel</label><br>
                                        <?php
                                            if (isset($data['foto'])) { ?>
                                            <img src="img/<?php echo $data['foto']; ?>" alt="" style="width:200px; height:100px;">
                                        <?php }
                                            ?>
                                        <input type="file" name="foto" class="form-control" value="<?php echo $data['foto']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori Artikel</label>
                                        <select name="id_kategori" id="" class="form-control">
                                            <?php
                                                $artikel = new Artikel();
                                                foreach ($artikel->get_kategori() as $kategori) {
                                                    ?>
                                                <option value="<?php echo $kategori['id'] ?>" <?php if ($kategori['id'] == $data['id_kategori']) echo "selected" ?>><?php echo $kategori['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id_user" value="<?php echo $user['id'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                        <button type="submit" name="save" class="btn btn-primary btn-block">Simpan Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

            <footer class="main-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p> &copy; SMK ASSALAAM 2019</p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
                            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- JavaScript files-->
        <script src="/assets/template/admin/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/template/admin/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="/assets/template/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/template/admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
        <script src="/assets/template/admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="/assets/template/admin/vendor/chart.js/Chart.min.js"></script>
        <script src="/assets/template/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="/assets/template/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js">
        </script>
        <script src="/assets/template/admin/js/charts-home.js"></script>
        <!-- Main File-->
        <script src="/assets/template/admin/js/front.js"></script>
        <!-- DataTable -->
        <script src="/assets/DataTables/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>
    </body>

    </html>
<?php }  ?>