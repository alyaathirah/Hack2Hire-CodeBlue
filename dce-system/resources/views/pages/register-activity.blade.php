@extends('layouts.app')

@section('content')

<div class="position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            @include('layouts.navbars.guest.navbar')
        </div>
    </div>
</div>

<div class="container">
    <div class="page__title">{{ $activity->name }}</div>
   
    <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3">
        <div class="dds__card">
            <form action="{{ url('register-activity/store') }}" method="GET">
                 @csrf
            <div class="dds__card__content">
                <div class="dds__card__header">
                    <span class="dds__card__header__text">
                        <h5 class="dds__card__header__title">Activity Details</h5>
                        <span class="dds__card__header__subtitle">{{ $activity->age_category }}</span>
                    </span>
                </div>
                <div class="dds__card__body">
                    <p>{{ $activity->description }}</p>
                    <span class="slot__span">Slots: {{ $activity->max_slot  != null ? ($activity->current_slot != null ?  $activity->current_slot."/".$activity->max_slot : "0/".$activity->max_slot ) : "Open" }}</span>
                    <div class="registration__section">
                        <br />
                        <div class="col-md-10">
                            <label for="name">Register for: </label>
                            <div class="input-group mb-2">
                                <select class="form-select" id="participant" name="user_id">
                                    aria-label="Example select with button addon">
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    <!-- dependent -->
                                    @foreach ($dependents as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->firstname }}</option>
                                    @endforeach
                                </select>
                                <button class="dds__button dds__button--secondary dds__button--sm" type="button"
                                    id="append">Add</button>
                            </div>
                            <input type="hidden" name="activity_id" value="{{$activity->id}}" />
                        </div>

                        <ul id="participant_list" class="dds__list">

                        </ul>

                    </div>
                </div>
                <div class="dds__card__action">
                    <button class="dds__button dds__button--sm" type="submit"
                        aria-describedby="card  Primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('css')

<link href="{{ asset('assets/css/nurulstyle.css') }}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

@endpush

@push('js')
<script src="https://dds.dell.com/components/2.19.1/js/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/nurulscript.js') }}"></script>
@endpush
