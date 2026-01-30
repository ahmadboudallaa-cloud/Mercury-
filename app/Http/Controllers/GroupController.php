<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::withCount('contacts')->orderBy('created_at', 'desc')->get();
        return view('groups.index', compact('groups'));
    }

   
    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name'
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')
            ->with('success', 'Groupe créé avec succès.');
    }

   
    public function show(Group $group)
    {
        abort(404);
    }

    
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name,' . $group->id
        ]);

        $group->update($request->all());

        return redirect()->route('groups.index')
            ->with('success', 'Groupe modifié avec succès.');
    }

   
    public function destroy(Group $group)
    {
        
        $group->contacts()->update(['group_id' => null]);
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Groupe supprimé avec succès.');
    }
}