<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Traits\UploadImageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

//use App\Components\Recusive;
class ControllerCategory extends Controller
{
    use UploadImageTrait;
    function __construct(Category  $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }

    function index(){
        $limit = 10;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        $key = "";
        if(isset($_GET['ten-danh-muc'])) $key = $_GET['ten-danh-muc'];

        $categories = $this->category->where('category_name','LIKE','%'.$key.'%')->paginate($limit)->appends(request()->query());
        return view("admin.category.index",compact('categories','limit','key'));
    }

    function  create(){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $html_option_category = $recusive->categoryRecusive();
        return view('admin.category.add',compact('html_option_category'));
    }

    function insert(Request  $request){
        $dataFile = $this->updateFileImage($request,'image','public/images/cateogry');
        $image_name = $dataFile?$dataFile['final_name']:"";

        $data_new_category = [
            'category_name'=> $request->category_name,
            'id_parent' => $request->id_parent,
            'category_image'=> $image_name,
            'category_slug' => Str::slug($request->category_name),
            'category_image_link' => $dataFile?$dataFile['file_path']:""
        ];
        $this->category->create($data_new_category);
        return redirect()->route('admin.category.index');
    }


}


