<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	<dl>
		<dt class="text-muted">Name</dt>
		<dd class="pl-4"><?= $data['category']->name?></dd>
		<dt class="text-muted">Description</dt>
		<dd class="pl-4"><?=  $data['category']->description?></dd>
		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
	
		<?php if( $data['category']->status == 1){ ?>
                                      
			  <span class="badge badge-success px-3 rounded-pill">Active</span>
			  <?php }else{ ?>
			  <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
		<?php } ?>

		</dd>
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>