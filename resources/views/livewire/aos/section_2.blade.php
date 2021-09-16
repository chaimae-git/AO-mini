@if($currentStep == 2)

<section class="section_2 form-step py-3" id="section_2">
    <div class="form-group mb-3" wire:ignore>
        <label for="multiselect_administratif" class="mb-2">Selectionner la liste des secretaires</label>
        <select class="select2 form-control" id="multiselect_administratif" multiple>
            @foreach($secretaires as $secretaire)
                <option value="{{$secretaire->id}}">{{$secretaire->nom_prenom}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3" wire:ignore>
        <label for="multiselect_financiarie" class="mb-2">Selectionner la liste des BUs</label>
        <select class="select2 form-control" id="multiselect_financiarie" multiple>
            @foreach($bus as $bu)
                <option value="{{$bu->id}}">{{$bu->nom}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3" wire:ignore>
        <label for="multiselect_tech" class="mb-2">Selectionner la liste des départements</label>
        <select class="select2 form-control" id="multiselect_tech" multiple>
            @foreach($departements as $departement)
                <option value="{{$departement->id}}">{{$departement->nom}}</option>
            @endforeach
        </select>
    </div>
</section>


@endif

@push('scripts')
    <script>
        console.log('hi i am inside add ao');
        $(function () {
            //alert('hiiiiiiiiiii');
            //Initialize Select2 Elements
            $(".select2").select2({
                theme:'bootstrap4'
            });

            console.log($(".select2"));

            //Initialize Select2 Elements
            // $('.select2bs4').select2({
            //     theme: 'bootstrap4'
            // });
        });
    </script>
@endpush
