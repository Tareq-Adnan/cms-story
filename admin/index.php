<?php include 'includes/admin_header.php' ?>
<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Overview</h1>
			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3">Welcome,
							<?php echo $_SESSION['username'] ?>!
						</h3>
						<hr>
						<p>To the admin panel</p>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div><!--//app-card-body-->
				</div><!--//inner-->
			</div><!--//app-card-->

			<div class="row g-4 mb-4">
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100">
						<div class="app-card-body p-3 p-lg-4">
							<?php
							
							//Showing total registered users Number
							$query = "SELECT * FROM users";
							$run = mysqli_query($connection, $query);
							confirmation($run);
							$num = mysqli_num_rows($run);

							?>
							<h4 class="stats-type mb-1">Total users</h4>
							<div class="stats-figure">
								<?php echo $num ?>
							</div>
							<div class="stats-meta text-success">
								<hr>
							</div>
						</div><!--//app-card-body-->
						<a class="app-card-link-mask" href="#"></a>
					</div><!--//app-card-->
				</div><!--//col-->

				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">TOTAL STORY</h4>
							<?php

							//Showing total post Number
							$query = "SELECT * FROM posts";
							$run = mysqli_query($connection, $query);
							confirmation($run);
							$num = mysqli_num_rows($run);

							?>
							<div class="stats-figure">
								<?php echo $num ?>
							</div>
							<hr>
						</div><!--//app-card-body-->
						<a class="app-card-link-mask" href="#"></a>
					</div><!--//app-card-->
				</div><!--//col-->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100">
						<div class="app-card-body p-3 p-lg-4">
							<h4 class="stats-type mb-1">Pending Users</h4>
							<?php
								//Showing total pending users Number
							$query = "SELECT * FROM users WHERE status='pending'";
							$run = mysqli_query($connection, $query);
							confirmation($run);
							$num = mysqli_num_rows($run);

							?>
							<div class="stats-figure">
								<?php echo $num ?>
							</div>
							<hr>
						</div><!--//app-card-body-->
						<a class="app-card-link-mask" href="#"></a>
					</div><!--//app-card-->
				</div><!--//col-->
				<div class="col-6 col-lg-3">
					<div class="app-card app-card-stat shadow-sm h-100">
						<div class="app-card-body p-3 p-lg-4">
							<?php
							//Showing total pending posts Number
							$query = "SELECT * FROM posts WHERE post_status='pending'";
							$run = mysqli_query($connection, $query);
							confirmation($run);
							$num = mysqli_num_rows($run);

							?>
							<h4 class="stats-type mb-1">Pending Posts</h4>
							<div class="stats-figure">
								<?php echo $num ?>
							</div>
							<hr>

						</div><!--//app-card-body-->
						<a class="app-card-link-mask" href="#"></a>
					</div><!--//app-card-->
				</div><!--//col-->
			</div><!--//row-->
		</div><!--//app-card-->
	</div><!--//col-->
</div><!--//row-->

</div><!--//container-fluid-->
</div><!--//app-content-->
<?php include 'includes/admin_footer.php' ?>