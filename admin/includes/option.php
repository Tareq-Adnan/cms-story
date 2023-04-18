<div class="col-auto">
	<div class="page-utilities">
		<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
			<div class="col-auto">
				<!-- <form class="docs-search-form row gx-1 align-items-center" method="post">
					<input type="hidden" value="">
					<div class="col-auto">
						<button type="submit" name="filterPost" class="btn app-btn-secondary">Filter</button>
					</div>
				</form> -->

			</div><!--//col-->
			<!-- <div class="col-auto">

			<?php
				$query="SELECT * FROM users WHERE user_type='user'";
				$run=mysqli_query($connection,$query);
				confirmation($run);
			?>
				<select class="form-select w-auto">
					<?php while($data=mysqli_fetch_assoc($run)){?>

						<option selected="" value="<?php echo $data['user_id'] ?>"><?php echo $data['first_name']; ?></option>
					<?php } ?>
				
				</select>
			</div> -->
			<div class="col-auto">
				<a class="btn app-btn-primary" href="../add-post.php">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
						<path
							d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
						<path
							d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
					</svg>
					ADD POST</a>
			</div>
		</div><!--//row-->
	</div><!--//table-utilities-->
</div><!--//col-auto-->
</div><!--//row-->