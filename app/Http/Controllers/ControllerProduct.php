<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Traits\HelperTrait;
use App\Traits\PaginationPageTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ControllerProduct extends Controller
{
    use UploadImageTrait;
    use PaginationPageTrait;
    use HelperTrait;
    private  $category;
    private  $product;
    private  $imageProduct;
    function __construct(Product $product, Category $category , ImageProduct $imageProduct)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->category = $category;
        $this->imageProduct = $imageProduct;
    }
    function index(){

        $key = "";
        if(isset($_GET['ten-san-pham'])) $key = $_GET['ten-san-pham'];

        $pagination = $this->pagination();
        $limit = $pagination['limit'];
        $page = $pagination['page'];

        $products = $this->product->where('product_name','LIKE','%'.$key.'%')->paginate($limit)->appends(request()->query());
//        dd($products);
        return view("admin.product.index",compact('products','limit','key', 'page'));
    }

    function  create(){
        $html_option_category = $this->getHtmlCategory();
        return view('admin.product.add',compact('html_option_category'));
    }
    public  function  getHtmlCategory($id_parent = null){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $html_option_category = $recusive->categoryRecusive($id_parent);
        return $html_option_category;
    }
    //
    function  insert(Request  $request){
        try{
            DB::beginTransaction();
            $dataCreate = [
                'category_id' => $request->category_id,
                'product_seo_image' => $request->product_seo_image,
                'product_seo_title' => $request ->product_seo_title,
                'product_name' => $request ->product_name,
                'product_slug' => Str::slug($request->product_name),
                'product_title_content' => $request ->product_title_content,
                'product_content' => $request ->product_content,
                'product_price' => $this->tryParseInt($request ->product_price),
                'product_import_price' => $this->tryParseInt($request ->product_import_price),
                'product_vat' => $this->tryParseInt($request ->product_vat),
                'product_tradiscount' => $this->tryParseInt($request ->product_tradiscount),
                'product_price_fake' => $this->tryParseInt($request ->product_price_fake),
                'product_part' => $this->tryParseInt($request ->product_part) // part th?????ng cho nh??n vi??)n
            ];
            $newInsert = $this->product->create($dataCreate);

            if($request->hasFile('image_product')){
                $arrayImage = $this->updateFileMutipleImage($request->image_product, 'public/images/product');

                foreach ($arrayImage as $image){
                    $newInsert->images_relationship()->create([
                        'image_path'=>$image['file_path'],
                        'image_name'=>$image['final_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with('success','Th??m m???i th??nh c??ng');
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.product.add')->with('error','T??n s???n ph???m ???? t???n t???i');
        }
    }

    function edit ($id){

        $product = $this->product->find($id);
        $html_option_category = $this->getHtmlCategory($product->category_id);
//        dd($product);
        return view('admin.product.edit',compact('html_option_category', 'product'));
    }
    function update ($id, Request $request){

        try{
            DB::beginTransaction();
            $dataCreate = [
                'category_id' => $request->category_id,
                'product_seo_image' => $request->product_seo_image,
                'product_seo_title' => $request ->product_seo_title,
                'product_name' => $request ->product_name,
                'product_slug' => Str::slug($request->product_name),
                'product_title_content' => $request ->product_title_content,
                'product_content' => $request ->product_content,
                'product_price' => $this->tryParseInt($request ->product_price),
                'product_import_price' => $this->tryParseInt($request ->product_import_price),
                'product_vat' => $this->tryParseInt($request ->product_vat),
                'product_tradiscount' => $this->tryParseInt($request ->product_tradiscount),
                'product_price_fake' => $this->tryParseInt($request ->product_price_fake),
                'product_part' => $this->tryParseInt($request ->product_part) // part th?????ng cho nh??n vi??)n
            ];
            $newInsert = $this->product->find($id)->update($dataCreate);
            DB::commit();
            return redirect()->route('admin.product.index')->with('success','C???p nh???p s???n ph???m th??nh c??ng');
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.product.add')->with('error','T??n s???n ph???m ???? t???n t???i');
        }
    }
}
