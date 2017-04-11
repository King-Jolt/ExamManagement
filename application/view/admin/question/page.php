<script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
<script type="text/x-mathjax-config" src="/extension/owner/js/mathjax_config.js"></script>
<script src="/extension/owner/js/table.js"></script>
<?php self::put($msg) ?>
<form method="post">
	<div>
		<span class="dropdown">
			<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Thêm mới <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li class="dropdown-header"> Chọn loại câu hỏi </li>
				<li class="divider"></li>
				<li><a href="{{add_a}}"> Chọn đáp án </a></li>
				<li><a href="{{add_b}}"> Câu ghép nối </a></li>
				<li><a href="{{add_c}}"> Câu Điền khuyết </a></li>
				<li><a href="{{add_essay}}"> Câu tự luận </a></li>
			</ul>
		</span>
		<button type="submit" class="btn btn-warning btn-xs" name="delete" value="1" > Xóa câu hỏi </button>
	</div>
	{{ table }}
</form>
