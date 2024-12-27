<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html{
			height:100%;

		}
		body{
			height:100%;
		}
		
		.title{
			font-family:Arial;
			font-size:90px
		}
	</style>
</head>
<body class="text-light bg-dark" style="background-attachment:fixed">
<div class="col-12 py-3">
	<div class="d-flex">
		<div class="col-2 pt-3">
			<a href="" class="text-light ms-3">О компании</a>
			<a href="" class="text-light ms-3">Все проекты</a>
		</div>
		<div class="col-8 text-center">
			<h1 class="fw-bold">Donate.yes</h1>
			<p>Донатная платформа для любых проектов</p>
		</div>
		<div class="col-2 text-left pt-3">
			<a href="add.php" class="text-light"> Добавить проект <img src="add.png" alt=""> </a>
			

		</div>
	</div>
</div>
<div class="col-12" style='overflow:hidden'>
	
	<div class="d-flex mt-5 col-10 mx-auto">
		<div class="col-6 py-5 mt-5" >
			<h1 class="title">Свой слоган</h1>
		</div>
		<div class="col-6">
            <!--картинка-->
		</div>
	</div>
	<div class="d-flex mt-2 flex-wrap">
		<!--карточка проекта-->
		<?php
		$con = mysqli_connect("MySQL-8.2","root","","kickstarter");
		$query = mysqli_query($con,'SELECT * FROM projects');
		while($pj = $query->fetch_assoc()) { 
		
		?>
		<div class="col-4 p-3 text-dark mt-2" >
			<div class="col-12 bg-light rounded p-3" >
				<div class="rounded" style="background-image: url(<?php echo $pj['img'] ?>); background-size: cover; background-position: center; height:500px">				
				</div>
				<div>
					<h3><!--Заголовок проекта--><?php echo $pj['title'] ?></h3>
					<p><!--Описание проекта--><?php echo $pj['texts'] ?></p>
					<p> <span class="fw-bold"> Всего собрать: </span> <?php echo $pj['goal'] ?> руб.</p>
					<p><span class="fw-bold"> Собрано: </span> <?php echo $pj['donated'] ?> руб.</p>
					<form action="updatedonate.php" method="GET">
						<input type="hidden" name="id" value="<?php echo $pj['id'] ?>">
						<button class="btn btn-success" >Поддержать проект</button>		
					</form>	
				</div>
			</div>
		</div>	
    	<?php 
    	}
    	?>
	</div>
</div>

</body>
</html>