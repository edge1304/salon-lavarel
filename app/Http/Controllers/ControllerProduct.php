<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\PaginationPageTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    use UploadImageTrait;
    use PaginationPageTrait;
    function __construct(Product  $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }
    function index(){

        $key = "";
        if(isset($_GET['ten-san-pham'])) $key = $_GET['ten-san-pham'];

        $pagination = $this->pagination();
        $limit = $pagination['limit'];
        $page = $pagination['page'];

        $products = $this->product->where('product_name','LIKE','%'.$key.'%')->join('categories','products.id_category','=','categories.id')->paginate($limit)->appends(request()->query());
        return view("admin.product.index",compact('products','limit','key', 'page'));
    }

    function  create(){
        $html_option_category = $this->getHtmlCategory();
        return view('admin.product.add',compact('html_option_category'));
    }
    //
}
