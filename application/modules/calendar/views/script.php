<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function() {
		$('#datatable').dataTable({
			"fnDrawCallback": function(oSettings){
				var that = this;
				/* Need to redo the counters if filtered or sorted */
				if ( oSettings.bSorted || oSettings.bFiltered )
				{
					this.$('td:first-child', {"filter":"applied"}).each( function (i) {
						that.fnUpdate( i+1, this.parentNode, 0, false, false );
					});
				}
			},
			"aoColumnDefs": [
				{
					"bSortable": false,
					"aTargets": [0,-1]
				}
			],
		});
	});
</script>
