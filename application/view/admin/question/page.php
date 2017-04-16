<script src="/extension/owner/js/form-table.js"></script>
{{ msg }}
<form method="post" class="require-checkbox-from-table">
	<div>
		<span class="dropdown">
			<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Thêm mới <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li class="dropdown-header"> Trắc nghiệm </li>
				<li><a href="{{add_a}}"> Chọn đáp án </a></li>
				<li><a href="{{add_b}}"> Ghép nối </a></li>
				<li><a href="{{add_c}}"> Điền khuyết </a></li>
				<li class="divider"></li>
				<li class="dropdown-header"> Khác </li>
				<li><a href="{{add_essay}}"> Tự luận </a></li>
			</ul>
		</span>
		<button type="submit" class="btn btn-warning btn-xs" name="delete" value="1" > Xóa câu hỏi </button>
	</div>
	{{ table }}
</form>
