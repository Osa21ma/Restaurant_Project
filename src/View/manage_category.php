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

		<div class="container-fluid">
			<form action="" id="category-form">
				<div class="form-group">
					<label for="name" class="control-label">Name</label>
					<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>" required />
				</div>
				<div class="form-group">
					<label for="description" class="control-label">Description</label>
					<textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required><?php echo isset($description) ? $description : ''; ?></textarea>
				</div>
				<div class="form-group">
					<label for="status" class="control-label">Status</label>
					<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
						<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
						<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
					</select>
				</div>
			</form>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#category-form').submit(function(e) {
				e.preventDefault();
				var _this = $(this)
				$('.err-msg').remove();
				start_loader();
				$.ajax({
					url: _base_url_ + "category/createCategory",
					data: new FormData($(this)[0]),
					cache: false,
					contentType: false,
					processData: false,
					method: 'POST',
					type: 'POST',
					dataType: 'json',
					error: err => {
						console.log(err)
						alert_toast("An error occured", 'error');
						end_loader();
					},
					success: function(resp) {
						if (typeof resp == 'object' && resp.status == 'success') {
							// location.reload()
							alert_toast(resp.msg, 'success')
								location.reload()
						} else if (resp.status == 'failed' && !!resp.msg) {
							var el = $('<div>')
							el.addClass("alert alert-danger err-msg").text(resp.msg)
							_this.prepend(el)
							el.show('slow')
							$("html, body").scrollTop(0);
							end_loader()
						} else {
							alert_toast("An error occured", 'error');
							end_loader();
							console.log(resp)
						}
					}
				})
			})

		})
	</script>

	<?php require_once('inc/footer.php') ?>
</body>

</html>