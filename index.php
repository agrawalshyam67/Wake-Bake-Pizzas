<?php 

	include('config/db_connect.php');

	// query all pizzas
	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

	// get all pizzas
	$result = mysqli_query($conn, $sql);

	//fetching resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); 

	mysqli_free_result($result); // free memory
	mysqli_close($conn); // close connection
	
	
 ?>

 <!DOCTYPE html>
 <html>
 
 <?php include('templates/header.php'); ?>

 	<h4 class="center grey-text">Wake & Bake Pizzas!</h4>

 	<div class="container">
 		<div class="row">
 			<?php foreach ($pizzas as $pizza): ?>
 				<div class="col s6 md3">
					<div class="card z-depth-0">
						<img src="img/pizza.svg" class="pizza">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul>
								<?php foreach (explode(',', $pizza['ingredients']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>	
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
						</div>
					</div> 					
 				</div>
 			<?php endforeach; ?>
 			<?php if(count($pizzas) >= 3): ?>
 				<p>There are 3 or more pizzas</p>
 			<?php else: ?>
 				<p>There are less then 3 pizzas</p>
 			<?php endif; ?>
 		</div>
 	</div>

 <?php include('templates/footer.php'); ?>
 	
 
 </html>