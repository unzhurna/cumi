<script>
	function save_tenant(id)
	{
		$.post("<?php echo base_url(); ?>tenant/post_data/"+id,
		{
			name: $('#tenant').val(),
			description: $('#description').val(),
			max_call_count: $('#max_call_count').val()
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
			<h4 class="modal-title"><i class="icon-edit"></i> Event Form</h4>
		</div>
		<div class="modal-body" id="test">
			<div class="form-group">
				<label>Event Name<span class="text-danger">*</span></label>
				<?php
					echo form_input(array('class'=>'form-control', 'id'=>'name', 'value'=>set_value('name', $name)));
				?> 
			</div>
			<div class="form-group">
				<label>Description<span class="text-danger">*</span></label>
				<?php
					echo form_textarea(array('class'=>'form-control', 'id'=>'description', 'rows'=>'3', 'value'=>set_value('description', $description)));
				?> 
			</div>
			<div class="form-group">
				<label>Max Call Count<span class="text-danger">*</span></label>
				<?php
					echo form_input(array('class'=>'form-control', 'id'=>'name', 'value'=>set_value('name', $name)));
				?> 
			</div>					
		</div>
		<div class="modal-footer">
			<button class="btn btn-white" onclick="return save_data('<?php echo $id; ?>');" type="button">Submit <i class="icon-circle-arrow-right"></i></button>
		</div>
	</div>
</div>