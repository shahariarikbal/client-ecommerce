<?php 

use App\Models\Product;

Route::get('/mayday', function(){
	dd(Product::all());
});













 ?>