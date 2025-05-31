@extends('layouts.app')
@section('head')
<title>{{ __('Dynamic Form Builder Edit') }}</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Form Create') }}</h5>
                <a href="{{ URL('form-builder') }}" class="btn btn-outline-info  d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> {{ __('Back') }}
                </a>
            </div>
            {{-- --- NEW SELECT DROPDOWN HERE --- --}}
            <div class="col-md-6 mb-3"> {{-- Bootstrap margin-bottom for spacing --}}
                <label for="country" class="form-label">{{__('Select country')}}</label>
                <select id="country" name="country" class="form-select custom-form-control" required>
                    <option value="">{{__('Choose...')}}</option>
                    {{-- The country options will be populated dynamically by JavaScript --}}
                </select>
            </div>
            {{-- --------------------------------- --}}
            <div class="col-md-6 mb-3">
                <label for="name">{{__('Name')}}</label>
                <input type="text" id="name" name="name" class="form-control" />
               
            </div>
             <div id="fb-editor"></div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/form-builder/form-builder.min.js') }}"></script>
    <script>
        var fbEditor = document.getElementById('fb-editor');
        var formBuilder = $(fbEditor).formBuilder({
            onSave: function(evt, formData) {
                saveForm(formData);
            },
        });

        $(function() {
            $.ajax({
                type: 'get',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('get-form-builder-edit') }}',
                data: {
                    'id': '{{ $id }}'
                },
                success: function(data) {
                    // Access the name from the formBuilder object in the response
                    $("#name").val(data.formBuilder.name);
                    // Access the content from the formBuilder object in the response
                    formBuilder.actions.setData(data.formBuilder.content);

                    // --- CHANGES START HERE ---
                    var countrySelect = $("#country");
                    // Remove any existing options (except the "Choose..." one)
                    countrySelect.find('option:not(:first)').remove();

                    // Loop through the 'allCountries' array from the API response
                    $.each(data.allCountries, function(index, country) {
                        // Append each country as a new option
                        countrySelect.append($('<option>', {
                            value: country.id,   // Use country ID as the option value
                            text: country.name   // Use country name as the option text
                        }));
                    });

                    // If a country_id exists in the formBuilder data, pre-select it
                    if (data.formBuilder.country_id) {
                        countrySelect.val(data.formBuilder.country_id);
                    }
                    // --- CHANGES END HERE ---
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching form data:", error);
                    // You might want to display an error message to the user here
                }
            });
        });

        function saveForm(form) {
            // Get the currently selected country ID from the dropdown
            var selectedCountryId = $("#country").val();

            $.ajax({
                type: 'post',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('update-form-builder') }}',
                data: {
                    'form': form,
                    'name': $("#name").val(),
                    'country_id': selectedCountryId, // Pass the selected country ID to the server
                    'id': {{ $id }},
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    location.href = "/form-builder";
                },
                error: function(xhr, status, error) {
                    console.error("Error saving form:", error);
                    // You might want to display an error message to the user here
                }
            });
        }
    </script>
@endsection