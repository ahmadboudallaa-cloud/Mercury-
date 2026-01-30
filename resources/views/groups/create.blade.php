@extends('layouts.app')

@section('page-title', 'Nouveau Groupe')
@section('page-subtitle', 'Créez un nouveau groupe pour vos contacts')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="bi bi-folder-plus text-primary me-2"></i>
                    Créer un nouveau groupe
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('groups.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="form-label">Nom du groupe *</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required
                               placeholder="Ex: Famille, Amis, Travail...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            Donnez un nom significatif à votre groupe.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('groups.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Créer le groupe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection