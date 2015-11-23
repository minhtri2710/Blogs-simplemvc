        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông Tin Giao Dịch</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" id='tran_detail'  class="btn btn-default">Chi Tiết</button>
                    <button type="button" id='delete'  class="btn btn-default">Xóa</button>
                    <button type="button" id='update'  class="btn btn-default">Đã giao</button>
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
                                            <th>Họ Tên</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Giá Đơn</th>
                                            <th>Địa Chỉ</th>
                                            <th>Ngày Đặt</th>
                                            <th>Trạng Thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value):
                                        ?>
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td><?php echo $value['user_name']; ?></td>
                                                <td><?php echo $value['user_email']; ?></td>
                                                <td><?php echo $value['user_phone']; ?></td>
                                                <td><?php echo $value['amount']; ?></td>
                                                <td><?php echo $value['address']; ?></td>
                                                <td><?php echo $value['created']; ?></td>
                                                <td><?php echo $value['status']; ?></td>
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
                    <div id="detail-trans">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
        </div>