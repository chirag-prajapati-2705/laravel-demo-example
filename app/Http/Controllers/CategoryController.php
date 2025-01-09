<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{


    const CREATE_SUCCESS = 'Category has been successfully created!';
    const UPDATE_SUCCESS = 'Category has been successfully updated!';

    public function index()
    {
        $categories = Category::all();
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$messages = Session::get('messages', []);
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('category/create')
                ->withErrors($validator)
                ->withInput();
        }

        $request_data = $request->except(['_token']);
        $file = $request->file('category_image');


        $request_data['is_active'] = 1;
        $category = Category::create($request_data);
        if (!empty($file)) {
            Storage::disk('local')->put($file->getClientOriginalName(), 'Contents');
            $category->image()->create(['url' => $file->getClientOriginalName()]);
        }

        return redirect()->back()->with('success', self::CREATE_SUCCESS);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('category.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category_data = $request->except(['_method', '_token']);
        Category::where('id', $id)->update($category_data);
        return redirect()->back()->with('success', self::UPDATE_SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('success', self::UPDATE_SUCCESS);
    }
}
