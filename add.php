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
		@font-face {
			font-family: Header; /* Имя шрифта */
			src: url(RubikMonoOne-Regular.ttf); /* Путь к файлу со шрифтом */
		}
		.title{
			font-family:Header;
			font-size:90px
		}
	</style>
</head>
<body class="text-light" style="background: rgb(248,248,252);
background: linear-gradient(333deg, rgba(248,248,252,1) 0%, rgba(182,228,241,1) 0%, rgba(232,233,237,1) 33%, rgba(58,187,219,1) 50%, rgba(0,212,255,1) 100%); background-attachment:fixed">
<div class="col-12 py-3">
	<div class="d-flex">
		<div class="col-2 pt-3">
			<a href="" class="text-light ms-3">О компании</a>
			<a href="" class="text-light ms-3">Все проекты</a>
		</div>
		<div class="col-8 text-center">
			<h1 style="font-family:Header" class="fw-bold">Donate.yes</h1>
			<p>Донатная платформа для любых проектов</p>
		</div>
		<div class="col-2 text-left pt-3">
			<a href="add.php" class="text-light"> Добавить проект <img src="add.png" alt=""> </a>
			

		</div>
	</div>
</div>

<div class="col-6 mx-auto text-center">
    <form action="addProject.php" method="GET">
        <input type="text" class="form-control mt-2" placeholder="Заголовок проекта" name="title">
        <input type="text" class="form-control mt-2" placeholder=" Описание проекта" name="texts">
        <input type="number" class="form-control mt-2" placeholder="Сколько надо собрать денег? " name="goal">
        <input type="number" class="form-control mt-2" placeholder="сколько на данный момент есть денег?" name="donated">
        <input type="text" class="form-control mt-2" placeholder="Адрес картинки" name="img">
        <input type="text" class="form-control mt-2" placeholder="Пользователь" name="user">
        <button class="btn btn-success mt-4">Добавить проект</button>
    </form>
</div>
	<div class="d-flex mt-2 flex-wrap">
		<!--карточка проекта-->
		<?php
		$con = mysqli_connect("MySQL-8.2","root","","kickstarter");
		$query = mysqli_query($con,"SELECT * FROM projects WHERE user='Andy'");
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
					<!--<form action="updatedonate.php" method="GET">
						<input type="hidden" name="id" value="<?php echo $pj['id'] ?>">
						<button class="btn btn-success" >Поддержать проект</button>		
					</form>	-->
					<div class="d-flex">
						<form action="editproject.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $pj['id'] ?>">
							<button class="btn btn-warning" >Редактировать</button>		
						</form>
						<form action="delete.php" method="GET" class="ms-1">
							<input type="hidden" name="id" value="<?php echo $pj['id'] ?>">
							<button class="btn btn-danger" >Удалить</button>		
						</form>
					</div>
				</div>
			</div>
		</div>	
    	<?php 
    	}
    	?>
	</div>
</body>
</html>