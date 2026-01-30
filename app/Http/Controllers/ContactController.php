<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::with('group');
        
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }
        
        if ($request->has('group_id') && !empty($request->input('group_id'))) {
            $query->where('group_id', $request->input('group_id'));
        }
        
        $query->orderBy('created_at', 'desc');
        
        $contacts = $query->paginate(10);
        
        $groups = Group::orderBy('name')->get();
        
        return view('contacts.index', compact('contacts', 'groups'));
    }

    public function create()
    {
        $groups = Group::orderBy('name')->get();
        return view('contacts.create', compact('groups'));
    }

    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact créé avec succès.');
    }

    
    public function show(Contact $contact)
    {
        abort(404);
    }

    
    public function edit(Contact $contact)
    {
        $groups = Group::orderBy('name')->get();
        return view('contacts.edit', compact('contact', 'groups'));
    }

    
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|string|max:20',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact modifié avec succès.');
    }

    
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact supprimé avec succès.');
    }
}