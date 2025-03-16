@extends('layouts.template')

@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Employer</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Ajouter</h3>
                <div class="section-intro">Vous êtes sur le point de créer un nouvel employer.</div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form class="settings-form" action="{{ route('employer.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            
                            <div class="mb-3">
                                <label for="setting-input-4" class="form-label">Département</label>
                                <select name="departement_id" id="departement_id" class="form-control">
                                    <option value=""></option>

                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}" {{ $employer->departement_id === $departement->id ? 'selected':'' }}>{{ $departement->name }}</option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Nom<span class="ms-2"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-placement="top"
                                        data-bs-content="Veuillez remplire le formulaire d'édition."><svg
                                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <input type="text" class="form-control" id="setting-input-1" value="{{ old('nom') }}" name="nom" placeholder="Entre le nom"
                                    required>
                                    @error('nom')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="setting-input-2" value="{{ old('prenaom') }}" name="prenaom" placeholder="Entrer le Prénom" required>
                                @error('prenaom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-3" class="form-label">Email</label>
                                <input type="email" class="form-control" id="setting-input-3" value="{{ old('email') }}" name="email"
                                    placeholder="Email@mail.com">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-4" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="setting-input-4" value="{{ old('contact') }}" name="contact"
                                    placeholder="+237 650 256 421">
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-5" class="form-label">Montant journalier</label>
                                <input type="number" class="form-control" id="setting-input-5" value="{{ old('montant_journalier') }}" name="montant_journalier"
                                    placeholder="Montant journalier de l'employer">
                                    @error('montant_journalier')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            
                            <button type="submit" class="btn app-btn-primary">Enregister</button>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div>
    @endsection
