@if($currentStep == 1)
    <section class="section_1 form-step form-step-active" id="section_1">
    <div class="row mb-3">
        <div class="form-group col">
            <label for="n_ao" class="mb-2">numero AO</label>
            <input type="text" class="form-control" placeholder="Numéro Ao" wire:model="num_AO">
            @error('num_AO') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="date_limite">date limite</label>
            <input type="date" class="form-control" name="date_limite" placeholder="date_limite" wire:model="date_limite">
            @error('date_limite') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="pays_id" class="mb-2">Pays</label>
            <select name="pays_id" class="form-control" wire:model="pays_id">
                <option value="">séléctionner le pays</option>
                @foreach($pays as $pays)
                    <option value="{{$pays->id}}">{{$pays->pays}}</option>
                @endforeach
            </select>
            @error('pays_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>

    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="type" class="mb-2">Type</label>
            <select name="type_id" class="form-control" wire:model="type_id">
                <option value="">séléctionner le type</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
            @error('type_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="date_adjudication" class="mb-2">date adjudication</label>
            <input type="date" class="form-control" placeholder="date_adjudication" wire:model="date_adjudication">
            @error('date_adjudication') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="ministere_id" class="mb-2">Minister de tuelle</label>
            <select class="form-control" wire:model="ministere_id">
                <option value="">séléctionner le Minister de tuelle</option>
                @foreach($ministere_tuelles as $ministere)
                    <option value="{{$ministere->id}}" @if((old('ministere_id')) && old('ministere_id') == $ministere->id) {{'selected'}} @endif>{{$ministere->ministere}}</option>
                @endforeach
            </select>
            @error('ministere_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="secteur_id" class="mb-2">Sécteur d'activité</label>
            <select class="form-control" wire:model="secteur_id">
                <option value="">séléctionner le sécteur d'activité</option>
                @foreach($secteur_activites as $secteur)
                    <option value="{{$secteur->id}}">{{$secteur->secteur}}</option>
                @endforeach
            </select>
            @error('secteur_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="partenariat" class="mb-2">partenariat</label>
            <input type="text" class="form-control" placeholder="partenariat" wire:model="partenariat">
            @error('partenariat') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="montant_soumission" class="mb-2">montant de soumission</label>
            <input type="text" class="form-control" placeholder="montant de soumission" wire:model="montant_soumission">
            @error('montant_soumission') <span class="text-danger">{{$message}}</span> @enderror
        </div>

    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="budget" class="mb-2">budget</label>
            <input type="text" class="form-control" placeholder="budget" wire:model="budget">
            @error('budget') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="n_lot" class="mb-2">nombre de lotissement</label>
            <input type="text" class="form-control" placeholder="nombre de lotissement" wire:model="n_lot">
            @error('n_lot') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="client_id" class="mb-2">client</label>
            <select class="form-control" wire:model="client_id">
                <option value="">séléctionner le client</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->client}}</option>
                @endforeach
            </select>
            @error('client_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>

    </div>

    <div class="row mb-3">

        <div class="form-group col-4">
            <label for="montant_c_p">Montant du Caution Provisoire</label>
            <input type="text" class="form-control" placeholder="montant caution provisoire" wire:model="montant_c_p">
            @error('montant_c_p') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="critere_selection_id" class="mb-2">Critère de Séléction</label>
            <select name="critere_selection_id" class="form-control" wire:model="critere_selection_id">
                <option value="">séléctionner le critère de séléction</option>
                @foreach($criteres_selections as $critere)
                    <option value="{{$critere->id}}" @if((old('critere_selection_id')) && old('critere_selection_id') == $critere->id) {{'selected'}} @endif>{{$critere->critere}}</option>
                @endforeach
            </select>
            @error('critere_selection_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="objet">objet</label>
        <textarea placeholder="objet" class="form-control" rows="5" wire:model="objet"></textarea>
        @error('objet') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="row mb-3">
        <div class="form-group col">
            <label for="rc" class="mb-2">RC</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" wire:model="rc">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            @error('rc') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group col">
            <label for="cps" class="mb-2">CPS</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" wire:model="cps">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            @error('cps') <span class="text-danger">{{$message}}</span> @enderror
        </div>

    </div>

    <div class="form-group clearfix">
        <div class="flex justify-content-end">
            <div class="button-group">
                <button class="button pull-right" type="button" value='suivant' wire:click = "firstStepSubmit()">suivant</button>
            </div>
        </div>
    </div>

</section>
@endif
