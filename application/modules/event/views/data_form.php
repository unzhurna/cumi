<script src="<?php echo config_item('assets'); ?>js/moment.min.js"></script>
<script src="<?php echo config_item('assets'); ?>js/daterangepicker.js"></script>
<script>
	//Daterange Picker
	$(document).ready(function() {
		$('#periode').daterangepicker();	
	});
	
	function save_data(id)
	{
		$.post("<?php echo site_url('event/post_data'); ?>/"+id,
		{
			event_name: $('#event_name').val(),
			max_call_count: $('#max_call_count').val(),
			periode: $('#periode').val(),
			description: $('#description').val()			
		},
		function(data)
		{	
			if(data == 1)
			{
				window.location = "<?php echo site_url('event');?>";
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
					echo form_input(array('class'=>'form-control', 'id'=>'event_name', 'name'=>'event_name', 'value'=>set_value('event_name', $event)));
				?> 
			</div>
			<div class="form-group">
				<label>Max Call Count<span class="text-danger">*</span></label>
				<?php
					echo form_input(array('class'=>'form-control', 'id'=>'max_call_count', 'name'=>'max_call_count', 'value'=>set_value('max_call_count', $max_call_count)));
				?> 
			</div>
			<div class="form-group">
				<label>Event Periode<span class="text-danger">*</span></label>
				<?php
					echo form_input(array('class'=>'form-control', 'id'=>'periode', 'name'=>'periode', 'value'=>set_value('periode', $periode)));
				?> 
			</div>
			<div class="form-group">
				<label>Description</label>
				<?php
					echo form_textarea(array('class'=>'form-control', 'id'=>'description', 'name'=>'description', 'rows'=>'3', 'value'=>set_value('description', $description)));
				?> 
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-white" onclick="return save_data('<?php echo $id; ?>');" type="button">Submit <i class="icon-circle-arrow-right"></i></button>
		</div>
	</div>
</div>