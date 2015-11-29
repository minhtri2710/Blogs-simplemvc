                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Danh Sách Bài Viết
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped responsive table-bordered table-hover" id="dataTables-detail">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th> 
                                                        <th>Tên Bài Viết</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data_news as $key => $value):
                                                    ?>
                                                        <tr <?php if(isset($id)) echo $id==$value['id']?'class="selected"':''; ?> >
                                                            <td><?php echo $value['id']; ?></td>
                                                            <td><?php echo $value['title']; ?></td>
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