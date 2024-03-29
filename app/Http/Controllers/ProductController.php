<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = Auth::id();

        // Fetch products associated with the authenticated user
        $product = Product::with('user')->where('userid', $userid)->get();

        return view('product.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $categories = Category::all(); // Assuming you want to fetch all categories
        return view('product.create', compact('categories', 'user'));
    }

    public function uploadImage($image)
    {
        $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/all_photo'), $imageName);
        return $imageName;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->expired_date = $request->expired_date;
        $product->userid = $request->userid;
        if ($request->hasFile('image')) {
            $product->image = $this->uploadImage($request->file('image'));
        }
        $product->save();
        return to_route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->expired_date = $request->expired_date;
        $product->userid = $request->userid;
        if ($request->hasFile('image')) {
            $product->image = $this->uploadImage($request->file('image'));
        }
        $product->save();
        return to_route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return redirect()->route('product.index')->with('error', 'Product not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $product->image);
            $product->delete();

            return redirect()->route('product.index')->with('success', 'Product has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('product.index')->with('error', 'Error deleting the Product. Please try again.');
        }
    }
}
