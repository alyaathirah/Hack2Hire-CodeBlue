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
    <div class="page__title"> My Ticket </div>
    <button class="dds__button dds__button--sm mb-3" id="download-ticket_btn" type="button">Download Ticket</button>

    <div class="dds__tabs dds__tabs--mobile-justified" data-dds="tabs" id="unique-id">
        <div class="dds__tabs__list-container">
            <ul class="dds__tabs__list dds__tabs__list--overflow" role="tablist">
                <li role="none">
                    <button id="tab-6-0" class="dds__tabs__tab" role="tab" aria-controls="tab-6-0-pane"
                        aria-selected="true" tabindex="0">
                        <span class="dds__tabs__tab__label" title="Tab 0">Ticket</span>
                    </button>
                </li>
                <li role="none">
                    <button id="tab-6-1" class="dds__tabs__tab" role="tab" aria-controls="tab-6-1-pane"
                        aria-selected="false" tabindex="-1">
                        <span class="dds__tabs__tab__label" title="Tab 1">Registered Activity</span>
                    </button>
                </li>
            </ul>
        </div>
        <div class="dds__tabs__pane-container">
            <div id="tab-6-0-pane" class="dds__tabs__pane" role="tabpanel" tabindex="0" aria-labelledby="tab-6-0"
                aria-hidden="false">
                <div id="ticket-list">
                    @foreach ($users as $user)
                    <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3 my-3">
                        <div class="dds__card">
                            <div class="dds__card__content">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="{{ asset('img/dell-logo.png') }}" class="img-fluid"
                                            style="object-fit: cover; width: 100%;">
                                        <div class="dds__card__body">
                                            <div>{{ $user->firstname." ".$user->lastname }}</div>
                                            <div>08:00 AM TO 03:00 PM</div>
                                            <div>Dell Global Business Center Sdn.Bhd., Plot P27, Bayan Lepas Industrial
                                                Zone Phase 4, Penang, 11900 Bayan Lepas</div>
                                            <span class="dds__card__header__subtitle fw-bold">{{ ucfirst($user->age_category) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/funrun.jpg') }}" class="img-fluid"
                                            style="object-fit: cover; height: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-6-1-pane" class="dds__tabs__pane" role="tabpanel" tabindex="-1" aria-labelledby="tab-6-1"
                aria-hidden="true">
                <div class="table-responsive">
                <table class="table" class="mb-4" >
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Activity Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->lastname." ".$user->firstname }}</td>
                            <td>{{ ucfirst($user->age_category) }}</td>
                            <td>{{ $user->activity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

            </div>
        </div>
    </div>

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
<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<!-- html2pdf Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Custom Script -->
<script src="{{ asset('assets/js/nurulscript.js') }}"></script>
@endpush
