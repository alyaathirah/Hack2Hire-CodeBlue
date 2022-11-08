@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Announcement'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
    <?php
        $title = $description = "";
    ?>
    <form class="dds__form dds__container" method="POST" action="{{url('event-create-store')}}">
    @csrf
        <fieldset class="dds__form__section">
            <legend>Create new event</legend>
            <div class="dds__row">
            <div class="dds__col--1 dds__col--sm-3">
                <div class="dds__input-text__container">
                <label id="text-input-label-804476461" for="text-input-control-name-804476461">Event name</label>
                <div class="dds__input-text__wrapper">
                    <input
                    type="text"
                    class="dds__input-text"
                    name="title"
                    id="text-input-control-804476461"
                    required=""
                    value="<?php echo $title;?>"
                    />

                    <small id="text-input-helper-804476461" class="dds__input-text__helper"></small>
                    <div id="text-input-error-804476461" class="dds__invalid-feedback">Enter the event name to continue</div>
                </div>
                </div>
            </div>
            </div>
        </fieldset>
        <fieldset class="dds__form__section">
            <div class="dds__row">
            <div class="dds__col--1">
                <div class="dds__text-area__container" data-dds="text-area">
                <div class="dds__text-area__header">
                    <label id="text-area-label-612850806" for="text-area-control-612850806">Description</label>
                </div>
                <div class="dds__text-area__wrapper">
                    <textarea
                    class="dds__text-area"
                    name="description"
                    id="text-area-control-612850806"
                    data-maxlength="null"
                    aria-required="true"
                    aria-labelledby="text-area-label-612850806 text-area-helper-612850806"
                    required=""
                    value="<?php echo $description;?>"
                    ></textarea>
                    <small id="text-area-helper-612850806" class="dds__input-text__helper"></small>
                    <small id="text-area-error-612850806" class="dds__invalid-feedback">Enter a description to continue</small>
                </div>
                </div>
            </div>
            </div>
        </fieldset>

        <button class="dds__button" type="submit">Submit</button>
    </form>
    </div>
@endsection
