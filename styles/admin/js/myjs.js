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
        var table_detail = $('#dataTables-detail').DataTable({
                    responsive: true
                });
        $('#ajax_table').on( 'click', '#dataTables-detail tbody tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table_detail.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
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
                    $('#selCatalog').html($('<option>', {value:0, text:'Danh Mục Cha'}));
                    $("#selLevel").prop('disabled', false);
                    break;
                case 'blog_catalog':
                    $('#selCatalog').html($('<option>', {value:0, text:'Danh Mục Cha'}));
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
                            case 'blog_catalog':
                                $('#selCatalog').html(json.data_catalog);
                                $('#txtName').val(json.data.name);
                                $('#selLevel').val(json.data.level);
                                $('#selCatalog').val(json.data.parent_id);
                                $("#selLevel").prop('disabled', true);
                                break;
                            case 'tag':
                                $('#selLevel').val(json.selected);
                                $('#txtName').val(json.data.name);
                                $('#ajax_table').find('#detail-news').html(json.data_tag);
                                table_detail = $('#dataTables-detail').DataTable({
                                        responsive: true
                                    });
                                break;
                        }
                    },
                    error : function(xhr, status,error){
                        alert('Lỗi:Không thể hiện thông tin sửa chữa');
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
                            table_detail = $('#dataTables-detail').DataTable({
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
                           alert('Lỗi:Xóa dòng không thành công');
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
                        table_detail = $('#dataTables-detail').DataTable({
                                responsive: true
                            });
                    },
                    error : function(xhr, status,error){
                        alert('Lỗi:Không thể hiện thông tin giao dịch');
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
                    if($('#detail-news').length)
                    {
                        $('#detail-news').html(json.data);
                        table_detail = $('#dataTables-detail').DataTable({
                                responsive: true
                            });
                    }
                    else $('#selCatalog').html(json.data);
                },
                error : function(xhr, status,error){
                    alert('Lỗi:Data');
                }
            });
        });
        $('#ajax_table').on('submit','#form',function(e){
            e.preventDefault();
            if($("#selLevel").length)
            {
                $("#selLevel").prop('disabled', false);
            }
            var dataform = new FormData(this);
            dataform.append('c',window.location.search.split('=')[1]);
            switch(window.location.search.split('=')[1]) {
                case 'tag':
                    news_id = $.map(table_detail.rows('.selected').data(), function (item) {
                        return item[0]
                    });
                    dataform.append('news_id',news_id);
                    break;
            }
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
                    table_detail = $('#dataTables-detail').DataTable({
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
                    alert('Lỗi: Không cập nhập được dữ liệu');
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
                        table_detail = $('#dataTables-detail').DataTable({
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
                        alert('Lỗi: Không cập nhập được dữ liệu');
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
                    selCatalog:"Xin chọn loại",

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