<style>
    .category-img {
        width: 3em;
        height: 3em;
        object-fit: cover;
        object-position: center center;
    }
</style>
<?php require_once('inc/header.php') ?>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs text-sm" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
        <?php require_once('inc/navigation.php') ?>


        <div class="card card-outline rounded-0 card-warning container" style="
    margin: auto;
    margin-right: 100px;">
            <div class=" card-header">
                <h3 class="card-title">List of Categories</h3>
                <div class="card-tools">
                    <a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-hover table-striped table-bordered" id="list">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="25%">
                            <col width="35%">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Created</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td class="text-center"></td>
                                    <td></td>
                                    <td class=""></td>
                                    <td class="">
                                        <p class="mb-0 truncate-1"></p>
                                    </td>
                                    <td class="text-center">
                                      
                                            <span class="badge badge-success px-3 rounded-pill">Active</span>
                                     
                                            <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                 
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Action
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item view-data" href="javascript:void(0)" data-id=""><span class="fa fa-eye text-dark"></span> View</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item edit-data" href="javascript:void(0)" data-id=""><span class="fa fa-edit text-primary"></span> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete_data').click(function() {
                _conf("Are you sure to delete this Category permanently?", "delete_category", [$(this).attr('data-id')])
            })
            $('#create_new').click(function() {
                uni_modal("<i class='far fa-plus-square'></i> Add New Category ", "categories/manage_category.php")
            })
            $('.edit-data').click(function() {
                uni_modal("<i class='fa fa-edit'></i> Add New Category ", "categories/manage_category.php?id=" + $(this).attr('data-id'))
            })
            $('.view-data').click(function() {
                const categoryId = $(this).attr('data-id');
                setTimeout(() => {
                    var nw = window.open(_base_url_ + `category/viewCategory/${categoryId}`, '_blank', "width=" + ($(window).width() * .8) + ",left=" + ($(window).width() * .1) + ",height=" + ($(window).height() * .8) + ",top=" + ($(window).height() * .1))
                    setTimeout(() => {
                        nw.print()
                        setTimeout(() => {
                            nw.close()
                            location.reload()
                        }, 300);
                    }, 200);
                }, 200);
            })
            $('.table').dataTable({
                columnDefs: [{
                    orderable: false,
                    targets: [5]
                }],
                order: [0, 'asc']
            });
            $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
        })

        function delete_category($id) {
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=delete_category",
                method: "POST",
                data: {
                    id: $id
                },
                dataType: "json",
                error: err => {
                    console.log(err)
                    alert_toast("An error occured.", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.reload();
                    } else {
                        alert_toast("An error occured.", 'error');
                        end_loader();
                    }
                }
            })
        }
    </script>
    <?php require_once('inc/footer.php') ?>
</body>

</html>