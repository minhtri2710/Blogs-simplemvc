        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" id='insert' data-toggle="modal" data-target="#myModal" class="btn btn-default">Thêm</button>
                    <button type="button" id='edit'  class="btn btn-default">Sửa</button>
                    <button type="button" id='delete'  class="btn btn-default">Xóa</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông Tin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped responsive table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Giới Thiệu</th>
                                            <th>Loại</th>
                                            <th>Giá</th>
                                            <th>Giảm Giá</th>
                                            <th>Hình Ảnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value):
                                        ?>
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['content']; ?></td>
                                                <td><?php echo $value['catalog']; ?></td>
                                                <td><?php echo $value['price']; ?></td>
                                                <td><?php echo $value['discount']; ?></td>
                                                <td align="center"><img width="70px" height="70px" src="products-images/<?php echo $value['image_link']; ?>" alt=""></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form id='form' class="form-horizontal" enctype="multipart/form-data" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="txtName">Tên Sản Phẩm</label>
                            <div class="col-sm-9 col-md-10">
                                <input type="text" name='txtName' class="form-control" id="txtName" placeholder="Tên Sản Phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="txtPrice">Giá</label>
                            <div class="col-sm-9 col-md-10">
                                <input type="text" name='txtPrice' class="form-control" id="txtPrice" placeholder="Giá VNĐ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="txtDiscount">Giảm Giá</label>
                            <div class="col-sm-9 col-md-10">
                                <input type="text" name='txtDiscount' class="form-control" id="txtDiscount" placeholder="Giá VNĐ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='control-label col-sm-3 col-md-2' for='selCatalog'>Loại Hàng</label>
                            <div class="col-sm-9 col-md-10">
                                <select class="form-control" name='selCatalog' id="selCatalog">
                                   <?php foreach ($catalog as $key => $value): ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                   <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="fLink">Ảnh Sản Phẩm</label>
                            <div class="col-sm-9 col-md-10">
                                <input name='fLink' accept=".jpg,.jpeg,.png" type="file" id="fLink">
                                <p class="help-block">File .JPG,.PNG</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="fList">Ảnh Liên Quan</label>
                            <div class="col-sm-9 col-md-10">
                                <input name='fList[]' accept=".jpg,.jpeg,.png"  type="file" multiple id="fList">
                                <p class="help-block">File .JPG,.PNG</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="txtContent">Giới Thiệu</label>
                            <div class="col-sm-9 col-md-10">
                                <textarea class="form-control" name='editor' id="editor"></textarea>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-5">
                                <button type="submit" name='submit' class="btn btn-default">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
        </div>