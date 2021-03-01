<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('adminBrands',
            ['brands'=>$brands]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the form
        return view('addBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //capture data form
        $brName =$request->brName;
        //validation
        $this->validateBrand($request);
        //instantiate a new object
        $Brand = new Brand;
        //assign properties, attributes and save
        $Brand->brName = $brName;
        $Brand->save();
        //return a query + message
        return redirect('/adminBrands')
                ->with(
                    [
                        'message'=>'Brand: '.$brName.' added correctly.'
                    ]
                );
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
        $Brand = Brand::find($id);
        //return view and data
        return view('/modifyBrand', ['Brand'=>$Brand]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //capture data form
        $brName =$request->brName;
        //validation
        $this->validateBrand($request);
        //instantiate the object to modify
        $Brand = Brand::find($request->idBrand);
        //assign attribute
        $Brand->brName = $brName;
        //save
        $Brand->save();
        //return a query + message
        return redirect('/adminBrands')
            ->with(
                [
                    'message'=>'Brand: '.$brName.' modified correctly.'
                ]
            );
    }

    /**
     * @param Request $request
     */
    private function validateBrand(Request $request): void
    {
        $request->validate(
            [
                'brName' => 'required|min:2|max:50'
            ],
            [
                'brName.required' => 'The field "Brand name" is mandatory.',
                'brName.min' => 'The "Brand name" field must have at least 2 characters.',
                'brName.max' => 'The "Brand name" field must have a maximum of 50 characters.'
            ]
        );
    }

    public function confirmDelete($id)
    {
        //instantiate the object to delete
        $Brand = Brand::find($id);
        return view('deleteBrand',
            [
                'Brand'=>$Brand
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
        //delete brand by Id
        $Brand = Brand::find($request->idBrand);
        $Brand->delete();
        //return a query + message
        return redirect('/adminBrands')
            ->with('message', 'Brand: '. $request->brName. ' deleted correctly');
    }

}
