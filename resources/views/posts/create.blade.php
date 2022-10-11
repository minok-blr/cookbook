@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Meal title</label>

                        <input id="title"
                               type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title"
                               value="{{ old('title') }}"
                               autocomplete="title" autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="row">
                        <label for="prep" class="col-md-4 col-form-label">Preparation instructions</label>

                        <input id="prep"
                               type="text"
                               class="form-control{{ $errors->has('prep') ? ' is-invalid' : '' }}"
                               name="prep"
                               value="{{ old('prep') }}"
                               autocomplete="prep" autofocus>
                    </div>

                    <div class="row">
                        <label for="ing" class="col-md-4 col-form-label">List ingredients</label>

                        <input id="ing"
                               type="text"
                               class="form-control{{ $errors->has('ing') ? ' is-invalid' : '' }}"
                               name="ing"
                               value="{{ old('ing') }}"
                               autocomplete="ing" autofocus>
                    </div>

                    <div class="row">
                        <label for="units" class="col-md-4 col-form-label">Insert units</label>

                        <input id="units"
                               type="text"
                               class="form-control{{ $errors->has('units') ? ' is-invalid' : '' }}"
                               name="units"
                               value="{{ old('units') }}"
                               autocomplete="units" autofocus>
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Meal Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>

                    <div class="row pt-4 justify-content-center">
                        <button class="btn btn-primary w-25">Add New Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
