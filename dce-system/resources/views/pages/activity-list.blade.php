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
    <div class="page__title"> Activity List </div>
    @if (isset($success))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $success }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table id="activity-list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Activity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
            <tr>
                <td>
                    <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3">
                        <div class="dds__card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('img/funrun.jpg') }}" class="img-fluid"
                                        style="object-fit: cover; height: 100%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="dds__card__content">
                                        <div class="dds__card__header">
                                            <span class="dds__card__header__text">
                                                <h5 class="dds__card__header__title">{{ $activity->name }}</h5>
                                                <span
                                                    class="dds__card__header__subtitle">{{ $activity->age_category }}</span>
                                            </span>
                                        </div>
                                        <div class="dds__card__body">
                                            <p>
                                                <span
                                                    class="text_truncate_threeline">{{ $activity->description }}</span>
                                                <br />
                                                <span class="slot__span">Slots:
                                                    {{ $activity->max_slot  != null ? ($activity->current_slot != null ?  $activity->current_slot."/".$activity->max_slot : "0/".$activity->max_slot ) : "Open" }}</span>
                                            </p>
                                        </div>
                                        <div class="dds__card__action">
                                            <a class="dds__button dds__button--sm"
                                                href="{{url('/register-activity/'.$activity->id) }}" role="button"
                                                id="{{ $activity->id }}">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link id="pagestyle" href="{{ asset('assets/css/nurulstyle.css') }}" rel="stylesheet" />
<link rel="stylesheet" crossorigin href="https://dds.dell.com/components/2.19.1/css/dds-fonts.min.css" />
@endpush
@push('js')
<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<!-- Datatable Script -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
</script>
<!-- Custom Script -->
<script src="assets/js/nurulscript.js"></script>
@endpush
