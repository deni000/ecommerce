<?php
require('top.inc.php');
isAdmin();
$color='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from color_master where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$color=$row['color'];
	}else{
		redirect('color.php');
	}
}

if(isset($_POST['submit'])){
	$color=get_safe_value($con,$_POST['color']);
	$res=mysqli_query($con,"select * from color_master where color='$color'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Color already exist";
			}
		}else{
			$msg="Color already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update color_master set color='$color' where id='$id'");
		}else{
			mysqli_query($con,"insert into color_master(color,status) values('$color','1')");
		}
		redirect('color.php');
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="color" class=" form-control-label">Color</label>
									<input type="text" name="color" placeholder="Enter color name" class="form-control" required value="<?php echo $color?>">
								</div>
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>