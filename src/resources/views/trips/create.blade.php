@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">@lang('trips.create.title')</div>

                <div class="card-body">
                    <form action="{{ route('trips.store') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group">
                            <label for="name">@lang('trips.create.name')</label>
                            <input type="text" class="form-control {{ \App\Http\Utils\ValidationUtils::getInvalidClass($errors, 'name') }}" id="name" name="name" aria-describedby="name" placeholder="Name" value="{{ old('name') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    @foreach($errors->get('name') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">@lang('trips.create.description')</label>
                            <textarea class="form-control {{ \App\Http\Utils\ValidationUtils::getInvalidClass($errors, 'description') }}" id="description" name="description" rows="3" value="{{ old('description') }}" required></textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    @foreach($errors->get('description') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('strings.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection