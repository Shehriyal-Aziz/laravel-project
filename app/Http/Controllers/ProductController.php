<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // func1
    public function menuProductPage()
    {
        $products = Product::all();
        return view('menu', compact('products'));
    }
    // func2
    public function menuProductAdd()
    {
        $products = Product::all();
        return view('admin.menu_product', compact('products'));
    }
    // func 3
    public function AddRecord(Request $request)
    {
        $request->validate([
            'pimg'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pname'  => 'required|string|max:255',
            'pdesc'  => 'required|string',
            'pprice' => 'required|numeric|min:0',
            'pcategory' => 'required|string|max:255',
        ]);

        // Handle image upload
        $imageName = time() . '.' . $request->pimg->extension();
        $request->pimg->move(public_path('uploads'), $imageName);

        // Save product
        $product = new Product();
        $product->name     = $request->pname;
        $product->desc     = $request->pdesc;
        $product->price    = $request->pprice;
        $product->image    = $imageName;
        $product->category = $request->pcategory;

        $product->save();

        return redirect('/menu_product')->with('success', 'Product Added');
    }
    // func  4
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }
    // func 5
    public function update(Request $request, $id)
    {
        $request->validate([
            'pname' => 'required|string|max:255',
            'pdesc' => 'required|string',
            'pprice' => 'required|numeric|min:0',
            'pcategory' => 'required|string|max:255',
            'pimg' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->pname;
        $product->desc = $request->pdesc;
        $product->price = $request->pprice;
        $product->category = $request->pcategory;

        if ($request->hasFile('pimg')) {
            $imageName = time() . '.' . $request->pimg->extension();
            $request->pimg->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect('/menu_product');
    }
    // func 6
   public function edit($id)
{
    $product = Product::findOrFail($id); // fetch single product
    return view('admin.edit', compact('product')); // pass single product
}
// func 7

}
