<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章首页</title>
	<link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.css">
	<script type="text/javascript" src="<?=base_url()?>public/js/jquery-2.1.1.js"></script>
</head>
<body>

	<div class="add"><h1><a href="<?php echo site_url('home/add') ?>">添加文章</a></h1></div>
	<div class="container">
		<table class="table table-bordered" >
			<thead>
				<tr>
					<th>ID</th>
					<th>文章标题</th>
					<th>文章内容</th>
					<th>发表时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			 <?php foreach ($info as $key => $v): ?>
				<tr>
					<td><?php echo $v['id'] ?></td>
					<td><?php echo $v['title'] ?></td>
					<td><?php echo $v['content'] ?></td>
					<td><?php echo date('Y-m-d',$v['release_time']) ?></td>
					<td>
						<a href="<?php echo site_url('home/edit/'.$v['id']);?>">编辑</a>
						<a href="<?php echo site_url('home/del/'.$v['id']);?>" onclick="prompt($v['id']);">删除</a>
					</td>
				</tr>
			<?php endforeach ?> 
			</tbody>	
		</table>
		<?php echo $this->pagination->create_links(); ?> 
		<script>
			function prompt(){
				return confirm('确定删除么？');	
			}
		</script>
	</div>




</body>
</html>