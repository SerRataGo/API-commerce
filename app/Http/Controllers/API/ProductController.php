<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MultiImage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function AddProduct()
    {
        return "you can return view";
    }
    public function index()
    {
        $product = Product::all();

        return response()->json([
            'status' => 200,
            'products' => $product,
        ]);
    }

    public function ManageProduct()
    {
        //
    }

    public function StoreProduct(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'brand_id'=>'required',
             'category_id'=>'required',
            'sub_category_id'=>'required',
            'product_name_en'=>'required|max:191',
            'product_name_ar'=>'required|max:191',
            'product_code'=>'required|max:20',
            'product_qty'=>'required|max:20',
            'product_tags_en'=>'required|max:20',
            'product_tags_ar'=>'required|max:20',
            'product_size_en'=>'required|max:191',
            'product_size_ar'=>'required|max:191',
            'product_color_en'=>'required|max:191',
            'product_color_ar'=>'required|max:191',
            'selling_price'=>'required|max:20',
            'discount_price'=>'required|max:20',
            'short_description_en'=>'required|max:191',
            'short_description_ar'=>'required|max:191',
            'description_en'=>'required|max:191',
            'description_ar'=>'required|max:191',
            'product_thumbnail'=>'required',
            'hot_deals'=>'required',
            'featured'=>'required',
            'special_offer'=>'required',
            'special_deals'=>'required',
            'digital_file'=>'required',



           'image'=>'required|max:2048|image|mimes:png,jpg,jpeg',


        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
            }
            else {
       $product = new Product ;
       $product->brand_id=$request->input('brand_id');
       $product->category_id=$request->input('category_id');
       $product->sub_category_id=$request->input('sub_category_id');
       $product->product_name_en=$request->input('product_name_en');
       $product->product_name_ar=$request->input('product_name_ar');
       $product->product_code=$request->input('product_code');
       $product->product_qty=$request->input('product_qty');
       $product->product_tags_en=$request->input('product_tags_en');
       $product->product_tags_ar=$request->input('product_tags_ar');
       $product->product_size_en=$request->input('product_size_en');
       $product->product_size_ar=$request->input('product_size_ar');
       $product->product_color_en=$request->input('product_color_en');
       $product->product_color_ar=$request->input('product_color_ar');
       $product->selling_price=$request->input('selling_price');
       $product->discount_price=$request->input('discount_price');
       $product->short_description_en=$request->input('short_description_en');
       $product->short_description_ar=$request->input('short_description_ar');
       $product->description_en=$request->input('description_en');
       $product->description_ar=$request->input('description_ar');
       $product->product_thumbnail=$request->input('product_thumbnail');
       $product->hot_deals=$request->input('hot_deals');
       $product->featured=$request->input('hot_deals');
       $product->special_offer=$request->input('special_offer');
       $product->special_deals=$request->input('special_deals');
       $product->digital_file=$request->input('digital_file');
       $product->status=$request->input('status') == true ? '1':'0';;
       if ($request->hasFile('image')) {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move('uploads/product/', $fileName);

        $product->image = 'uploads/product/' . $fileName;
    };


       $product->save();
       return response()->json([
        'status'=>200,
        'message'=>'product added succesfully'
    ]);
            }
    }
    public function MultiImageUpdate(Request $request)
    {
        if(!$request->hasFile('fileName')) {
            return response()->json(['upload_file_not_found'], 400);
        }
     
        $allowedfileExtension=['pdf','jpg','png'];
        $files = $request->file('fileName'); 
        $errors = [];
     
        foreach ($files as $file) {      
     
            $extension = $file->getClientOriginalExtension();
     
            $check = in_array($extension,$allowedfileExtension);
     
            if($check) {
                foreach($request->fileName as $mediaFiles) {
     
                    $path = $mediaFiles->store('public/product');
                    $name = $mediaFiles->getClientOriginalName();
          
                    //store image file into directory and db
                    $save = new Image();
                    $save->title = $name;
                    $save->path = $path;
                    $save->save();
                }
            } else {
                return response()->json(['invalid_file_format'], 422);
            }
     
            return response()->json(['file_uploaded'], 200);
     
        }

    }

    public function ShowProduct($id)
    {
        $product = Product::all();
        return response()->json([
        'status'=>200,
        'product'=>$product

        ]);
        
    }



    public function EditProduct($id)
    {
        $product = Product::find($id);
    if($product){
        return response()->json([
           'status'=>200,
           'product'=>$product

        ]);
    }
    else {
       return response()->json([
           'status'=>404,
           'message'=>'No category id found'

        ]);

    }
    }


    public function UpdateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'brand_id'=>'required',
            'category_id'=>'required',
           'sub_category_id'=>'required',
           'product_name_en'=>'required|max:191',
           'product_name_ar'=>'required|max:191',
           'product_code'=>'required|max:20',
           'product_qty'=>'required|max:20',
           'product_tags_en'=>'required|max:20',
           'product_tags_ar'=>'required|max:20',
           'product_size_en'=>'required|max:191',
           'product_size_ar'=>'required|max:191',
           'product_color_en'=>'required|max:191',
           'product_color_ar'=>'required|max:191',
           'selling_price'=>'required|max:20',
           'discount_price'=>'required|max:20',
           'short_description_en'=>'required|max:191',
           'short_description_ar'=>'required|max:191',
           'description_en'=>'required|max:191',
           'description_ar'=>'required|max:191',
           'product_thumbnail'=>'required',
           'hot_deals'=>'required',
           'featured'=>'required',
           'special_offer'=>'required',
           'special_deals'=>'required',
           'digital_file'=>'required',
            
    
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
            }
            else {
       $product = Product::find($id) ;
       if($id){
        $product = new Product ;
        $product->brand_id=$request->input('brand_id');
        $product->category_id=$request->input('category_id');
        $product->sub_category_id=$request->input('sub_category_id');
        $product->product_name_en=$request->input('product_name_en');
        $product->product_name_ar=$request->input('product_name_ar');
        $product->product_code=$request->input('product_code');
        $product->product_qty=$request->input('product_qty');
        $product->product_tags_en=$request->input('product_tags_en');
        $product->product_tags_ar=$request->input('product_tags_ar');
        $product->product_size_en=$request->input('product_size_en');
        $product->product_size_ar=$request->input('product_size_ar');
        $product->product_color_en=$request->input('product_color_en');
        $product->product_color_ar=$request->input('product_color_ar');
        $product->selling_price=$request->input('selling_price');
        $product->discount_price=$request->input('discount_price');
        $product->short_description_en=$request->input('short_description_en');
        $product->short_description_ar=$request->input('short_description_ar');
        $product->description_en=$request->input('description_en');
        $product->description_ar=$request->input('description_ar');
        $product->product_thumbnail=$request->input('product_thumbnail');
        $product->hot_deals=$request->input('hot_deals');
        $product->featured=$request->input('hot_deals');
        $product->special_offer=$request->input('special_offer');
        $product->special_deals=$request->input('special_deals');
        $product->digital_file=$request->input('digital_file');
        $product->status=$request->input('status') == true ? '1':'0';
        if ($request->hasFile('image')) {

            $path = $product->image;
            if (File::exists($path)) {

                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/product/', $fileName);

            $product->image = 'uploads/product/' . $fileName;
        }

       $product->update();
       return response()->json([
        'status'=>200,
        'message'=>'product updated succesfully'
    ]);
       }
       else {
        return response()->json([
            'status'=>404,
            'message'=>'No product found'
        ]);
       }
            }
    
    
    
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();

            return response()->json([
                'status'=>200,
                'message'=>'product deleted succesfully'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'product ID not found'
            ]);

        }
    }

    // product Stock
    public function ProductStock()
    {

    }
}
