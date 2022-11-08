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
    <div class="page__title">Announcement</div>
    <hr class="blue-300" />

    <div class="row">

        <table id="ann-list" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anns as $ann)
                <?php
            $timestamp = strtotime($ann->created_at);
            $day = date('d', $timestamp);

            if ($day == 1) {
                $day = "MONDAY";
            } else if ($day == 2) {
                $day = "TUESDAY";
            } else if ($day == 3) {
                $day = "WEDNESDAY";
            } else if ($day == 4) {
                $day = "THURSDAY";
            } else if ($day == 5) {
                $day = "FRIDAY";
            } else if ($day == 6) {
                $day = "SATURDAY";
            } else if ($day == 7) {
                $day = "SUNDAY";
            }

        ?>
                <tr>    
                    <td>
                        <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3">
                            <div class="dds__card">
                                <div class="dds__card__content">

                                    <div class="row">
                                        <div
                                            class="col-md-4 d-flex class align-items-center justify-content-center date__container">
                                            <div class="text-center">
                                                <h2 class="day"><?= $day ?></h2>
                                                <div class="date"><?= date('d/m/Y',$timestamp) ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="dds__card__header">
                                                <span class="dds__card__header__text">
                                                    <h5 class="dds__card__header__title">{{ $ann->title }}</h5>
                                                </span>
                                            </div>
                                            <div class="dds__card__body">
                                                <p class="text_truncate_threeline">{{ $ann->description }}</p>
                                            </div>
                                            <div class="dds__card__action">
                                                <button class="dds__button dds__button--secondary dds__button--sm"
                                                    type="button" aria-describedby="card  Secondary">
                                                    View
                                                </button>
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
</div>


@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link id="pagestyle" href="{{ asset('assets/css/nurulstyle.css') }}" rel="stylesheet" />
@endpush

@push('js')
<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<!-- Datatable Script -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
</script>
<!-- Moment Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"
    integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Custom Script -->
<script src="{{ asset('assets/js/nurulscript.js') }}"></script>
@endpush
