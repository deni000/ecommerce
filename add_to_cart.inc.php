<?php
class add_to_cart{
	function addProduct($pid,$qty,$attr_id){
		$_SESSION['cart'][$pid][$attr_id]['qty']=$qty;
	}
	
	function updateProduct($pid,$qty,$attr_id){
		if(isset($_SESSION['cart'][$pid][$attr_id])){
			$_SESSION['cart'][$pid][$attr_id]['qty']=$qty;
		}
	}
	
	function removeProduct($pid,$attr_id){
		if(isset($_SESSION['cart'][$pid][$attr_id])){
			unset($_SESSION['cart'][$pid][$attr_id]);
		}
	}
	
	function emptyProduct(){
		unset($_SESSION['cart']);
	}
	
	function totalProduct(){
		if(isset($_SESSION['cart'])){
			//return count($_SESSION['cart']);
			$totalCount=0;
			foreach($_SESSION['cart'] as $list){
				$totalCount=$totalCount+count($list);
			}
			return $totalCount;
		}else{
			return 0;
		}
		
	}

}
?>