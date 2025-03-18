@extends('layouts.template')

@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">Configuration</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Ajouter</h3>
                <div class="section-intro">
                    Créez ici vos Configurations selon vos besoins.
                    <hr class="mb-4 mt-6 border-light opacity-1 ">
                    <p>
                        <b class="fs-5">Recommandations:</b> Si le type de configuration est "Date de payement", la valeur doit être une date
                        valide. Exple: 05 pour le 5 du mois.
                        <br>
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form action="{{ route('configuration.store') }}" class="settings-form" method="POST">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Type de Configuration<span class="ms-2"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-placement="top"
                                        data-bs-content="Selectionner le type de configuration."><svg width="1em"
                                            height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <select name="type" id="type" class="form-control">
                                    <option value=""></option>
                                    <option value="PAYMENT_DATE">Date de payement</option>
                                    <option value="APP_NAME">Nom de l'application</option>
                                    <option value="DEVELOPPER_NAME">Equipe de développement</option>
                                    <option value="ANOTHER">Autres options</option>
                                </select>
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Valeur<span class="ms-2"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                        data-bs-placement="top" data-bs-content="Entrer la valeur de la configuration."><svg
                                            width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg></span></label>
                                <input type="text" class="form-control" id="setting-input-1" name="value"
                                    placeholder="Entrer la valeur de la Configuration" value="{{ old('value') }}" required>
                                @error('value')
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
