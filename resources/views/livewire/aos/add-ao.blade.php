<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

        @if ($catchError)
            <div class="alert alert-danger" id="success-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $catchError }}
            </div>

        @endif



{{--        @if($show_table)--}}
{{--            @include('livewire.aos.aos_Table')--}}
{{--        @else--}}
            <div class="stepwizard mb-3">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                           class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                        <p>{{ trans('Parent_trans.Step1') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                           class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                        <p>{{ trans('Parent_trans.Step2') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button"
                           class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</a>
                        <p>{{ trans('Parent_trans.Step3') }}</p>
                    </div>

                </div>
            </div>

        @include('livewire.aos.section_1')
        @include('livewire.aos.section_2_recup')
        @include('livewire.aos.section_3')




    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        @if ($currentStep != 4)
            <div style="display: none" class="row setup-content" id="step-3">

            </div>
        @endif
    </div>

</div>

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        console.log('hi i am inside add ao');--}}
{{--        $(function () {--}}
{{--            //alert('hiiiiiiiiiii');--}}
{{--            //Initialize Select2 Elements--}}
{{--            $(".select2").select2({--}}
{{--                theme:'bootstrap4'--}}
{{--            });--}}

{{--            console.log($(".select2"));--}}

{{--            //Initialize Select2 Elements--}}
{{--            // $('.select2bs4').select2({--}}
{{--            //     theme: 'bootstrap4'--}}
{{--            // });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

