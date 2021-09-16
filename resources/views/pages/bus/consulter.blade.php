@extends('layouts.master')

@section('title')
    <h1 class="m-0">Données</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Listes des Données</li>
@endsection


@section('content')
    <div class="panel panel-default">
            <div class="row py-2">
                <!--BUs-->
                <div class="form col-5 p-0">
                    <div class="content-form-body bg-white mx-3 ">
                        <div class="content ">
                            <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
                                <div>
                                    <h4 class="text-gray-dark m-0" style="font-size:25px font-style:Bold">Business Units</h4>
                                </div>
                                <div class="button">
                                    <a href="{{route('bus.ajouter')}}" class="btn btn-outline-info">+ Ajouter un BU</a>
                                </div>
                            </div>
                
                            <div class="panel-body rounded bg-white">
                                @include('flash')
                
                                <table class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Business Unit</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bus as $bu)
                                        <tr>
                                            
                                            <td>{{$bu->nom}}</td>
                                            <td>{{$bu->description}}</td>
                                                <td>
                                                    <a href="{{route('bus.editer', $bu)}}"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('bus.editer', $bu)}}"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                  <!-- Departements -->
                  <div class="form col-7 p-0">
                    <div class="content-form-body bg-white mx-3 ">
                        <div class="content ">
                            <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
                                <div>
                                    <h4 class="text-gray-dark m-0" style="font-size:25px font-style:Bold">Départements</h4>
                                </div>
                                <div class="button">
                                    <a href="{{route('departements.ajouter')}}" class="btn btn-outline-info">+ Ajouter un Département</a>
                                </div>
                            </div>
                
                            <div class="panel-body rounded bg-white">
                                @include('flash')
                
                                <table class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Départements</th>
                                        <th>Business Unit</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($departements as $departement)
                                            <tr>
                                                <td>{{$departement->nom}}</td>
                                                <td>{{$departement->bu->nom}}</td>
                                                <td>{{$departement->description}}</td>
                                                <form action="{{route('departements.destroy', $departement)}}" method ="post">
                                                    @csrf
                                                    @method('delete')
                                                    <td>
                                                        <a href="{{route('bus.editer', $bu)}}"><i class="fas fa-edit"></i></a>
                                                        <a href="{{route('bus.editer', $bu)}}"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </form>
                    
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            


        </div>
    </div>
@endsection


