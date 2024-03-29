<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show data into a blade
        // $data['categories'] = Category::all();
        // return view('backend.category.index', $data);

        $categories = Category::all();
        // return view('backend.category.index', ['categories' => $categories]);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $request->validated();
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'description' => 'required',
        // ],[
        //     'name.required'=>'Name must be provided',
        //     'description.required'=>'Description also be provided'
        // ]);

        // dd($request->all());
        // $data['name']=$request->name;
        // $data['description']=$request->description;
        // Category::create($data);

        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // option: 1
        // $request->session()->flash('success', 'Category Created successful!');
        // option: 2
        // session()->flash('success', 'Category Created successful!');
        // option: 3
        // Session::flash('success', 'Category Created successful!');
        // return redirect()->route('categories.index');
        // option: 4
        return redirect()->route('categories.index')->with('success', 'Category Created successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // option: 1
        // $data['category'] = $category;
        // return view('backend.category.show', $data);

        // option: 2
        // return view('backend.category.show', ['category'=>$category]);

        // option: 3
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // option: 1
        // $data['category'] = $category;
        // return view('backend.category.show', $data);

        // option: 2
        // return view('backend.category.show', ['category'=>$category]);

        // option: 3
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $request->validated();
        // dd($request->all());
        // option: 1
        // $data['name']=$request->name;
        // $data['description']=$request->description;
        // $category->update($data);
        // return redirect()->route('categories.index');

        // option: 2
        // $data['name'] = $request->name;
        // $data['description'] = $request->description;
        // Category::where('id', $category->id)->update($data);
        // return redirect()->route('categories.index');

        // option: 3
        // Category::where('id', $category->id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ]);

        // return redirect()->route('categories.index');

        // option: 4
        $category->update($request->all());
        $request->session()->flash('success', 'Data Updated Successfull');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
