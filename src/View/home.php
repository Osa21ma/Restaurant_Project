<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<style>
    #system-cover {
        width: 100%;
        height: 45em;
        object-fit: cover;
        object-position: center center;
    }
</style>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs text-sm" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <h1 class="">Welcome, !</h1>

    <div class="wrapper">
        <?php require_once('inc/navigation.php') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper  pt-3" style="min-height: 567.854px;">

            <!-- Main content -->
            <section class="content  text-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Categories</span>
                                    <span class="info-box-number text-right h5">
                                        <?php
                                        // $category = $conn->query("SELECT * FROM category_list where delete_flag = 0 and `status` = 1")->num_rows;
                                        // echo format_num($category);
                                        ?>
                                        <?php ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-hamburger"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Menu</span>
                                    <span class="info-box-number text-right h5">
                                        <?php
                                        // $menus = $conn->query("SELECT id FROM menu_list where delete_flag = 0 and `status` = 1")->num_rows;
                                        // echo format_num($menus);
                                        ?>
                                        <?php ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-table"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Queued Order</span>
                                    <span class="info-box-number text-right h5">
                                        <?php
                                        // $orders = $conn->query("SELECT id FROM order_list where `status` = 0")->num_rows;
                                        // echo format_num($orders);
                                        ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-th-list"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Sales Today</span>
                                    <span class="info-box-number text-right h5">
                                        <?php
                                        // $orders = $conn->query("SELECT coalesce(SUM(total_amount),0) FROM order_list where date(`date_created`) = '" . (date('Y-m-d')) . "'")->fetch_array()[0];
                                        // $orders = $orders > 0 ? $orders : 0;
                                        // echo format_num($orders, 2);
                                        ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center">
                    <img src="uploads\cover.png" alt="system-cover" id="system-cover" class="img-fluid">
                </div>
            </section>
            <!-- /.content -->
            <div class="modal fade" id="uni_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary rounded-0" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="uni_modal_right" role='dialog'>
                <div class="modal-dialog modal-full-height  modal-md rounded-0" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="fa fa-arrow-right"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirm_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            <div id="delete_content"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary rounded-0" id='confirm' onclick="">Continue</button>
                            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="viewer_modal" role='dialog'>
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /.content-wrapper -->
        <?php require_once('inc/footer.php') ?>
</body>

</html>