@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Consulter les Bus</h4>
                </div>
                <div class="button">
                    <a href="{{route('departements.ajouter')}}" class="btn btn-success">Ajouter un département</a>
                </div>
            </div>

            <div class="card-body">
                @include('flash')

                <table class='table table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>nom</th>
                        <th>BU</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departements as $departement)
                        <tr>
                            <td>{{$departement->id}}</td>
                            <td>{{$departement->nom}}</td>
                            <td>{{$departement->bu->nom}}</td>
                            <td>{{$departement->description}}</td>
                            <form action="{{route('departements.destroy', $departement)}}" method ="post">
                                @csrf
                                @method('delete')
                                <td>
                                    <a class="btn btn-info" href="{{route('departements.afficher', $departement)}}">Afficher</a>
                                    <a class="btn btn-warning" href="{{route('departements.editer', $departement)}}">Editer</a>
                                    <input type="submit" class="btn btn-danger" value="supprimer">
                                </td>
                            </form>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
