<?php
require('connection.inc.php');
require('functions.inc.php');

$c_s_id=get_safe_value($con,$_POST['c_s_id']);
$pid=get_safe_value($con,$_POST['pid']);
$type=get_safe_value($con,$_POST['type']);

if($type=='color'){
	$resAttr=mysqli_query($con,"select product_attributes.size_id,size_master.size from product_attributes,size_master where product_attributes.product_id='$pid' and product_attributes.color_id=$c_s_id and size_master.id=product_attributes.size_id and size_master.status=1 order by size_master.order_by asc");
	$html='';
	if(mysqli_num_rows($resAttr)>0){
		while($rowAttr=mysqli_fetch_assoc($resAttr)){
			$html.="<option value='".$rowAttr['size_id']."'>".$rowAttr['size']."</option>";
			
		}
	}
	echo $html;
	
}

?>