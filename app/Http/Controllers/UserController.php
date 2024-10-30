<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Http\Request\hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_param = [];

        $users = User::when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            $query->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%")
                        ->orWhere('id', 'like', "%{$value}%");
                }
            });
        })->get();

        $query_param = $request->has('search') ? ['search' => $request['search']] : [];

        return view('user.index', compact('users', 'query_param'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function uploadImage($image)
    {
        $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/all_photo'), $imageName);
        return $imageName;
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->dob = $request->dob;
        if ($request->has('password') && $request->password !== null) {
            // Hash the password before storing it
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('profile')) {
            $user->profile = $this->uploadImage($request->file('profile'));
        }
        $user->save();
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->password = $request->password;
        if ($request->hasFile('profile')) {
            $user->profile = $this->uploadImage($request->file('profile'));
        }
        $user->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('product.index')->with('error', 'Product not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $user->image);
            $user->delete();

            return redirect()->route('employees.index')->with('success', 'Product has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('employees.index')->with('error', 'Error deleting the Product. Please try again.');
        }
    }
}
