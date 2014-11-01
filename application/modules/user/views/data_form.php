<script>
	function save_tenant()
	{
		$.post("<?php echo base_url(); ?>tenant/post_data/"+$('#id').val(),
		{
			tenant: $('#tenant').val(),
			description: $('#description').val()
		},
		function(data)
		{	
			if(data == 1)
			{
				window.location = "<?php echo base_url();?>tenant";
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
					echo form_input(array('id'=>'id', 'style'=>'display:none;', 'name'=>'id', 'value'=> set_value('id',$id)));
					echo form_input(array('class'=>'form-control', 'id'=>'tenant', 'name'=>'tenant', 'value'=>set_value('tenant', $tenant)));
				?> 
			</div>
			<div class="form-group">
				<label>Description<span class="text-danger">*</span></label>
				<?php
					echo form_textarea(array('class'=>'form-control', 'id'=>'description', 'rows'=>'3', 'name'=>'description', 'value'=>set_value('description', $description)));
				?> 
			</div>					
		</div>
		<div class="modal-footer">
			<button class="btn btn-white" onclick="return save_tenant();" type="button">Submit <i class="icon-circle-arrow-right"></i></button>
		</div>
	</div>
</div>