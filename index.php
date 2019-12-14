<?php
	include_once 'inc/Database.php';
	include_once 'inc/HTMLGenerator.php';
	include 'inc/head.php';
	$db = new Database();
	$htmler = new HTMLGenerator(20,70);
?>
<main>
	<!--HEADER-->
	<header>
		<div class='container-fluid jumbotron text-center'>
			<h1>Shawpify</h1>
			<p>Offering a wide range of products from consumer electronics to cars!</p>
			<?php
				if(isset($_SESSION['firstName'])) {
					echo '<p>Welcome back, '.$_SESSION['firstName'].'!</p>';
				}
				else {
					echo '<p>Offering a wide range of products from consumer electronics to cars</p>';
				}
			?>
		</div>
	</header>

	<div class='container'>
		<div class='row'>
			<div class='col-md-3'><!--SECONDARY NAV MENU - COULD ANOTHER TAG BE USED INSTEAD OF DIV HERE? -->
				<p class='lead'>Product Range</p>
				<div class='list-group'>
					<?php
						$sql = 'SELECT `name` FROM `category`';
						$categories = $db->select($sql);
						foreach($categories as $category){
							echo "<a href='index.php?category={$category['name']}' class='list-group-item'>{$categoroy['name']}</a>";
						}
					?>
				</div>
			</div>
			<div class='col-md-9'><!--PRIMARY INFORMATION ON PAGE - UPGRADE TO HTML5 -->

			<!--Carousel of images based on featured products-->
<!-- 			
			<?php
					// $sql = "SELECT `images`.`source`, `alt_text`,`product`.`name`, `product`.`id` FROM `images`
					// INNER JOIN `product_image` ON `images`.`id`=`product_image`.`image_id`
					// INNER JOIN `product` ON `product`.`id`=`product_image`.`product_id` 
					// WHERE `product`.`feature`='1' AND `image`.`priority`=0
					// LIMIT 8 OFFSET 0";
					// $images = $db->select($sql);
					// echo $htmler->imageCarousel($images);
			?>
			 -->
				<div class='carousel-holder'>
					<div id='carousel-generic' class='carousel slide' data-ride='carousel'>
						<ol class='carousel-indicators'>
							<li data-target='#carousel-generic' data-slide-to='0' class='active'></li>
							<li data-target='#carousel' data-slide-to='1'></li>
							<li data-target='#carousel' data-slide-to='2'></li>
						</ol>
						<div class='carousel-inner'>
							<!-- IMG SOURCE FOR SLIDER -->
							<div class='item active'>
								<img class='slide-image' src='img/car1.jpg' alt=''>
							</div>
							<div class='item'>
								<img class='slide-image' src='img/car2.jpg' alt=''>
							</div>
							<div class='item'>
								<img class='slide-image' src='img/car3.jpg' alt=''>
							</div>
						</div> 
						<!--ACTION FOR SLIDER-->
						<a class='left carousel-control' href='#carousel-generic' data-slide='prev'>
							<span class='glyphicon glyphicon-chevron-left'></span>
						</a>
						<a class='right carousel-control' href='#carousel' data-slide='next'>
							<span class='glyphicon glyphicon-chevron-right'></span>
						</a>
					</div>
				</div> 

				<!--Product Thumbnail Set-->
				<?php
					$sql = "SELECT `product`.`id`,`product`.`name`, `price`,`description` FROM `product`";
						if(isset($_GET['category'])){
							$sql .=" INNER JOIN `product_category` ON `product`.`id`=`product_category`.`product_id`
							INNER JOIN `category` ON `category`.`id`=`product_category`.`category_id` 
							WHERE `category`.`name`='{$_GET['category']}'";
						}
						$sql .=" ORDER BY `stock` DESC LIMIT 6 OFFSET 0";
						$products = $db->select($sql);
						echo $htmler->productThumbnailSet($products);
				?>
				<nav class="text-center" aria-label="...">
					<ul class="pagination pagination-lg">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
					<!--
					<div class='col-sm-4 col-lg-4 col-md-4'>
						<div class='thumbnail'>
							<img src='http://placehold.it/320x150' alt=''>
							<div class='caption'>
								<h4 class='pull-right'>$24.99</h4>
								<h4><a href='inc/productimages.php'>First Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class='ratings'>
								<p class='pull-right'>15 reviews</p>
								<p>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
								</p>
							</div>
						</div>
					</div>

					<div class='col-sm-4 col-lg-4 col-md-4'>
						<div class='thumbnail'>
							<img src='http://placehold.it/320x150' alt=''>
							<div class='caption'>
								<h4 class='pull-right'>$64.99</h4>
								<h4><a href='inc/productimages.php'>Second Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class='ratings'>
								<p class='pull-right'>12 reviews</p>
								<p>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star-empty'></span>
								</p>
							</div>
						</div>
					</div>

					<div class='col-sm-4 col-lg-4 col-md-4'>
						<div class='thumbnail'>


							<img src='http://placehold.it/320x150' alt=''>
							<div class='caption'>
								<h4 class='pull-right'>$74.99</h4>
								<h4><a href='inc/productimages.php'>Third Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class='ratings'>
								<p class='pull-right'>31 reviews</p>
								<p>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star-empty'></span>
								</p>
							</div>
						</div>
					</div>

					<div class='col-sm-4 col-lg-4 col-md-4'>
						<div class='thumbnail'>
							<img src='http://placehold.it/320x150' alt=''>
							<div class='caption'>
								<h4 class='pull-right'>$84.99</h4>
								<h4><a href='inc/productimages.php'>Fourth Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class='ratings'>
								<p class='pull-right'>6 reviews</p>
								<p>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star-empty'></span>
									<span class='glyphicon glyphicon-star-empty'></span>
								</p>
							</div>
						</div>
					</div>

					<div class='col-sm-4 col-lg-4 col-md-4'>
						<div class='thumbnail'>
							<img src='http://placehold.it/320x150' alt=''>
							<div class='caption'>
								<h4 class='pull-right'>$94.99</h4>
								<h4><a href='inc/productimages.php'>Fifth Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class='ratings'>
								<p class='pull-right'>18 reviews</p>
								<p>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star-empty'></span>
								</p>
							</div>
						</div>
					</div>

					<div class='col-sm-4 col-lg-4 col-md-4'>
						<div class='thumbnail'>
							<img src='http://placehold.it/320x150' alt=''>
							<div class='caption'>
								<h4 class='pull-right'>$74.99</h4>
								<h4><a href='inc/productimages.php'>Sixth Product</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<div class='ratings'>
								<p class='pull-right'>31 reviews</p>
								<p>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star'></span>
									<span class='glyphicon glyphicon-star-empty'></span>
								</p>
							</div>
						</div>
					</div>
					<div class='text-center'>
						<nav aria-label='Page navigation'>
							<ul class='pagination'>
								<li>
									<a href='#' aria-label='Previous'>
										<span aria-hidden='true'>&laquo;</span>
									</a>
								</li>
								<li><a href='#'>1</a></li>
								<li><a href='#'>2</a></li>
								<li><a href='#'>3</a></li>
								<li><a href='#'>4</a></li>
								<li><a href='#'>5</a></li>
								<li>
									<a href='#' aria-label='Next'>
										<span aria-hidden='true'>&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>-->
				</div>
			</div>
		</div>
</main>
	<!--FOOTER-->
	<?php include 'inc/foot.php'; ?>
