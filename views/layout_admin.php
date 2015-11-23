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
                            <a href="admin.php?c=user"><i class="fa fa-table fa-fw"></i>Tài Khoản</a>
                        </li>
                        <li>
                            <a href="admin.php?c=news"><i class="fa fa-table fa-fw"></i>Bài Viết</a>
                        </li>
                        <li>
                            <a href="admin.php?c=transaction"><i class="fa fa-table fa-fw"></i>Giao Dịch</a>
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
    <script src="../plugins/ckeditor/ckeditor.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>
    $(document).ready(function() {
        var bool=0;
        var ids;

        if($('#editor').length)
        {
            CKEDITOR.replace( 'editor' );
        }
        if($('#editor-des').length)
        {
            CKEDITOR.replace( 'editor-des' );
        }
        var table = $('#dataTables-example').DataTable({
                        responsive: true
                    });
        $('#ajax_table').on( 'click', '#dataTables-example tbody tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );



        $('#ajax_table').on('click','#insert',function(){
            $('#form')[0].reset();
            $('#ajax_table').find('.modal-title').html('Thêm');
            $('#ajax_table').find('.has-error').removeClass('has-error');
            bool=0;
            switch(window.location.search.split('=')[1]) {
                case 'catalog':
                    $('#selCatalog').html('');
                    $('#selCatalog').append($('<option>', {value:0, text:'Danh Mục Cha'}));
                    $("#selLevel").prop('disabled', false);
                    break;
            }
        });
        $('#ajax_table').on('click','#edit',function(){
            ids = $.map(table.rows('.selected').data(), function (item) {
                return item[0]
            });
            if(ids!=''){
                bool=1;
                $('#ajax_table').find('.has-error').removeClass('has-error');
                $('#ajax_table').find('.modal-title').html('Cập nhập');
                $('#ajax_table').find('#myModal').modal('show');
                $.ajax({
                    url:window.location.origin+window.location.pathname,
                    type:'post',
                    data:{id:String(ids),
                        c:window.location.search.split('=')[1],
                        m:'select',
                        },
                    dataType:"json",
                    success:function(json){
                        switch(window.location.search.split('=')[1]) {
                            case 'product':
                                $('#txtName').val(json.data.name);
                                $('#txtPrice').val(json.data.price);
                                $('#txtDiscount').val(json.data.discount);
                                $('#selCatalog').val(json.data.catalog_id);
                                CKEDITOR.instances['editor'].setData(json.data.content);
                                break;
                            case 'news':
                                $('#txtName').val(json.data.title);
                                CKEDITOR.instances['editor-des'].setData(json.data.description);
                                CKEDITOR.instances['editor'].setData(json.data.content);
                                break;
                            case 'user':
                                $('#txtName').val(json.data.name);
                                $('#txtUser').val(json.data.username);
                                $('#txtPass').val(json.data.password);
                                $('#txtPass2').val(json.data.password);
                                break;
                            case 'catalog':
                                $('#selCatalog').html(json.data_catalog);
                                $('#txtName').val(json.data.name);
                                $('#selLevel').val(json.data.level);
                                $('#selCatalog').val(json.data.parent_id);
                                $("#selLevel").prop('disabled', true);
                                break;
                        }
                    },
                    error : function(xhr, status,error){
                        console.log("Loi " + error + " thi mot fix sau");
                    }
                });
            }
        });
        $('#ajax_table').on('click','#delete',function(){
            ids = $.map(table.rows('.selected').data(), function (item) {
                return item[0]
            });
            if(ids!=''){
                if(confirm('Bạn có muốn xóa')){
                    $.ajax({
                        url:window.location.origin+window.location.pathname,
                        type:'post',
                        data:{id:String(ids),
                            c:window.location.search.split('=')[1],
                            m:'delete',
                            },
                        dataType:"json",
                        success:function(json){
                            $('#ajax_table').html(json.data);
                            table = $('#dataTables-example').DataTable({
                                responsive: true
                            });
                            if($('#editor').length)
                            {
                                CKEDITOR.replace( 'editor' );
                            }
                            if($('#editor-des').length)
                            {
                                CKEDITOR.replace( 'editor-des' );
                            }
                            $('#ajax_table').find('#form').set_validate();
                        },
                        error : function(xhr, status,error){
                            console.log("Loi " + error + " thi mot fix sau");
                        }
                    });
               }
               else return false;
           }
        });
        $('#ajax_table').on('click','#tran_detail',function(){
            ids = $.map(table.rows('.selected').data(), function (item) {
                return item[0]
            });
            if(ids!=''){
                $('#ajax_table').find('#myModal').modal('show');
                $.ajax({
                    url:window.location.origin+window.location.pathname,
                    type:'post',
                    data:{id:String(ids),
                        c:window.location.search.split('=')[1],
                        m:'select',
                        },
                    dataType:"json",
                    success:function(json){
                        $('#ajax_table').find('#detail-trans').html(json.data);
                        $('#dataTables-detail').DataTable({
                                responsive: true
                            });
                    },
                    error : function(xhr, status,error){
                        console.log("Loi " + error + " thi mot fix sau");
                    }
                });
            }
        });
        $('#ajax_table').on('change','#selLevel',function(){
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:{id:$(this).val(),
                    c:window.location.search.split('=')[1],
                    m:'select_level',
                    },
                dataType:"json",
                success:function(json){
                    $('#selCatalog').html(json.data);
                },
                error : function(xhr, status,error){
                    console.log("Loi " + error + " thi mot fix sau");
                }
            });
        });
        $('#ajax_table').on('submit','#form',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            dataform.append('c',window.location.search.split('=')[1]);
            if(bool==0)
                dataform.append('m','insert');
            else{
                dataform.append('m','update');
                dataform.append('id',String(ids));
            }
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:dataform,
                dataType:'json',
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success:function(json){
                    $('#ajax_table').html(json.data);
                    table = $('#dataTables-example').DataTable({
                        responsive: true
                    });
                    if($('#editor').length)
                    {
                        CKEDITOR.replace( 'editor' );
                    }
                    if($('#editor-des').length)
                    {
                        CKEDITOR.replace( 'editor-des' );
                    }
                    $('#ajax_table').find('#form').set_validate();
                    $('body').css('padding-right','');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                },
                error : function(xhr, status,error){
                    console.log("Loi " + error + " thi mot fix sau");
                }
            });
        });
        $('#ajax_table').on('click','#update',function(e){
            ids = $.map(table.rows('.selected').data(), function (item) {
                return item[0]
            });
            if(ids!=''){
                var dataform = new FormData(this);
                dataform.append('c',window.location.search.split('=')[1]);
                dataform.append('m','update');
                dataform.append('id',String(ids));
                $.ajax({
                    url:window.location.origin+window.location.pathname,
                    type:'post',
                    data:dataform,
                    dataType:'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    enctype: "multipart/form-data",
                    success:function(json){
                        $('#ajax_table').html(json.data);
                        table = $('#dataTables-example').DataTable({
                            responsive: true
                        });
                        if($('#editor').length)
                        {
                            CKEDITOR.replace( 'editor' );
                        }
                        if($('#editor-des').length)
                        {
                            CKEDITOR.replace( 'editor-des' );
                        }
                        $('#ajax_table').find('#form').set_validate();
                        $('body').css('padding-right','');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    },
                    error : function(xhr, status,error){
                        console.log("Loi " + error + " thi mot fix sau");
                    }
                });
            }
        });
        $.fn.set_validate = function() {
            this.validate({
                rules: {
                    txtName: {
                        required: true,
                        minlength: 2,
                        string:true
                    },
                    txtUser: {
                        required: true,
                        minlength: 4,
                        string:true
                    },
                    txtPrice: {
                        required: true,
                        number:true,
                    },
                    fLink: {
                        extension: "png|jpe?g",
                    },
                    fList: {
                        extension: "png|jpe?g",
                    },
                    selCatalog: {
                        required: true,
                    },
                    txtPass: {
                        required: true,
                        minlength: 6,
                    },
                    txtPass2: {
                        equalTo:'#txtPass',
                    },
                },
                messages: {
                    txtName: {
                        required: "Xin hãy tên",
                        minlength: "Tên ít nhất có 2 ký tự"
                    },
                    txtUser: {
                        required: "Xin hãy User",
                        minlength: "User ít nhất có 4 ký tự"
                    },
                    txtPrice: {
                        required: "Xin hãy giá",
                        number:"Xin chỉ nhập số"
                    },
                    txtPass: {
                        required: "Xin hãy Password",
                        minlength: "Password ít nhất có 6 ký tự"
                    },
                    txtPass2: {
                        equalTo:'Password không trùng khớp'
                    },
                    fLink: "Chọn sai loại tệp",
                    fList: "Chọn sai loại tệp",
                    selCatalog:"Xin chọn loại sản phẩm",

                },
                showErrors: function (errorMap, errorList) {
                    $.each(this.successList, function (index, value) {
                        $('#'+value.id+'').parent().removeClass("has-error");
                        $('#'+value.id+'').popover('destroy');
                    });
                    $.each(this.errorList, function (index, value) {
                        $('#'+value.element.id+'').parent().addClass("has-error");
                        $('#'+value.element.id+'').popover('destroy');
                        $('#'+value.element.id+'').popover({
                            content:value.message,
                            template:'<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',
                            placement: 'top',
                            trigger: 'manual',
                        }).popover('show');
                        setTimeout(function(){ $('#'+value.element.id+'').popover('hide'); },2000);
                    });
                }
            });
        };
        $.validator.addMethod("string", function(value, element) {
            return this.optional( element ) || /(?!^[0-9]*$)^([a-zA-Z0-9_aáàảãạăắằẳẵặâấầẩẫậeéèẻẽẹêếềểễệiíìỉĩịoóòỏõọôốồổỗộơớờởỡợuúùủũụưứừửữựyýỳỷỹỵdđAÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬEÉÈẺẼẸÊẾỀỂỄỆIÍÌỈĨỊOÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢUÚÙỦŨỤƯỨỪỬỮỰYÝỲỶỸỴDĐ\s\.\/\,]+)$/.test( value );
        }, 'Có ít nhất một ký tự chữ cái');
        $('#ajax_table').find('#form').set_validate();
    });
    </script>

</body>

</html>
