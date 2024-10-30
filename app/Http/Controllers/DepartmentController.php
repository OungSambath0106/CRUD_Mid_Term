<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
          $userId = Auth::id();
          $department = Department::where('userid', $userId)->get();
          return view('department.index', ['department' => $department]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('department.create', ['user' => $user]);
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
            Department::create($saveData);

            return redirect()->route('department.index')->with('success', 'department has been created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('department.index')->with('error', 'Error creating the department. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);
        return view('department.details', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $editData = Department::find($id);
        $editDataRecord = [
            'name' => $request->name,
            'description' => $request->description,
            'userid' => $request->userid,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('department.index', $id)->with('success', 'department has been updated successfully.');
            } else {
                return redirect()->route('department.index', $id)->with('error', 'Error updating the department. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('department.index', $id)->with('error', 'Error updating the department. Please try again.');
        }
    }


    public function destroy(string $id)
    {
        try {
            $department = Department::find($id);
            if (!$department) {
                return redirect()->route('department.index')->with('error', 'user not found.');
            }

            // Delete the banner and its associated image
            $department->delete();

            return redirect()->route('department.index')->with('success', 'department has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('department.index')->with('error', 'Error deleting the department. Please try again.');
        }
    }
}
