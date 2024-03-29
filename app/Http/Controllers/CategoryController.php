<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $userId = Auth::id();
          $category = Category::where('userid', $userId)->get();
          return view('category.index', ['category' => $category]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('category.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $userid = Auth::id();

        $saveData = [
            'name' => $request->name,
            'description' => $request->description,
            'userid' => $userid,
        ];

        try {
            Category::create($saveData);

            return redirect()->route('category.index')->with('success', 'Category has been created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('category.index')->with('error', 'Error creating the Category. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('category.details', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $editData = Category::find($id);
        $editDataRecord = [
            'name' => $request->name,
            'description' => $request->description,
            'userid' => $request->userid,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('category.index', $id)->with('success', 'Category has been updated successfully.');
            } else {
                return redirect()->route('category.index', $id)->with('error', 'Error updating the Category. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('category.index', $id)->with('error', 'Error updating the Category. Please try again.');
        }
    }


    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->route('category.index')->with('error', 'user not found.');
            }

            // Delete the banner and its associated image
            $category->delete();

            return redirect()->route('category.index')->with('success', 'Category has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('category.index')->with('error', 'Error deleting the Category. Please try again.');
        }
    }
}
