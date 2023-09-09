<?php

include ('top.php');

$sql="select package.*,category.name from package,category  where package.packageType=category.id";
$res=mysqli_query($con,$sql);

?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Travel Packages</h1>
					</div>
					<hr>

				<div class="container table-responsive">

					<table class="table table-striped   table-hover  table-sm pt-3" id="dttable">
					<thead class="table-primary">
						<tr>

						<th scope="col">Sr No.</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col" width="10%">Photo</th>
						<th scope="col">Price</th>
						<th scope="col">Discount</th>
						<th scope="col">Category</th>
						<th scope="col" width="20%">Actions</th>

						</tr>
					</thead>
					<tbody>
					<?php  

							if(mysqli_num_rows($res) > 0){
								$i=1;
								while( $row=mysqli_fetch_assoc($res) ){

						?>

						
						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col" > <?php  echo $row['packageName']; ?></td>
						<td scope="col" > <?php  echo $row['packageDesc']; ?></td>
						<td scope="col" width="20%" > <a target="_blank" href="<?php  echo SITE_PACKAGE_IMAGE.$row['packagePhoto']; ?>"> <img class="img-fluid" src="<?php  echo SITE_PACKAGE_IMAGE.$row['packagePhoto']; ?>" > </a> </td>

						<td scope="col" > <?php  echo $row['packagePrice']; ?></td>
						<td scope="col" > <?php  echo $row['discount']; if($row['disType']=='cash'){
							echo "&#8377;";}if($row['disType']=='per'){echo "%";} ?></td>
						<td scope="col" > <?php  echo $row['name']; ?></td>
						<td scope="col" >

							<a href="<?php echo SITE_PATH.'templates/admin_panel/'; ?>AddElement/<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
							
							<a href="?id=<?php echo $row['id']; ?>&type=delete "> <button class="btn btn-danger btn-sm">Delete</button> </a>


						</td>
						</tr>


						<?php
								$i++;

								}
							}
							else{
							?>
							<td colspan="4">Data not found</td>

							<?php

							}

						?>
					</tbody>

					</table>


				</div>
					
				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
		

		<?php

			if( isset($_GET['type']) && $_GET['type']!==' '  &&  isset($_GET['id']) && $_GET['id'] > 0  )
			{

				$type=$_GET['type'];
				$id=$_GET['id'];

				if( $type == 'delete')
				{
					 mysqli_query($con,"delete from package where id='$id' ");
					 redirect(SITE_PATH.'templates/admin_panel/ListElement');

				}




			}

?>
