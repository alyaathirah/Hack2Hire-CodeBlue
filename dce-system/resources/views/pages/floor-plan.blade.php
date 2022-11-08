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
    <div class="page__title">Floor Plan</div>
    <hr class="blue-300" />

    <div class="border">
        <div id="panzoom">
            <img src="img/floor-plan.png" width="auto" height="500"                                                                                                                                                                ">
        </div>
    </div>
</div>
@endsection

@push('css')
<link id="pagestyle" href="assets/css/nurulstyle.css" rel="stylesheet" />
@endpush

@push('js')
    <!-- jQuery Script -->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
        integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <!-- PanZoom Plugins -->
    <script src="https://unpkg.com/@panzoom/panzoom@4.5.1/dist/panzoom.min.js"></script>
    <!-- Custom Script -->
    <script src="assets/js/nurulscript.js"></script>
@endpush


