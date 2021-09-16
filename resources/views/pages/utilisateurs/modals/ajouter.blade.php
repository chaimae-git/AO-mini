<div class="modal fade bd-example-modal-lg" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter  un Utilisateur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('flash')
          <form action="{{route('utilisateurs.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form py-5">
                  <div class="form-group mb-4">
                      <label for="nom">Nom et Prénom</label>
                      <input type="text" class="form-control" name="nom_prenom" placeholder="Nom et prénom" value={{old('nom_prenom')}}>
                      @error('nom_prenom') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                
                  <div class="form-group mb-4">
                      <label for="username">Identifiant</label>
                      <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" value={{old('username')}}>
                      @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                  <div class="form-group mb-4">
                      <label for="email">email</label>
                      <input type="text" class="form-control" name="email" placeholder="email" value={{old('email')}}>
                      @error('email') <span class="text-danger">{{$message}}</span> @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="statut_id">Statut</label>
                    <select name="statut_id" class="form-control">
                        <option value="">Séléctionner le statut</option>
                        @foreach($statuts as $statut)
                            <option value="{{$statut->id}}" @if((old('statut_id')) && old('statut_id') == $statut->id) {{'selected'}} @endif>{{$statut->statut}}</option>
                        @endforeach
                    </select>
                    @error('bu_id') <span class="text-danger">{{$message}}</span> @enderror
                </div> 

                  <div class="form-group mb-4">
                      <label for="password">Mot de Passe</label>
                      <input type="password" class="form-control" name="password" placeholder="mot de passe" value={{old('password')}}>
                      @error('password') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                  <div class="form-group mb-4">
                      <label for="password">Confirmer le Mot de Passe</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="confirmer le mot de passe" value={{old('password_confirmation')}}>
                      @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                  <div class="form-group mb-4">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" name="image">
                      @error('image') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="submit" value='ajouter'>
                  </div>
              </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->