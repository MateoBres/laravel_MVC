<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('relBrand', 'relCategory')->paginate(3);
        return view('adminProducts',
            ['products'=>$products]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //data for the select input
        $brands = Brand::orderBy('brName')->get();
        $categories = Category::orderBy('catName')->get();
        return view('/addProduct', ['brands'=>$brands, 'categories'=>$categories]);
    }

    private function validateProduct(Request $request)
    {
        $request->validate(
            [
                'prdName'=>'required|min:2|max:70',
                'prdPrice'=>'required|numeric|min:0',
                'prdDetail'=>'required|min:3|max:250',
                'prdStock'=>'required|integer|min:0',
                'prdImage'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'prdName.required'=>'The "Name" field is mandatory.',
                'prdName.min'=>'The "Name" field must have at least 2 characters.',
                'prdName.max'=>'The "Name" field must have a maximum of 50 characters.',
                'prdPrice.required'=>'The "Price" field is mandatory.',
                'prdPrice.numeric'=>'Fill in the "Price" field with a number',
                'prdPrice.min'=>'Fill in the "Price" field with a positive number',
                'prdDetail.required'=>'The "Detail" field is mandatory',
                'prdDetail.min'=>'Fill in the "Detail" field with at least 3 characters',
                'prdDetail.max'=>'The "Detail" field must have a maximum of 250 characters',
                'prdStock.required'=>'The "Stock" field is mandatory',
                'prdStock.integer'=>'Fill the "Stock" field with an integer',
                'prdStock.min'=>'Fill in the "Stock" field with a positive number',
                'prdImage.mimes'=>'It must be an image',
                'prdImage.max'=>'Must be a maximum 2MB image'
            ]
        );
    }

    private function uploadImage(Request $request)
    {
        //default value
        $prdImage = 'notAvailable.jpg';

        //file sent on update form
        if($request->has('currImage')){
            $prdImage = $request->currImage;
        }
        //if the file is sent
        if( $request->file('prdImage')){
            //rename file
            # time() . extension
            $ext = $request->file('prdImage')->extension();
            $prdImage = time().'.'.$ext;
            //upload image
            $request
                ->file('prdImage')
                ->move( public_path('products/'), $prdImage );
        }

        return $prdImage;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validateProduct($request);
        //upload image
        $prdImage = $this->uploadImage($request);
        //instantiate new object
        $Product = new Product;
        //assign values
        $Product->prdName = $request->prdName;
        $Product->prdPrice = $request->prdPrice;
        $Product->idBrand = $request->idBrand;
        $Product->idCategory = $request->idCategory;
        $Product->prdDetail = $request->prdDetail;
        $Product->prdStock = $request->prdStock;
        $Product->prdImage = $prdImage;
        //save data
        $Product->save();
        //return query + message
        return redirect('/adminProducts')
                ->with('message', 'Product: '. $request->prdName. ' added correctly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //instantiate the record to modify
        $Product = Product::with('relBrand', 'relCategory')->find($id);
        //data for the select input
        $brands = Brand::orderBy('brName')->get();
        $categories = Category::orderBy('catName')->get();

        //return view and data
        return view('/modifyProduct',
                    [
                        'Product'=>$Product,
                        'brands'=>$brands,
                        'categories'=>$categories
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validation
        $this->validateProduct($request);
        //upload image
        $prdImage = $this->uploadImage($request);
        //instantiate the object to modify
        $Product = Product::find($request->idProduct);
        //assign values
        $Product->prdName = $request->prdName;
        $Product->prdPrice = $request->prdPrice;
        $Product->idBrand = $request->idBrand;
        $Product->idCategory = $request->idCategory;
        $Product->prdDetail = $request->prdDetail;
        $Product->prdStock = $request->prdStock;
        $Product->prdImage = $prdImage;
        //save data
        $Product->save();
        //return a query + message
        return redirect('/adminProducts')
                ->with('message', 'Product: '. $request->prdName. ' modified correctly');
    }

    public function confirmDelete($id)
    {
        //instantiate the object to delete
        $Product = Product::with('relBrand', 'relCategory')
            ->find($id);
        return view('deleteProduct',
            [
                'Product'=>$Product
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //$prdName = $request->prdName;
        //delete product by Id
        $Product = Product::find($request->idProduct);
        $Product->delete();
        //return a query + message
        return redirect('/adminProducts')
            ->with('message', 'Product: '. $request->prdName. ' deleted correctly');
    }
}
