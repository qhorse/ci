<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑文章</title>
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
	<div class="add"><h1>编辑文章</h1></div>
	<hr>
		<form action="<?php echo site_url('home/upsave')?>" method="post">
			<input type="hidden" name="id" value="<?php echo $info[0]['id'] ?>">
			<div class="form-group">
				<label>文章标题</label>
				<input type="text" name="title" class="form-control" value="<?php echo $info[0]['title'] ?>" >
			</div>
			<div class="form-group">
			<label>文章内容</label>
				<textarea name="content" value="" class="form-control">
					<?php echo $info[0]['content'] ?>
				</textarea>
			</div>
			<button type="submit" class="button">提交</button>
		</form>
	
</body>
</html>