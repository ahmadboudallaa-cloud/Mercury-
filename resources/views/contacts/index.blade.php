@extends('layouts.app')

@section('page-title', 'Contacts')
@section('page-subtitle', 'Liste de tous vos contacts')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h5 class="card-title mb-0">
                    <i class="bi bi-search text-danger"></i>
                    Rechercher et filtrer
                </h5>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus me-2"></i> Nouveau Contact
                </a>
            </div>
        </div>
        
        <form action="{{ route('contacts.index') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" 
                           class="form-control border-start-0" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Rechercher un contact par nom...">
                </div>
            </div>
            
            <div class="col-md-4">
                <select class="form-select" name="group_id" onchange="this.form.submit()">
                    <option value="">Tous les groupes</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" 
                            {{ request('group_id') == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-funnel me-1"></i> Filtrer
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            <i class="bi bi-people text-danger"></i>
            Liste des Contacts
            <span class="badge bg-primary ms-2">{{ $contacts->total() }}</span>
        </h5>
    </div>
    <div class="card-body">
        @if($contacts->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-people display-1 text-muted mb-3"></i>
                <h4 class="text-muted mb-3">Aucun contact trouvé</h4>
                <p class="text-muted mb-4">
                    @if(request('search') || request('group_id'))
                        Aucun résultat pour vos critères de recherche.
                    @else
                        Commencez par ajouter votre premier contact.
                    @endif
                </p>
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus me-1"></i> Ajouter un contact
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60"></th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Groupe</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>
                                <div class="avatar">
                                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                                </div>
                            </td>
                            <td>
                                <strong>{{ $contact->name }}</strong><br>
                                <small class="text-muted">
                                    Ajouté {{ $contact->created_at->diffForHumans() }}
                                </small>
                            </td>
                            <td>
                                <i class="bi bi-envelope me-1 text-danger"></i>
                                {{ $contact->email }}
                            </td>
                            <td>
                                <i class="bi bi-telephone me-1 text-success"></i>
                                {{ $contact->phone }}
                            </td>
                            <td>
                                @if($contact->group)
                                    <span class="badge bg-primary">
                                        <i class="bi bi-collection me-1"></i>
                                        {{ $contact->group->name }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-collection me-1"></i>
                                        Sans groupe
                                    </span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('contacts.edit', $contact) }}" 
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip" 
                                       title="Modifier le contact">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="tooltip" 
                                                title="Supprimer le contact">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($contacts->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <p class="text-muted mb-0 small">
                        Affichage de {{ $contacts->firstItem() }} à {{ $contacts->lastItem() }}
                        sur {{ $contacts->total() }} contacts
                    </p>
                </div>
                <div>
                    {{ $contacts->links() }}
                </div>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection