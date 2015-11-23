                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Chi Tiết Đơn Hàng
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped responsive table-bordered table-hover" id="dataTables-detail">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên Sản Phẩm</th>
                                                        <th>Số Lượng</th>
                                                        <th>Tổng Giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data_order as $key => $value):
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value['product_id']; ?></td>
                                                            <td><?php echo $value['name_product']; ?></td>
                                                            <td><?php echo $value['qty']; ?></td>
                                                            <td><?php echo $value['amount']; ?></td>
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