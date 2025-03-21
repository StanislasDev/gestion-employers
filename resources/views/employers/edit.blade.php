@extends('layouts.template')

@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Employer</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Editer</h3>
                <div class="section-intro">Vous vous apprêtez à modifier les informations de l'employer <b>{{ $employer->nom }} {{ $employer->prenaom }}</b>.</div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form class="settings-form" action="{{ route('employer.update', $employer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="departement_id" class="form-label">Département</label>
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
                                        data-bs-content="Veillez remplir le formulaire de modification."><svg
                                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <input type="text" class="form-control" id="setting-input-1" value="{{ $employer->nom }}" name="nom" placeholder="Entre le nom"
                                    required>
                                    @error('nom')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="setting-input-2" value="{{ $employer->prenaom }}" name="prenaom" placeholder="Entrer le Prénom" required>
                                @error('prenaom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-3" class="form-label">Email</label>
                                <input type="email" class="form-control" id="setting-input-3" value="{{ $employer->email }}" name="email"
                                    placeholder="Email@mail.com">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-4" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="setting-input-4" value="{{ $employer->contact }}" name="contact"
                                    placeholder="+237 650 256 421">
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-5" class="form-label">Montant journalier</label>
                                <input type="number" class="form-control" id="setting-input-5" value="{{ $employer->montant_journalier }}" name="montant_journalier"
                                    placeholder="Montant journalier de l'employer">
                                    @error('montant_journalier')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <button type="submit" class="btn app-btn-primary">Mettre à jour</button>
                                </div>
                                <div class="col-auto">
                                    <a class="btn app-btn-secondary" href="#">Cancel Plan</a>
                                </div>
                            </div>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div>
    @endsection
