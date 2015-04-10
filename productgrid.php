<?php
	$grid_size = 4;
	if($grid_size > 0)
	{
		echo "<div class = 'product-grid'>";
			echo "<ul>";
			for ($i = 0; $i < $grid_size; $i++){
				if($i % 3 == 0 && $i > 0){
					echo "</ul>";
					echo "<ul>";
				}
				echo "<li>
							<div>
								<a href = 'serve-product.php'>
								<img src = 'comingsoon.png'/>
								</a>
							</div>
							<div>
								Products are coming soon!
							</div>
					  </li>";
			}
			echo "</ul>";
		echo "</div>";
	}
?>