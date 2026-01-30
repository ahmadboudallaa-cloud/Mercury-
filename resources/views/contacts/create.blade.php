@extends('layouts.app')

@section('page-title', 'Nouveau Contact')
@section('page-subtitle', 'Ajoutez un nouveau contact à votre liste')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="bi bi-person-plus text-danger me-2"></i>
                    Ajouter un nouveau contact
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label">Nom complet *</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required
                                   placeholder="Ex: Jean Dupont">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required
                                   placeholder="exemple@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="phone" class="form-label">Téléphone *</label>
                            <input type="text" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   required
                                   placeholder="Ex: 06 12 34 56 78">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="group_id" class="form-label">Groupe</label>
                            <select class="form-select @error('group_id') is-invalid @enderror" 
                                    id="group_id" 
                                    name="group_id">
                                <option value="">Sélectionnez un groupe (optionnel)</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" 
                                        {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Créer le contact
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection