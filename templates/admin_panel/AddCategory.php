<?php

include ('top.php');

$msg="";
$category="";
$description="";
$id="";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=getSafeVal( $_GET['id'] ) ;


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from category where id='$id' ") );
	$category=$row['name'];
	$description=$row['description'];

}


if (isset($_POST['submit'])) {
	$category=getSafeVal( $_POST['category'] ) ;
	$description=getSafeVal( $_POST['description'] ) ;
 

	if($id==""){
		//here id is blank means admin wants to add new category
		$sql="select * from category where name='$category' ";

	}
	else{
		//here id is set means admin wants to edit existing category
		$sql="select * from category where name='$category' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Category already exists";

	}
	else{

		//if id is not set then insert new category 
		if($id==""){
			mysqli_query($con,"insert into category(name,description,status) values('$category','$description',1) ");

		}
		else{
			//if id is set then update exsting category
			mysqli_query($con,"update category set name='$category', description='$description' where id='$id'  ");
		}
		redirect(SITE_PATH.'templates/admin_panel/listCategory');
		
	}
	
}






?>
 


			<main class="content">
				<div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add Package Catogery</strong></h1>

					
					<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
						<div class="card flex-fill w-100">
						<main class="content">
			
					<?php 
					if(strlen( $msg ) > 0){
					?>
					<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
					<?php
						}

					?>
					<form method="post">
				

					 	<div class="row">
								    <div class="col-sm-12 mb-3">
										<h5>Category Name</h5>
								     	<!-- <label for="catName" class="form-label"></label> -->
								     	<input type="text" class="form-control" id="catName" name="category" required autocomplete="off" value="<?php echo $category; ?>"/>
								      		
								    </div>
						</div>

						<div class="row">
								    <div class="col-sm-12 mb-3">
									<h5>Description of Category</h5>
							           <textarea class="form-control" rows="3" id="catDesc" name="description" autocomplete="off"  > <?php echo $description; ?> </textarea>
								      		
								    </div>
						</div>
						<input type="submit" name="submit" class="btn btn-success" value="Submit">
					</form>

					</main>
							
						</div>
					</div>


                </div>
			</main>

      <?php

        include 'footer.php';
      ?>
