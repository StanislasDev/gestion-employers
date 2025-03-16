@extends('layouts.template')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Employers</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders"
                                            class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div><!--//col-->
                            <div class="col-auto">

                                <select class="form-select w-auto">
                                    <option selected value="option-1">All</option>
                                    <option value="option-2">This week</option>
                                    <option value="option-3">This month</option>
                                    <option value="option-4">Last 3 months</option>

                                </select>
                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('employer.create') }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </svg>
                                    ajouter un employer
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->

            @if (Session::get('success_message'))
                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
            @endif

            <hr class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">


            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Nom</th>
                                            <th class="cell">Prénom</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Contact</th>
                                            <th class="cell">Département</th>
                                            <th class="cell">Salaire mensuel</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employers as $employer)
                                            <tr>
                                                <td class="cell">{{ $employer->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $employer->nom }}</span></td>
                                                <td class="cell">{{ $employer->prenaom }}</td>
                                                <td class="cell"><span>{{ $employer->email }}</span></td>
                                                <td class="cell"><span>{{ $employer->contact }}</span></td>
                                                <td class="cell"><span class="badge bg-info">{{ $employer->departement->name }}</span></td>
                                                <td class="cell"><span class="badge bg-success">{{ $employer->montant_journalier * 30 }} Fcfa</span></td>
                                                <td class="d-flex">
                                                    <a class="btn-sm app-btn-secondary mx-2"
                                                        href="{{ route('employer.edit', $employer->id) }}">Modifier</a>
                                                    <form action="{{ route('employer.delete', $employer->id) }}">
                                                        @csrf
                                                        <button class="btn-sm app-btn-secondary"
                                                            type="submit" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="cell">Aucun employer ajouter!</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        {{ $employers->links() }}
                    </nav><!--//app-pagination-->

                </div><!--//tab-pane-->
            </div><!--//tab-content-->



        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
