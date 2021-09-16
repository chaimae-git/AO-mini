@extends('layouts.master')

@section('title')
    <h1 class="m-0">Utilisateurs</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Liste des Utilisateurs</li>
@endsection


@section('content')
    
        <div class="card">
            <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
                <div>
                    <h4 class="text-gray-dark m-0" style="font-size:20px"></h4>
                </div>
                <div class="button">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-default">
                        +  Ajouter un Utilisateur
                      </button>
                    {{-- <a href="javascript:void(0)" id="showAjouterUtilisateurModal" class="btn btn-secondary btn-outline-info bg-white text-info" data-bs-toggle="modal" data-bs-target="#modalAjouterUtilisateur">+ Ajouter un Utilisateur</a> --}}
             
                </div>
            </div>

            <div class="card-body">
                @include('flash')

                <table class='table table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Utilisateur</th>
                        <th>Statut</th>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{$utilisateur->id}}</td>
                            <td>{{$utilisateur->nom_prenom}}</td>
                            <td>{{$utilisateur->statut->statut}}</td>
                            <td>{{$utilisateur->username}}</td>
                            <td>{{$utilisateur->email}}</td>
                            <form action="{{route('utilisateurs.destroy', $utilisateur)}}" method ="post">
                                @csrf
                                @method('delete')
                                <td>
                                    <a href="{{route('utilisateurs.afficher', $utilisateur)}}"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('utilisateurs.editer', $utilisateur)}}"><i class="fas fa-edit"></i></a>
                                    <input type="submit" class="btn btn-danger" value="supprimer">
                                </td>
                            </form>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    
@endsection

@include('pages.utilisateurs.modals.ajouter')
