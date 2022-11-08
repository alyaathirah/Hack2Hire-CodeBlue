@extends('layouts.app')

@section('content')

    <main class="main-content mt-0">
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="pb-4 text-start text-center">
                                <h3>Account Sign In</h3>
                            </div>
                            <div>
                                <form data-dds="form" class="dds__form dds__container" method="POST" action="{{ route('login.perform') }}">
                                    @csrf
                                    @method('post')
                                    <fieldset class="dds__form__section">
                                        <div class="flex flex-col mb-3">
                                            <div class="dds__input-text__container">
                                                <label id="text-input-label-326527268" for="text-input-control-name-326527268">Email</label>
                                                <div class="dds__input-text__wrapper">
                                                    <input
                                                        type="text"
                                                        class="dds__input-text"
                                                        name="email"
                                                        id="text-input-control-326527268"
                                                        required=""
                                                        aria-labelledby="text-input-label-326527268 text-input-helper-326527268"
                                                    />
                                        
                                                    <small id="text-input-helper-326527268" class="dds__input-text__helper">Use your dell.com address</small>
                                                    <div id="text-input-error-326527268" class="dds__invalid-feedback">Enter an email to continue</div>
                                                </div>
                                            </div>
                                    
                                            <div class="dds__input-text__container">
                                                <label id="inputpassword-label-217457945" for="inputpassword-791201131">Password</label>
                                                <div class="dds__input-text__wrapper">
                                                    <input
                                                        id="inputpassword-791201131"
                                                        name="password"
                                                        type="password"
                                                        class="dds__input-text"
                                                        maxlength="256"
                                                        required=""
                                                        aria-labelledby="inputpassword-label-456824935 inputpassword-helper-983537496"
                                                    />
                                        
                                                    <small id="inputpassword-helper-983537496" class="dds__input-text__helper"></small>
                                                    <div id="inputpassword-feedback-474804412" class="dds__invalid-feedback">Error password</div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-1 mx-auto">
                                            Forgot your password? 
                                            <a href="{{ route('reset-password') }}" class="text-primary text-gradient">Reset password</a>
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <button class="dds__button dds__button--block mt-4 mb-0" type="submit">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="container position-relative bg-gradient-primary h-100 d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg'); background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h3 class="mt-5 text-white font-weight-bolder position-relative">Dell Charity Engage</h3>
                            <p class="mx-5 text-white position-relative">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
