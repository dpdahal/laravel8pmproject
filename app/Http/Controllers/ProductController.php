<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'brand_name' => 'required',
            'color' => 'required',
            'price' => 'required',
            'sh' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = '/images/' . $name;
        }

        if (Product::create($data)) {
            return redirect()->route('index')->with('success', 'Product created successfully');
        } else {
            return redirect()->route('index')->with('error', 'Product not created');
        }


    }


    public function deleteFile($id)
    {
        $data = Product::findOrFail($id);
        $image = $data->image;
        $image_path = public_path($image);
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
            return true;
        }
        return true;
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'brand_name' => 'required',
            'color' => 'required',
            'price' => 'required',
            'sh' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            if ($this->deleteFile($id) && $image->move($destinationPath, $name)) {
                $data['image'] = '/images/' . $name;
            }
        }

        if (Product::findOrFail($id)->update($data)) {
            return redirect()->route('index')->with('success', 'Product update successfully');
        } else {
            return redirect()->route('index')->with('error', 'Product not created');
        }

    }


    public function destroy($id)
    {
        if ($this->deleteFile($id) && Product::findOrFail($id)->delete()) {
            return redirect()->route('index')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->route('index')->with('error', 'Product not deleted');
        }
    }
}
