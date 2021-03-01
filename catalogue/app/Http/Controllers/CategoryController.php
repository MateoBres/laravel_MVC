<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('adminCategories',
            ['categories'=>$categories]
        );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addCategory');
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
        $catName = $request->catName;
        //validation
        $this->validateCategory($request);
        //instantiate a new object
        $Category = new Category;
        //assign attribute and save
        $Category->catName = $catName;
        $Category->save();
        //return a query + message
        return redirect('/adminCategories')
                            ->with(
                                ['message'=>'Category: '.$catName.' added correctly.']
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
        $Category = Category::find($id);
        //return view and data
        return view('/modifyCategory', ['Category'=>$Category]);
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
        //capture data form
        $catName = $request->catName;
        //validation
        $this->validateCategory($request);
        //instantiate the object to modify
        $Category = Category::find($request->idCategory);
        //assign attribute
        $Category->catName = $catName;
        //save
        $Category->save();
        //return a query + message
        return redirect('/adminCategories')->with(
                            ['message'=>'Category: '.$catName.' modified correctly']
                        );
    }

    private function validateCategory(Request $request): void
    {
        $request->validate(
            [
                'catName' => 'required|min:2|max:50'
            ],
            [
                'catName.required' => 'The "Category name" field is mandatory',
                'catName.min' => 'The "Category name" field must have at least 2 characters',
                'catName.max' => 'The "Category name" field must have a maximum of 50 characters'
            ]
        );
    }

    public function confirmDelete($id)
    {
        //instantiate the object to delete
        $Category = Category::find($id);
        return view('deleteCategory',
            [
                'Category'=>$Category
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
        //delete category by Id
        $Category = Category::find($request->idCategory);
        $Category->delete();
        //return a query + message
        return redirect('/adminCategories')
            ->with('message', 'Category: '. $request->catName. ' deleted correctly');
    }

}
