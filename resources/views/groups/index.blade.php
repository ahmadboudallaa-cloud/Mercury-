@extends('layouts.app')

@section('page-title', 'Groupes')
@section('page-subtitle', 'Gérez vos groupes de contacts')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="card-title mb-0">
                    <i class="bi bi-collection text-danger"></i>
                    Gestion des Groupes
                </h5>
                <p class="text-muted mb-0 mt-1">
                    Organisez vos contacts par catégories
                </p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('groups.create') }}" class="btn btn-primary">
                    <i class="bi bi-folder-plus me-2"></i> Nouveau Groupe
                </a>
            </div>
        </div>
    </div>
</div>

@if($groups->isEmpty())
    <div class="card">
        <div class="card-body text-center py-5">
            <i class="bi bi-collection display-1 text-muted mb-3"></i>
            <h4 class="text-muted mb-3">Aucun groupe créé</h4>
            <p class="text-muted mb-4">
                Créez votre premier groupe pour organiser vos contacts
            </p>
            <a href="{{ route('groups.create') }}" class="btn btn-primary">
                <i class="bi bi-folder-plus me-1"></i> Créer un groupe
            </a>
        </div>
    </div>
@else
    <div class="row">
        @foreach($groups as $group)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="avatar me-3">
                            {{ strtoupper(substr($group->name, 0, 1)) }}
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="mb-1">{{ $group->name }}</h5>
                            <p class="text-muted mb-0 small">
                                <i class="bi bi-people me-1"></i>
                                {{ $group->contacts_count }} contact(s)
                            </p>
                        </div>
                        <span class="badge bg-primary">
                            {{ $group->contacts_count }}
                        </span>
                    </div>
                    
                    @if($group->contacts_count > 0)
                        <div class="mb-4">
                            <p class="text-muted small mb-2">Contacts dans ce groupe :</p>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($group->contacts->take(3) as $contact)
                                    <span class="badge bg-light text-dark">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                        {{ explode(' ', $contact->name)[0] }}
                                    </span>
                                @endforeach
                                @if($group->contacts_count > 3)
                                    <span class="badge bg-light text-dark">
                                        +{{ $group->contacts_count - 3 }} plus
                                    </span>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="mb-4">
                            <div class="alert alert-light py-2 px-3" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                Aucun contact dans ce groupe
                            </div>
                        </div>
                    @endif
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}" 
                           class="btn btn-outline-primary flex-fill">
                            <i class="bi bi-eye me-1"></i> Voir contacts
                        </a>
                        <a href="{{ route('groups.edit', $group) }}" 
                           class="btn btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('groups.destroy', $group) }}" 
                              method="POST" 
                              onsubmit="return confirmDelete(event)"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection