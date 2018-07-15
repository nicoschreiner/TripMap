@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Add Trip</div>

                <div class="card-body">
                    <form action="{{ route('trips.store') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ \App\Http\Utils\ValidationUtils::getInvalidClass($errors, 'name') }}" id="name" name="name" aria-describedby="name" placeholder="Name" value="{{ old('name') }}" required>
                            <small id="name" class="form-text text-muted">The name of your trip.</small>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    @foreach($errors->get('name') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control {{ \App\Http\Utils\ValidationUtils::getInvalidClass($errors, 'description') }}" id="description" name="description" rows="3" value="{{ old('description') }}" required></textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    @foreach($errors->get('description') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="beginn">Beginn</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control text-center {{ \App\Http\Utils\ValidationUtils::getInvalidClass($errors, 'beginn') }}" id="beginn" name="beginn">
                                    </div>
                                    @if($errors->has('beginn'))
                                        <div class="invalid-feedback">
                                            @foreach($errors->get('beginn') as $error)
                                                <span>{{ $error }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="end">End</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control text-center {{ \App\Http\Utils\ValidationUtils::getInvalidClass($errors, 'end') }}" id="end" name="end">
                                    </div>
                                    @if($errors->has('end'))
                                        <div class="invalid-feedback">
                                            @foreach($errors->get('end') as $error)
                                                <span>{{ $error }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection