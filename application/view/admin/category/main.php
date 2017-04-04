<link rel="stylesheet" href="/extension/bootstrap-treeview/bootstrap-treeview.min.css" />
<script src="/extension/bootstrap-treeview/bootstrap-treeview.min.js"></script>
<?php self::put($msg) ?>
<div id="tree"></div>
<script>
	$(document).ready(function() {
		$('#tree').on('update-tv', function(){
			var tree = [{text: 'Không có dữ liệu', icon: 'glyphicon glyphicon-remove'}];
			$.ajax({
				url: location.href + '/load',
				async: false,
				type: 'POST',
				data: { 'load' : 'tree' },
				dataType: 'json',
				success: function(result){
					tree = result;
				}
			});
			$(this).treeview({
				color: "#428bca",
				expandIcon: 'glyphicon glyphicon-chevron-right',
				collapseIcon: 'glyphicon glyphicon-chevron-down',
				nodeIcon: 'glyphicon glyphicon-file',
				enableLinks: true,
				highlightSelected: false,
				data : tree
			});
		}).trigger('update-tv');
	}); 
</script>
