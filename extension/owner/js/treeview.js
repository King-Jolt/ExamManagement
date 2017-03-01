$.fn.extend({
	tree_view: function(){
		$(this).find('ul').addClass('collapse');
		var icon = {
			collapse: 'glyphicon-chevron-right',
			expand: 'glyphicon-chevron-down'
		};
		$('<span class="collapse-tv"><span class="icon-tv glyphicon glyphicon-chevron-right"></span></span>').prependTo($(this).find('li:has(ul)'));
		$(this).on('click', 'span.collapse-tv', function(){
			$(this).parent('li').find('ul:lt(1)').removeClass('collapse');
			$(this).removeClass('collapse-tv');
			$(this).addClass('expand-tv');
			$(this).find('.icon-tv').removeClass(icon.collapse).addClass(icon.expand);
		});
		$(this).on('click', 'span.expand-tv', function(){
			$(this).parent('li').find('ul:lt(1)').addClass('collapse');
			$(this).removeClass('expand-tv');
			$(this).addClass('collapse-tv');
			$(this).find('.icon-tv').removeClass(icon.expand).addClass(icon.collapse);
			$(this).parent('li').find('span.expand-tv').trigger('click');
		});
		$(this).on('change', '.tv-item-checkbox', function(){
			var c = $(this).is(':checked');
			$(this).parent('li').first().find('.tv-item-checkbox').prop('checked', c);
			/*$(this).parents('.my-treeview').find('.tv-item-checkbox').prop('checked', c);
			if (c === true)
			{
				$(this).parents('.my-treeview').find('.tv-item-checkbox:not(:checked)').each(function(){
					var p = $(this).parents('li:lt(1)').find('')
					//$(this).prop('checked', true);
				});
			}*/
		});
	}
});
$('.my-treeview').tree_view();