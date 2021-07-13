<?php include('partials-front/menu.php'); ?>
	<!-- Food Search Section Starts Here -->
	<section class="food-search text-center">
		<div class="container">

			<form action="<?php echo SITEURL; ?>food-search.php" method="POST">
				<input type="search" name="search" placeholder="Search for Food..." required>
				<input type="submit" name="submit" value="search" class="btn btn-primary">
			</form>

		</div>
	</section>
	<!-- Food Search Section Ends Here -->

	<?php 

	if (isset($_SESSION['order'])) 
	{
		echo $_SESSION['order'];
		unset($_SESSION['order']);
	}


	?>

	<!-- Categories Section Starts Here -->
	<section class="categories">
		<div class="container">
		<h2 class="text-center">Featured Categories</h2>

		<?php
			$sql = "SELECT * FROM tbl_category WHERE featured='Yes' && active='Yes'";

			$res = mysqli_query($conn, $sql);

			$count = mysqli_num_rows($res);

			if($count>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{

					$id = $row['id'];
					$title = $row['title'];
					$image_name = $row['image_name'];
				?>

				<a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
					<div class="box-3 float-container">

						<?php 

							if($image_name=="")
							{
								echo "<div class='error'>Image not available</div>";
							}
							else
							{

							?>

							<img src="<?php echo SITEURL; ?>img/category/<?php echo $image_name; ?>" alt="Carbonara" class="img-responsive img-curve">

							<?php
							}

						 ?>

						<h3 class="float-text text-color"><?php echo $title; ?></h3>
					</div>
				</a>

				<?php 
				}
			}
			else
			{
				echo "<div class='error'> Category not Available </div>";
			}

		 ?>


			<div class="clearfix"></div>
		</div>
	</section>
	<!-- Categories Section Ends Here -->

	<!-- Food Menu Section Starts Here -->
	<section class="food-menu">
		<div class="container">
			<h2 class="text-center">Menu</h2>

	<?php

	$sql2 = "SELECT * FROM tbl_food WHERE active='Yes'";

	$res2 = mysqli_query($conn, $sql2);

	$count2 = mysqli_num_rows($res2);

	if($count2>0)
	{
		while($row=mysqli_fetch_assoc($res2))
		{
			$id = $row['id'];
			$title = $row['title'];
			$price = $row['price'];
			$description = $row['description'];
			$image_name = $row['image_name'];
			?>

		<div class="food-menu-box">
			<div class="food-menu-img">
				<?php  

				if($image_name=="")
				{
					echo "<div class='error'>Image not Available</div>";
				}
				else
				{
					?>
					<img src="<?php echo SITEURL; ?>img/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
					<?php 
				}

				?>
			</div>

			<div class="food-menu-desc">
				<h4><?php echo $title ?></h4>
				<p class="food-price">Php <?php echo $price; ?></p>
				<p class="food-detail">
					<?php echo $description; ?>
				</p>
				<br>

				<a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order</a>
			</div>
		</div>

			<?php
		}
	}
	else
	{
		echo "<div class='error'> Food not Available </div>";
	}

	?>
		

			<div class="clearfix"></div>

		</div>
	</section>
	<!-- Food Menu Section Ends Here -->

	<!-- Social Section Starts Here -->
	
	<?php include('partials-front/footer.php') ?>