<link rel="stylesheet" href="/extension/bootstrap-year-calendar/css/bootstrap-year-calendar.min.css" />
<script src="/extension/bootstrap-year-calendar/js/bootstrap-year-calendar.min.js"></script>
<p class="text-muted"><a href="https://github.com/Paul-DS/bootstrap-year-calendar" target="_blank" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-floppy-disk"></span> Bootstrap Year Calendar </a></p>
<div id="calendar"></div>
<script>
	$(document).ready(function() {
		dataSource = [];
		$.ajax({
			url: window.location.href,
			type: 'POST',
			data: {list: true},
			async: false,
			dataType: 'json',
			success: function(result)
			{
				dataSource = result;
				for (e in dataSource)
				{
					dataSource[e].startDate = new Date(dataSource[e].date);
					dataSource[e].endDate = new Date(dataSource[e].date);
					dataSource[e].color = 'green';
				}
			}
		});
		$('#calendar').calendar({
			dataSource,
			mouseOnDay : function(e) {
				if (e.events.length > 0) {
					var content = '';

					for (var i in e.events) {
						content += '<span class="text-muted"><p class="text-success"><strong> Bài kiểm tra: ' + e.events[i].title + '</strong></p>' +
						'<div>' + e.events[i].date + '</div>' +
						'</span>';
					}

					$(e.element).popover({
						trigger : 'click',
						container : 'body',
						html : true,
						content : content
					});

					$(e.element).popover('show');
				}
			},
			mouseOutDay : function(e) {
				if (e.events.length > 0) {
					$(e.element).popover('hide');
				}
			}
		});
	}); 
</script>