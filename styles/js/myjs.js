$(document).ready(function() {
      $.validator.addMethod("onechar", function(value, element) {
        return this.optional( element ) || /(?!^[0-9]*$)^([a-zA-Z0-9_aáàảãạăắằẳẵặâấầẩẫậeéèẻẽẹêếềểễệiíìỉĩịoóòỏõọôốồổỗộơớờởỡợuúùủũụưứừửữựyýỳỷỹỵdđAÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬEÉÈẺẼẸÊẾỀỂỄỆIÍÌỈĨỊOÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢUÚÙỦŨỤƯỨỪỬỮỰYÝỲỶỸỴDĐ\s\.\/\,]+)$/.test( value );
      }, 'Có ít nhất một ký tự chữ cái');

      $('#ajax_table').on('submit','#form-add',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
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
                  $(document).find('.mini-cart').html(json.data_mini);
                  switch(window.location.search.split('=')[1]) {
                      case 'cart':
                          $('#ajax_table').html(json.data);
                          $('#form-info-transaction').info_transaction();
                          break;
                  }
                  alert('Thêm Giỏ Hàng Thành Công');
                },
                error : function(xhr, status,error){
                   alert('Thêm Giỏ Hàng Thất Bại');
                }
            });
        });
        $('#ajax_table').on('submit','#product_addtocart_form',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            dataform.append('c','cart');
            dataform.append('m','add');
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
                  $(document).find('.mini-cart').html(json.data_mini);
                  switch(window.location.search.split('=')[1]) {
                      case 'cart':
                          $('#ajax_table').html(json.data);
                          $('#form-info-transaction').info_transaction();
                          break;
                  }
                  alert('Thêm Giỏ Hàng Thành Công');
                },
                error : function(xhr, status,error){
                     alert('Thêm Giỏ Hàng Thất Bại');
                }
            });
        });
        $(document).on('submit','#form-del',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            if(confirm('Bạn có muốn xóa')){
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
                    $(document).find('.mini-cart').html(json.data_mini);
                    switch(window.location.search.split('=')[1]) {
                        case 'cart':
                            $('#ajax_table').html(json.data);
                            $('#form-info-transaction').info_transaction();
                            break;
                    }
                    alert('Xóa Giỏ Hàng Thành Công');
                  },
                  error : function(xhr, status,error){
                       alert('Xóa Giỏ Hàng Thất Bại');
                  }
              });
            }
        });
        $('#ajax_table').on('submit','#form-update',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            dataform.append('c','cart');
            dataform.append('m','update');
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
                  $(document).find('.mini-cart').html(json.data_mini);
                  switch(window.location.search.split('=')[1]) {
                      case 'cart':
                          $('#ajax_table').html(json.data);
                          $('#form-info-transaction').info_transaction();
                          break;
                  }
                  alert('Cập Nhập Giỏ Hàng Thành Công');
                },
                error : function(xhr, status,error){
                    alert('Cập Nhập Giỏ Hàng Thất Bại');
                }
            });
        });
        $('#ajax_table').on('submit','#form-info-transaction',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            dataform.append('c','cart');
            dataform.append('m','add_order')
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:dataform,
                dataType:'text',
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success:function(){
                  window.location.href='index.php';
                  alert('Đặt Hàng Thành Công');
                },
                error : function(xhr, status,error){
                    alert('Đặt Hàng Thất Bại');
                }
            });
        });
        $('#ajax_table').on('click','#empty_cart_button',function(e){
            var dataform = new FormData();
            dataform.append('c','cart');
            dataform.append('m','delete_all');
            if(confirm('Bạn có muốn xóa')){
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
                    $(document).find('.mini-cart').html(json.data_mini);
                    switch(window.location.search.split('=')[1]) {
                        case 'cart':
                            $('#ajax_table').html(json.data);
                            break;
                    }
                    alert('Xóa Giỏ Hàng Thành Công');
                  },
                  error : function(xhr, status,error){
                      alert('Xóa Giỏ Hàng Thất Bại');
                  }
              });
            }
        });
        $('#ajax_table').on('click','#del',function(e){
            var dataform = new FormData();
            dataform.append('c','cart');
            dataform.append('m','delete');
            dataform.append('id',$(this).data('key'));
            if(confirm('Bạn có muốn xóa')){
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
                    $(document).find('.mini-cart').html(json.data_mini);
                    switch(window.location.search.split('=')[1]) {
                        case 'cart':
                            $('#ajax_table').html(json.data);
                            $('#form-info-transaction').info_transaction();
                            break;
                    }
                    alert('Xóa Giỏ Hàng Thành Công');
                  },
                  error : function(xhr, status,error){
                      alert('Xóa Giỏ Hàng Thất Bại');
                  }
              });
            }
        });
      $(document).find('#form-login').validate({
          rules: {
              user: {
                  required: true,
                  minlength: 4,
                  onechar:true,
              },
              pass: {
                  required: true,
                  minlength: 6,
              },
          },
          messages: {
              user: {
                  required: "Xin hãy user",
                  minlength: "User ít nhất có 4 ký tự"
              },
              pass: {
                  required: "Xin hãy pass",
                  minlength: "Password ít nhất có 6 ký tự"
              },
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
      $.fn.info_transaction=function(){
        $(this).validate({
          rules: {
              txtName: {
                  required: true,
                  minlength: 4,
                  onechar:true,
              },
              txtPhone: {
                  required: true,
                  minlength: 9,
                  maxlength: 11,
              },
              txtEmail: {
                  required: true,
                  email:true,
              },
              txtAddress: {
                  required: true,
                  minlength: 20,
                  onechar:true,
              },
          },
          messages: {
              txtName: {
                  required: 'Xin Nhập Họ Tên',
                  minlength: 'Có Ít Nhất 4 Ký Tự',
                  onechar:'Có Ít Nhất 1 Ký Tự Chữ Cái',
              },
              txtPhone: {
                  required: 'Xin Nhập Điện Thoại',
                  minlength: 'Số Giới Hạn Từ 9-11',
                  maxlength: 'Số Giới Hạn Từ 9-11',
              },
              txtEmail: {
                  required: 'Xin Nhập Email',
                  email:'Email Sai',
              },
              txtAddress: {
                  required: 'Xin Nhập Địa Chỉ',
                  minlength: 'Có Ít Nhất 20 Ký Tự',
                  onechar:'Có Ít Nhất 1 Ký Tự Chữ Cái',
              },
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
      $('#form-info-transaction').info_transaction();
       $(window).resize(function() {
          if($('.img_news').length)
            $('.img_news').attr('height',$('.img_news').css('width').replace(/[^-\d\.]/g, '')*0.66);
          if($('.item-img-info').length)
            $('.item-img-info a.product-image img').attr('height',$('.item-img-info').css('width').replace(/[^-\d\.]/g, '')*1.22);
        });
       $.fn.img_resize=function(){
          if($('.img_news').length)
            $('.img_news').attr('height',$('.img_news').css('width').replace(/[^-\d\.]/g, '')*0.66);
          if($('.item-img-info').length)
            $('.item-img-info a.product-image img').attr('height',$('.item-img-info').css('width').replace(/[^-\d\.]/g, '')*1.22);
        };
        $('#ajax_table').img_resize();
  });