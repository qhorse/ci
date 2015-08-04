<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加文章</title>
	<link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.css">
	<script type="text/javascript" src="<?=base_url()?>public/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
	    window.onload = function()
	    {
	        CKEDITOR.replace( 'content' );     //content是textarea的名称
	    };
	</script>
</head>
<body>
	<div class="add"><h1>添加文章</h1></div>
	<hr>
	<div class="form">
		<form action="<?php echo site_url('home/save')?>" method="post">
			<div class="form-group">
				<label>文章标题</label>
				<input type="text" class="form-control" name="title" placeholder="文章标题" >
			</div>
			<div class="form-group">
			<label>文章内容</label>
			<textarea name="content" class="form-control">
			</textarea>
		</div>
			<button type="submit" class="btn btn-default">提交</button>
		</form>
	</div>
</body>
</html>


