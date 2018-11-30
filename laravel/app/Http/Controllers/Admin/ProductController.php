<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use App\Helpers\Permissions\Permissions;


class ProductController extends Controller
{
    public function index(Request $request){
        $check = Permissions::checkPermisison(config('permission.product.view'));
        if (!$check) {
            return view('notify', ['content' => 'Danh sách sản phẩm']);
        }
        $listProduct = Product::orderBy('id','desc');

        if($request->title !=  null){
            $listProduct = $listProduct->where('title','like','%'.$request->title.'%');
        }
        $listProduct = $listProduct->paginate(8);
        return view('admin.products.index', ['products' => $listProduct, 'title'=>$request->title]);
    }

    public function edit($id){
        $check = Permissions::checkPermisison(config('permission.product.edit'));
        if (!$check) {
            return view('notify', ['content' => 'Sửa sản phẩm']);
        }
        return view('admin.products.edit', ['product' => Product::find($id)]);
    }

    public function detail($id){
        return view('admin.products.detail', ['product' => Product::find($id)]);
    }

    public function add(){
        $check = Permissions::checkPermisison(config('permission.product.add'));
        if (!$check) {
            return view('notify', ['content' => 'Thêm sản phẩm']);
        }
        return view('admin.products.add');
    }

    public function insert(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->content = $request->contents;
        $product->photo = $request->photo;
        $product->status = $request->status;
        $product->save();
        return redirect(route('admin.products'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->content = $request->editor;
        $product->photo = $request->photo;
        $product->status = $request->status;
        $product->save();
        return redirect(route('admin.products'));
    }

    //change status of product
    public function active(Request $request)
    {
        $id = $request->users_id;
        $product = Product::find($id);
        if ($product->status == 1) {
            $product->status = 0;
            $product->save();
            $check = 0;
        } else {
            $product->status = 1;
            $product->save();
            $check = 1;
        }
        $succes = new MessageBag(['success' => 'Change Success']);
        return response()->json([
            'error' => false,
            'message' => $succes,
            'status' => $check,
        ], 200);
    }

    public function getUrlPhoto(Request $request)
    {
        $data = $request->post_image;
        $filenameWithExt = $data->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $data->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        $data_image = file_get_contents($data);

        $s3 = \Storage::disk('s3');
        $filePath = 'image-product/' . $fileNameToStore;
        $s3->put($filePath, $data_image, 'public');
        $url = \Storage::cloud()->url($filePath);
        return response()->json([
            'url' => $url,
        ], 200);
    }
}
