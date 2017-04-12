$(document).ready(function(){
	(function(){
		var tree = $('#tree');
		var data = [{
			text: ' Thư mục gốc (ROOT) ',
			href: 'javascript:void(0)'
		}];
		$.ajax({
			url: '/admin/category/gettree',
			method: 'GET',
			async: false,
			dataType: 'json'
		}).success(function(d){
			data[0].nodes = d;
		});
		tree.treeview({
			enableLinks: true,
			highlightSelected: false,
			nodeIcon: 'fa fa-folder',
			selectedIcon: "fa fa-folder-open-o",
			collapseIcon: 'fa fa-chevron-down',
			expandIcon: 'fa fa-chevron-right',
			selectedBackColor: '#9f9f9f',
			data: data,
			onNodeUnselected: function(event, data){
				$('#category-info .name').text('...');
				$('#category-info .child').text('...');
				$('#category-info .exam').text('...');
				$('#category-info .share').text('...');
				$('#tree-btns a.insert').prop('href', 'javascript:void(0)').addClass('disabled');
				$('#tree-btns a.update').prop('href', 'javascript:void(0)').addClass('disabled');
				$('#tree-btns a.delete').prop('href', 'javascript:void(0)').addClass('disabled');
			},
			onNodeSelected: function(event, data){
				$('#tree-btns a.insert').prop('href', '/admin/category/create').removeClass('disabled');
				$('#category-info .name').text(data.text);
				if (data.nodeData)
				{
					$('#category-info .child').text(data.nodeData.child);
					$('#category-info .exam').text(data.nodeData.n_exam);
					$('#category-info .share').text(data.nodeData.n_share);
					$('#tree-btns a.insert').prop('href', '/admin/category/' + data.nodeData.id + '/create');
					$('#tree-btns a.update').prop('href', '/admin/category/' + data.nodeData.id + '/edit').removeClass('disabled');
					$('#tree-btns a.delete').prop('href', '/admin/category/' + data.nodeData.id + '/delete').removeClass('disabled');
				}
				else
				{
					$('#category-info .child').text(Object.keys(data.nodes).length);
					$('#tree-btns a.insert').prop('href', '/admin/category/create');
				}
			}
		});
		tree.treeview('expandAll', { levels: 5, silent: true });
		tree.treeview('selectNode', 1);
	})();
});