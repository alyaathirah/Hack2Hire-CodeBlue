@extends('layouts.app')

@section('content')
    @include('layouts.navbars.guest.navbar')
    <main class="main-content vh-100 mt-0">
        <div class="vh-100">
            <div class="page-header align-items-center min-vh-50"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center mx-auto">
                            <h1 class="text-white mb-2">Dell Charity Engage Event Registration</h1>
                            <p class="text-lead text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <form data-dds="form" class="dds__form dds__container" name="form">
                @csrf --}}
                <div class="dds__container">
                    <div class="dds__container mt-5">
                        <div class="dds__card py-3">
                            <div class="dds__row">
                                <div class="dds__col--md-8">
                                    <div class="dds__card__content">
                                        <div class="dds__card__header">
                                            <span class="dds__card__header__text">
                                                <h5 class="dds__card__header__title">1 Day Admission for Adult</h5>
                                                <span class="dds__card__header__subtitle"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dds__col--md-2">
                                    <div class="dds__card__body">
                                        <p>MYR 10</p>
                                    </div>
                                </div>
                                <div class="dds__col--md-2">
                                    <div class="dds__card__action">
                                        <div class="dds__select" data-dds="select">
                                            <div class="dds__select__wrapper">
                                                <select id="select_adult_qty" class="dds__select__field" aria-describedby="select-helper-421247159">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                                <div id="select_adult_qty" class="dds__invalid-feedback">Error Message</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dds__container mt-3">
                        <div class="dds__card py-3">
                            <div class="dds__row">
                                <div class="dds__col--md-8">
                                    <div class="dds__card__content">
                                        <div class="dds__card__header">
                                            <span class="dds__card__header__text">
                                                <h5 class="dds__card__header__title">1 Day Admission for Child</h5>
                                                <span class="dds__card__header__subtitle">12 years old and below.</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dds__col--md-2">
                                    <div class="dds__card__body">
                                        <p>MYR 5</p>
                                    </div>
                                </div>
                                <div class="dds__col--md-2">
                                    <div class="dds__card__action">
                                        <div class="dds__select" data-dds="select">
                                            <div class="dds__select__wrapper">
                                                <select id="select_child_qty" class="dds__select__field" aria-describedby="select-helper-421247159">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                                <div id="select_kid_qty" class="dds__invalid-feedback">Error Message</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dds__container">
                        <div class="text-center">
                            <a  id="nextBtn" class="dds__button dds__button--block dds__button--secondary mt-4 mb-0" type="submit" role="button">Next</a>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script>
        $('#nextBtn').click(function(){
            var adult_qty = $('#select_adult_qty').val();
            var child_qty = $('#select_child_qty').val();
            var refresh = window.location.protocol + "//" + window.location.host + '/register-event?adult='+adult_qty+'&child='+child_qty+'';    
            window.location.href = refresh;
        })
    </script>
@endpush
