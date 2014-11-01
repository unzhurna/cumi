<script src="<?php echo config_item('assets'); ?>js/jquery.dataTables.js"></script>
<script src="<?php echo config_item('assets'); ?>js/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function () {
		var oTable = $('#dataList').dataTable({
            "bProcessing": true,
            "bServerSide": true,
           	"sAjaxSource": "<?php  if(isset($source)) echo $source; ?>",
           	"iDisplayStart ": 10,
            "aoColumnDefs": [{
				"bSortable": false,
				"sClass": "center",
				"aTargets": [-1]
			}],
            "oLanguage": {
		        "sProcessing": "<img src='<?php echo config_item('assets'); ?>img/loader.gif'>"
		    },                         
			"fnServerData": function (sSource, aoData, fnCallback) {
                $.ajax
                ({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
          },
          "fnDrawCallback": function ( oSettings) {
          		$('[title]').tooltip();			
		  },

        });        
        
        // Modal
       	$('#btnModal').click(function(){
			$('#myModal').modal();
		});
    });
</script>
