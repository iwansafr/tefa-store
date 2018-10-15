$(document).ready(function(){
	function tot_cart(){
		$.ajax({
	 		url: _URL+'p-c/total_cart',
	 		type: 'POST',
	 		dataType: 'json',
		 	success: function(d){
		 		var t = new Intl.NumberFormat('de-DE').format(d);
		 		$('#total_cart').text('total : Rp. '+t);
		 	}
	 	});
	}
	$(document).on('change','#p_sort', function(){
		var s = $(this).val();
		window.location = s;
	});
 $(document).on('submit','form[name=add_cart]',function(e){
 	e.preventDefault();
 	var data = $(this).serializeArray();
 	$.ajax({
 		url: _URL+'p-c/add_cart',
 		type: 'POST',
 		dataType: 'json',
 		data: {data: data},
	 	success: function(d){
	 		if(d.status){
	 			alert(d.msg);
	 			if(d.add_qty){
	 				console.log(d);
	 				$('#qty_p_'+d.p_id).val(d.data[d.p_id].qty);
	 			}else if(d.add_product){
	 				$('#cart_body').append("<div id='product_cart_"+d.p_id+"'><div class='col-xs-12'>	<div class='col-xs-4'>		<img src='"+d.data[d.p_id].image+"' width='50'>	</div>	<div class='col-xs-8'>		<div class='col-md-8'>			"+d.data[d.p_id].title+"		</div>		<div class='col-md-2'>			<input type='number' id='qty_p_"+d.p_id+"' name='cart["+d.p_id+"][qty]' min='1' max='"+d.data[d.p_id].stock+"' class='form-control' value='"+d.data[d.p_id].qty+"'>			<input type='hidden' name='cart["+d.p_id+"][p_id]' value='"+d.p_id+"'>		</div>		<div class='col-md-2'>			Rp. "+ new Intl.NumberFormat('de-DE').format(d.data[d.p_id].price)+"			<button class='btn btn-danger btn-xs del_cart' id='"+d.p_id+"'>x</button>		</div>	</div></div><div class='clearfix'></div><hr></div>");
	 			}
	 			tot_cart();
	 		}else{
	 			alert(d.msg);
	 		}
	 	}
 	});
 });
 $(document).on('change','input[type=number]',function(){
 	var id = $(this).attr('id');
 	id = id.replace(/qty_p_/i, '');
 	var qty = $(this).val();
 	if(id>0){
		 $.ajax({
	 		url: _URL+'p-c/ch_qty',
	 		type: 'POST',
	 		dataType: 'json',
	 		data: {id: id,qty: qty},
		 	success: function(d){
		 		if(d.status){
			 		tot_cart();
		 		}
		 	}
	 	});

 	}
 });
 $(document).on('click', '.del_cart', function(e){
 	e.preventDefault();
 	var id = $(this).attr('id');
 	if(id>0){
 		$.ajax({
	 		url: _URL+'p-c/del_cart',
	 		type: 'POST',
	 		dataType: 'json',
	 		data: {id: id},
		 	success: function(d){
		 		if(d.status){
		 			$('#product_cart_'+id).remove();
		 			tot_cart();
		 		}else{
		 			alert(d.msg);
		 		}
		 	}
	 	});
 	}
 });
});