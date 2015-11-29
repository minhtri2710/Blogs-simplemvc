<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="./styles/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./styles/admin/css/metisMenu.min.css" rel="stylesheet">


    <!-- DataTables CSS -->
    <link href="./styles/admin/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="./styles/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="./styles/admin/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./styles/admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./styles/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php"><?php echo $title; ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo isset($_SESSION['name'])?$_SESSION['name']:''; ?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php"><i class="fa fa-home fa-fw"></i>Trang Chủ</a></li>
                        <li><a href="index.php?c=logout"><i class="fa fa-sign-out fa-fw"></i>Đăng Xuất</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li> -->
                        <li>
                            <a href="admin.php?c=catalog"><i class="fa fa-table fa-fw"></i>Danh Mục</a>
                        </li>
                        <li>
                            <a href="admin.php?c=product"><i class="fa fa-table fa-fw"></i>Sản Phẩm</a>
                        </li>
                        <li>
                            <a href="admin.php?c=blog_catalog"><i class="fa fa-table fa-fw"></i>Danh Mục Bài Viết</a>
                        </li>
                        <li>
                            <a href="admin.php?c=news"><i class="fa fa-table fa-fw"></i>Bài Viết</a>
                        </li>
                        <li>
                            <a href="admin.php?c=user"><i class="fa fa-table fa-fw"></i>Tài Khoản</a>
                        </li>
                        <li>
                            <a href="admin.php?c=transaction"><i class="fa fa-table fa-fw"></i>Giao Dịch</a>
                        </li>
                        <li>
                            <a href="admin.php?c=tag"><i class="fa fa-table fa-fw"></i>Thẻ</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id='ajax_table'>
            <?php include ROOT . DS . 'views' . DS . $template_file; ?>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./styles/admin/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./styles/admin/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./styles/admin/js/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="./styles/admin/js/jquery.dataTables.min.js"></script>
    <script src="./styles/admin/js/dataTables.bootstrap.min.js"></script>
    <script src="./styles/admin/js/dataTables.responsive.min.js"></script>
    <!-- Validate -->
    <script src="./styles/admin/js/jquery.validate.min.js"></script>
    <script src="./styles/admin/js/additional-methods.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="./styles/admin/js/sb-admin-2.js"></script>
    <!-- CKEditor -->
    <script src="./plugins/ckeditor/ckeditor.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script src="./styles/admin/js/myjs.js"></script>
</body>

</html>
