@extends('layouts.app')
@section('head')
    <title>{{__('Example formBuilder')}}</title>
@endsection

@section('content')
<div class="col-sm-12 custom-form-builder-container">
    <div class="card custom-form-builder-card">
        <div class="card-body custom-form-builder-body">
       <div class="container mt-4">
        <div class="card ">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Form Create') }}</h5>
                <a href="{{ URL('form-builder') }}" class="btn btn-outline-info  d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> {{ __('Back') }}
                </a>
            </div>
            {{-- --- NEW SELECT DROPDOWN HERE --- --}}
            
            <div class="col-md-6 mb-3"> {{-- Bootstrap margin-bottom for spacing --}}
                <label for="formTypeSelect" class="form-label">{{__('Select country')}}</label>
                <select id="country"  name="country" class="form-select custom-form-control" required>
                    <option value="">{{__('Choose...')}}</option>
                    <?php foreach($countries as $country) :?>
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    <?php endforeach; ?>
           
                    {{-- Add more options as needed --}}
                </select>
            </div>
            {{-- --------------------------------- --}}

            <div class="col-md-6 mb-3"> {{-- Added mb-3 for spacing below this input --}}
                <label for="name" class="form-label">{{__('Form Name')}}</label>
                <input type="text" id="name" name="name" class="form-control custom-form-control" />
            </div>

            <div id="fb-editor" class="custom-fb-editor"></div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/form-builder/form-builder.min.js') }}"></script>
    <script>
        jQuery(function($) {
            $(document.getElementById('fb-editor')).formBuilder({
                onSave: function(evt, formData) {
                    console.log(formData);
                    saveForm(formData);
                },
            });
        });

        function saveForm(form) {
            $.ajax({
                type: 'post',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('save-form-builder') }}',
                data: {
                    'form': form,
                    'name': $("#name").val(),
                    'country_id': $("#country").val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    location.href = "/form-builder";
                    console.log(data);
                }
            });
        }
    </script>
@endsection
