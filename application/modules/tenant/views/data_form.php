<script>
	function save_tenant(id)
	{
		$.post("<?php echo site_url('tenant/post_data'); ?>/"+id,
		{
			tenant: $('#tenant').val(),
			description: $('#description').val()
		},
		function(data)
		{	
			if(data == 1)
			{
				window.location = "<?php echo site_url('tenant');?>";
			}
			else
			{
				$('#form-error').html(data).show();
			}
		});
	}
</script>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title"><i class="icon-edit"></i> Tenant Form</h4>
		</div>
		<div class="modal-body" id="test">
			<div class="form-group">
				<label>Tenant Name<span class="text-danger">*</span></label>
				<?php
					echo form_input(array('class'=>'form-control', 'id'=>'tenant', 'name'=>'tenant', 'value'=>set_value('tenant', $tenant)));
				?> 
			</div>
			<div class="form-group">
				<label>Description</label>
				<?php
					echo form_textarea(array('class'=>'form-control', 'id'=>'description', 'rows'=>'3', 'name'=>'description', 'value'=>set_value('description', $description)));
				?> 
			</div>					
		</div>
		<div class="modal-footer">
			<button class="btn btn-white" onclick="return save_tenant(<?php echo $id; ?>);" type="button">Submit <i class="icon-circle-arrow-right"></i></button>
		</div>
	</div>
</div>