@extends('layouts.app')

@section('content')

<div class="position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            @include('layouts.navbars.guest.navbar')
        </div>
    </div>
</div>

<div class="">
    <header class="section__registration">
        <img src="img/funrun.jpg" alt="Placeholder-Image">
        <section>
            <div class="title"><?= $event->title ?></div>
            <div class="subtitle mb-2">Bringing the bonds closer!</div>
            <div class="paragraph"><?= $event->description ?></div>
            <a class="dds__button dds__button--sm" href="{{url('/register-dependant') }}" role="button">Register Event</a>
        </section>
    </header>

    <div class="section__news">
        <div class="subtitle">Announcement</div>
        <hr class="blue-300" />
        <div class="row">

        @foreach ($anns as $ann)
        <div class="col-md-4">
                <div class="dds__card">
                    <div class="dds__card__media">
                        <img src="https://i.dell.com/sites/csimages/Learn_Imagery/all/565x363-services-splitter-3.jpg"
                            alt="A person at a desk using a laptop" />
                    </div>
                    <div class="dds__card__content">
                        <div class="dds__card__header">
                            <span class="dds__card__header__text">
                                <h5 class="dds__card__header__title">{{ $ann->title }}</h5>
                            </span>
                        </div>
                        <div class="dds__card__body text_truncate_threeline">
                            <p>{{ $ann->description }}</p>
                        </div>
                        <div class="dds__card__action">
                            <button class="dds__button dds__button--sm" type="button"
                                aria-describedby="card 0 Primary">View</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="section__gallery">
        <div class="subtitle">Gallery</div>
        <hr class="blue-300" />
        <div class="row my-2">
            <div class="col-lg-4 col-md-6">
                <img src="https://images.unsplash.com/photo-1511899135790-0af61b1986f7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4ef514b84620b3bf6f588f8b25749309&auto=format&fit=crop&w=1350&q=80"
                    class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="https://source.unsplash.com/random" class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="https://source.unsplash.com/random" class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-4 col-md-6">
                <img src="https://source.unsplash.com/random" class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="https://images.unsplash.com/photo-1523057530100-383d7fbc77a1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cff1b2c9744c71e84145dd78928513fc&auto=format&fit=crop&w=1349&q=80"
                    class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="https://source.unsplash.com/random" class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-4 col-md-6">
                <img src="https://source.unsplash.com/random" class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="https://source.unsplash.com/random" class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="https://images.unsplash.com/photo-1496660067708-010ebdd7ce72?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ea3514e6e00d8ce25c24d992b97929d9&auto=format&fit=crop&w=1350&q=80"
                    class="img-thumbnail" style="width:100%; height: 17em; object-fit:cover">
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<link href="{{ asset('assets/css/nurulstyle.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endpush