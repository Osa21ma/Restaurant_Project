<style>
	.order-logo {
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
    margin-right: 100px;
">

			<div class="card-header">
				<h3 class="card-title">List of Orders</h3>
			</div>
			<div class="card-body">
				<div class="container">
					<table class="table table-hover table-striped table-bordered" id="list">
						<colgroup>
							<col width="5%">
							<col width="15%">
							<col width="15%">
							<col width="15%">
							<col width="20%">
							<col width="15%">
							<col width="10%">
						</colgroup>
						<thead>
							<tr>
								<th>#</th>
								<th>Date Created</th>
								<th>Transaction Code</th>
								<th>Queue</th>
								<th>Total Amount</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
								<tr>
									<td class="text-center"></td>
									<td></td>
									<td class=""><?= $order->code ?></td>
									<td class=""><?= $order->queue ?></td>
									<td class="text-right"></td>
									<td class="text-center">
									
									</td>
									<td class="text-center">
										<div class="btn-group btn-group-sm">
											<a class="btn btn-flat btn-sm btn-light bg-gradient-light border view_receipt" href="javascript:void(0)" data-id="" title="Print Receipt"><small><span class="fa fa-receipt"></span></small></a>
											<a class="btn btn-flat btn-sm btn-danger bg-gradient-danger delete_data" href="javascript:void(0)" data-id="" title="Delete Order"><small><span class="fa fa-trash"></span></small></a>
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
				start_loader();
				$.ajax({
					url: _base_url_ + `sales/deleteOrder/${$(this).attr('data-id')}`,
					method: "POST",
					dataType: "json",
					error: err => {
						console.log(err)
						alert_toast("An error occured.", 'error');
						end_loader();
					},
					success: function(resp) {
						if (typeof resp == 'object' && resp.status == 'success') {
							alert_toast(resp.msg, 'success')
							location.reload();
						} else {
							console.log(resp)
							alert_toast("An error occured.", 'error');
							end_loader();
						}
					}
				})
			})
			$('.view_receipt').click(function() {
				var nw = window.open(_base_url_ +  '_blank', "width=" + ($(window).width() * .8) + ",left=" + ($(window).width() * .1) + ",height=" + ($(window).height() * .8) + ",top=" + ($(window).height() * .1))
				setTimeout(() => {
					nw.print()
					setTimeout(() => {
						nw.close()
						location.reload()
					}, 300);
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
	</script>
	<?php require_once('inc/footer.php') ?>
</body>

</html>