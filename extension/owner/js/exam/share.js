$(document).ready(function(){
	$('#t-tip').popover({
		title: 'Tùy chọn',
		content: '<p><span class="text-success"> Chỉ mình tôi </span>: Chỉ có bạn mới có thể xem và chỉnh sửa được đề thi này </p>' +
				' <p><span class="text-success"> Chia sẻ tất cả </span>: Tất cả giáo viên trong bộ môn có thể xem, nhưng không thể chỉnh sửa </p>' + 
				' <p><span class="text-success"> Chọn giáo viên </span>: Chỉ có giáo viên được chọn mới có thể xem được đề thi này, nhưng không thể chỉnh sửa </p>',
		html: true,
		trigger: 'hover'
	})
});