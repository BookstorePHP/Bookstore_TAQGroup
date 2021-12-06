<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    public function all_category_product(){
        return view('admin.product.all_category');
    }
}
