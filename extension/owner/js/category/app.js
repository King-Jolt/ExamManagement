$(document).ready(function() {
	$('#tree').on('update-tv', function(){
		var tree = [{text: 'Không có dữ liệu', icon: 'glyphicon glyphicon-remove'}];
		$.ajax({
			url: '/admin/category/load',
			async: false,
			type: 'POST',
			data: { load : 'tree' },
			dataType: 'json',
			success: function(result){
				tree = [{
					href: 'javascript:void(0)',
					nodes: []
				}];
				tree[0].nodes = result;
			}
		});
		$(this).treeview({
			color: "#428bca",
			expandIcon: 'glyphicon glyphicon-chevron-right',
			collapseIcon: 'glyphicon glyphicon-chevron-down',
			nodeIcon: 'glyphicon glyphicon-file',
			enableLinks: true,
			selectedIcon: "glyphicon glyphicon-hand-right text-success",
			highlightSelected: false,
			data : tree,
			customText: function(data){
				data.href = 'javascript:void(0)';
				if (data.nodeData)
				{
					var t = '<a href="/admin/category/' + data.nodeData.id + '/exam">' + data.nodeData.name + ' &nbsp; <span class="text-muted"><span class="glyphicon glyphicon-arrow-right"></span> Quản lý </span> </a>' +
							'<span class="pull-right">' + 
							'<a href="/admin/category/' + data.nodeData.id + '/create" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Thêm </a> ' +
							'<a href="/admin/category/' + data.nodeData.id + '/edit" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> Sửa </a> ' +
							'<a href="/admin/category/' + data.nodeData.id + '/delete" class="btn btn-danger btn-xs be-care"><span class="glyphicon glyphicon-remove"></span> Xóa </a>' + 
							'</span>';
					return t;
				}
				else
				{
				return '<strong> Thư mục gốc (ROOT) </strong> <a href="/admin/category/create" class="pull-right btn btn-primary btn-xs"> Thêm </a>';
			}
			},
			onNodeSelected: function(event, data) {
				var n = '<strong> ROOT </strong>', c = 0, e = 0, s = 0;
				if (data.nodeData)
				{
					n = data.nodeData.name;
					c = data.nodeData.child;
					e = data.nodeData.n_exam;
					s = data.nodeData.n_share;
				}
				else
				{
					c = Object.keys(data.nodes).length;
				}
				$('#category-info .name').html(n);
				$('#category-info .child').text(c);
				$('#category-info .exam').text(e);
				$('#category-info .share').text(s);
			}
		}).treeview('expandAll', { levels: 4, silent: false }).treeview('selectNode', 1, { silent: false });
	}).trigger('update-tv');
}); 
