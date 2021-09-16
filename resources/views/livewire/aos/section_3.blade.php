@if($currentStep == 3)
    <section class="section_3 form-step" id="section_3">
    <div class="form-group mb-3">
        <label for="adresse mb-2">Adresse</label>
        <input type="text" class="form-control" name="adresse" placeholder="adresse" value={{old('adresse')}}>
        @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="map bg-gray w-100  mb-3" style="height:300px"></div>
    <div class="form-group clearfix">
        <div class="flex justify-content-between">
            <div class="">
                <button class="pull-left button" type="button" wire:click="back(2)">precedant</button>
            </div>
            <div class="">
                <input class="pull-right button" type="submit" value="submit" name="submit" wire:click="submitForm()">
            </div>
        </div>
    </div>
</section>
@endif
