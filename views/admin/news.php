        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bài Viết</h1>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu Đề</th>
                                            <th>Giới Thiệu</th>
                                            <th>Thể Loại</th>
                                            <th>Ảnh</th>
                                            <th>Ngày Tạo</th>
                                            <th>Người Tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value):
                                        ?>
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td><?php echo $value['title']; ?></td>
                                                <td><?php echo $value['description']; ?></td>
                                                <td><?php echo $value['catalog_name']; ?></td>
                                                <td align="center"><img width="70px" height="70px" src="images/<?php echo $value['url_image']; ?>" alt=""></td>
                                                <td><?php echo $value['created']; ?></td>
                                                <td><?php echo $value['name']; ?></td>
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
                            <label class="control-label col-sm-3 col-md-2" for="txtName">Tên Bài Viết</label>
                            <div class="col-sm-9 col-md-10">
                                <input type="text" name='txtName' class="form-control" id="txtName" placeholder="Tên Bài Viết">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="fLink">Ảnh Bài Viết</label>
                            <div class="col-sm-9 col-md-10">
                                <input name='fLink' accept=".jpg,.jpeg,.png" type="file" id="fLink">
                                <p class="help-block">File .JPG,.PNG</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="editor-des">Tóm tắt</label>
                            <div class="col-sm-9 col-md-10">
                                <textarea class="form-control" name='editor-des' id="editor-des"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-2" for="editor">Nội dung</label>
                            <div class="col-sm-9 col-md-10">
                                <textarea class="form-control" name='editor' id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='control-label col-sm-3 col-md-2' for='selCatalog'>Loại Bài Viết</label>
                            <div class="col-sm-9 col-md-10">
                                <select class="form-control" name='selCatalog' id="selCatalog">
                                   <?php foreach ($catalog as $key => $value): ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                   <?php endforeach ?>
                                </select>
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