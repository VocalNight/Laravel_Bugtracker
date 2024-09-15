<?php

namespace App\Http\Controllers;

use App\Models\Bugs;
use App\Http\Requests\StoreBugsRequest;
use App\Http\Requests\UpdateBugsRequest;
use App\Models\Bug;
use App\Models\User;

class BugsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index', [
            'bugs' => Bug::with('assignedTo')->latest()->Paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('tickets.create', [
        'users' => $users
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required']
        ]);

        Bug::create([
            'title' => request('title'),
            'description' => request('description'),
            'AssignedTo' => request('assigned'),
            'CreatedBy' => 1
        ]);

        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bug $bug)
    {
        $user = User::select('name')->find($bug->assignedTo)->first();
        return view('tickets.show', ['bug' => $bug, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bug $bug)
    {
        $users = User::all();

        return view('tickets.edit', ['bug' => $bug, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Bug $bug)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required']
        ]);

        // Find the object or abort
        //$ticket = Bug::findOrFail($id);

        //update
        $bug->title = request('title');
        $bug->description = request('description');
        $bug->assignedTo = request('assigned');

        //save in db
        $bug->save();

        return redirect("/tickets/" . $bug->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bug $bug)
    {
        $bug->delete();

        return redirect('/tickets');
    }
}
