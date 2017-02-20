<!--
<ul class="my-treeview">
	<li> 1
		<ul>
			<li> 1
				<ul>
					<li> 1 </li>
					<li> 1 </li>
				</ul>
			</li>
		</ul>
	</li>
	<li> 3
		<ul>
			<li> 1 </li>
			<li> 2 </li>
			<li> 1
				<ul>
					<li> 1 </li>
					<li> 1 </li>
				</ul>
			</li>
		</ul>
	</li>
</ul>
<script>
	$(document).ready(function(){
		$.fn.extend({
			tree_view: function(){
				$(this).find('ul').addClass('collapse');
				var icon = {
					collapse: 'glyphicon-chevron-right',
					expand: 'glyphicon-chevron-down'
				};
				$('<button class="btn btn-default btn-xs collapse-tv"><span class="icon-tv glyphicon glyphicon-chevron-right"></span></button>').prependTo($(this).find('li:has(ul)'));
				$(this).on('click', 'button.collapse-tv', function(){
					$(this).parent('li').find('ul:lt(1)').removeClass('collapse');
					$(this).removeClass('collapse-tv');
					$(this).addClass('expand-tv');
					$(this).find('.icon-tv').removeClass(icon.collapse).addClass(icon.expand);
				});
				$(this).on('click', 'button.expand-tv', function(){
					$(this).parent('li').find('ul:lt(1)').addClass('collapse');
					$(this).removeClass('expand-tv');
					$(this).addClass('collapse-tv');
					$(this).find('.icon-tv').removeClass(icon.expand).addClass(icon.collapse);
					$(this).parent('li').find('button.expand-tv').trigger('click');
				});
			}
		});
		$('.my-treeview').tree_view();
	});
</script>
<style>
	.my-treeview li
	{
		list-style-type: none;
		padding: 5px;
	}
	.my-treeview ul.collapse
	{
		display: none;
	}
	.my-treeview button.expand-tv,
	.my-treeview button.collapse-tv
	{
		margin-left: 5px;
		color: #555;
	}
</style>
-->
Đang trong quá trình hoàn thiện ...