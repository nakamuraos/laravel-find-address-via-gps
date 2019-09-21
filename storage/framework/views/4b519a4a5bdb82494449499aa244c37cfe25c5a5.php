
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Quản lý người dùng</h4>
                    <!-- <p class="card-category">New employees on 15th September, 2016</p> -->
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <tr>
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Họ và tên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Loại người dùng</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hien98</td>
                                <td>Phạm Thị Hiền</td>
                                <td>12232456</td>
                                <td>hien@gmail.com</td>
                                <td>Quản lý địa chỉ</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                            data-href="#"><i
                                                class="material-icons">edit</i></button>
                                        <button type="button" class="btn btn-danger btn-link btn-sm px-2"
                                            data-toggle="modal" data-target="#"><i
                                                class="material-icons">close</i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Hien98</td>
                                <td>Phạm Thị Hiền</td>
                                <td>12232456</td>
                                <td>hien@gmail.com</td>
                                <td>Người quản lý địa chỉ</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                            data-href="#"><i
                                                class="material-icons">edit</i></button>
                                        <button type="button" class="btn btn-danger btn-link btn-sm px-2"
                                            data-toggle="modal" data-target="#"><i
                                                class="material-icons">close</i></button>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Hien98</td>
                                <td>Phạm Thị Hiền</td>
                                <td>12232456</td>
                                <td>hien@gmail.com</td>
                                <td>Người đăng kí</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                            data-href="#"><i
                                                class="material-icons">edit</i></button>
                                        <button type="button" class="btn btn-danger btn-link btn-sm px-2"
                                            data-toggle="modal" data-target="#"><i
                                                class="material-icons">close</i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Hien98</td>
                                <td>Phạm Thị Hiền</td>
                                <td>12232456</td>
                                <td>hien@gmail.com</td>
                                <td>Quản lý địa chỉ</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                            data-href="#"><i
                                                class="material-icons">edit</i></button>
                                        <button type="button" class="btn btn-danger btn-link btn-sm px-2"
                                            data-toggle="modal" data-target="#"><i
                                                class="material-icons">close</i></button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/thinhhoang/Data1/Data/Tai lieu hoc tap/PTPM huong dich vu/MyProject/resources/views/admin/users/index.blade.php ENDPATH**/ ?>