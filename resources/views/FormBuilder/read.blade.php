@extends('layouts.app')
@section('head')
    <title>{{ __('Dynamic Form Builder View') }}</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Form View ') }}</h5>
                <a href="{{ URL('form-builder') }}" class="btn btn-outline-info  d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> {{ __('Back') }}
                </a>
            </div>
            <form method="POST" action="{{ URL('save-form-transaction') }}" enctype="multipart/form-data">
                @csrf
                <h6>Country name : <span id="country_name"></span>  </h6>
                <input type="number" id="country_id" name="country_id" hidden />
                <input type="number" id="form_id" name="form_id" hidden />
                <div id="fb-reader"></div>
                <input type="submit" value="Save" class="btn btn-primary" />
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>
    <script>
        $(function() {
            $.ajax({
                type: 'get',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('get-form-builder') }}',
                data: {
                    'id': {{ $id }}
                },
                success: function(data) {
                    $("#form_id").val(data.id);
                             $("#country_id").val(data.country_id);
                      $("#country_name").text(data.country.name);
                    $('#fb-reader').formRender({
                        formData: data.content
                    });
                }
            });
        });
    </script>
@endsection
