@can('view', $trip)
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-0">
        <div class="card m-2">
            <google-map class="card-img-top" style="height: 256px;"></google-map>
            <div class="card-body">
                <h5 class="card-title">{{ $trip->name }}</h5>
                <p class="card-text">{{ $trip->description }}</p>
                <div class="container px-0">
                    <div class="row">
                        @can('update', $trip)
                            <div class="col text-left">
                                <a href="{{ route('trips.edit', ['trip' => $trip]) }}" class="btn btn-primary">Edit</a>
                            </div>
                        @endcan
                        @can('delete', $trip)
                            <div class="col text-right">
                                <form action="{{ route('trips.delete', ['trip' => $trip]) }}" method="POST" class="d-inline ml-2">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    @isset($trip->beginn)
                        {{ $trip->beginn->format("m/d/Y") }}
                    @else
                        unknown
                    @endisset
                    -
                    @isset($trip->end)
                        {{ $trip->end->format("m/d/Y") }}
                    @else
                        unknown
                    @endisset
                </small>
            </div>
        </div>
    </div>
@endcan