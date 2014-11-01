<script>
	function save_news(id)
	{
		$.post("<?php echo site_url('news/post_data'); ?>/"+id,
		{
			title: $('#title').val(),
			content: $('#content').val()
		},
		function(data)
		{	
			if(data == 1)
			{
				window.location = "<?php echo site_url('news');?>";
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
			<h4 class="modal-title"><i class="icon-edit"></i> News Form</h4>
		</div>
		<div class="modal-body" id="test">
			<div class="form-group">
				<label>Title<span class="text-danger">*</span></label>
				<?php
					echo form_input(array('class'=>'form-control', 'id'=>'title', 'value'=>set_value('title', $title)));
				?> 
			</div>
			<div class="form-group">
				<label>Content</label>
				<?php
					echo form_textarea(array('class'=>'form-control', 'id'=>'content', 'rows'=>'3', 'name'=>'content', 'value'=>set_value('content', $content)));
				?> 
			</div>					
		</div>
		<div class="modal-footer">
			<button class="btn btn-white" onclick="return save_news(<?php echo $id; ?>);" type="button">Submit <i class="icon-circle-arrow-right"></i></button>
		</div>
	</div>
</div>
