@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Announcement'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <?php $code = "meow";?>
            <div class="visible-print text-center">
                {!! QrCode::size(100)->generate($code); !!}
            </div>
        </div>
    </div>
    
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
@endpush
@endsection