@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Activity List'])
<div class="card shadow-lg mx-4 card-profile-bottom">
<div class="container">
    <!-- <div class="page__title">Announcement</div> -->
    <div class="dds__card__header">
              <span class="dds__card__header__text">
                <h5 class="dds__card__header__title">Announcement</h5>
              </span>
              
              <button type="button" class="dds__button" data-bs-toggle="modal" data-bs-target="#activityModal">
                <i class="dds__icon dds__icon--accessibility dds__card__header__iconn"></i>
                &nbsp&nbspAdd New Announcement
              </button>
            </div>
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
    <!-- Modal -->
    <div class="dds__modal modal-dialog-scrollable" id="activityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0.125rem">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="activityModalLabel">Add New Announcement</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
          </div>
          <div class="modal-body">
            <form data-dds="form" class="dds__form dds__container p-1 mb-0" method="POST" action="{{url('add-activity')}}">
              @csrf
              @method('POST')
              <fieldset class="dds__form__section">
                <legend>Announcement Details</legend>
                <div class="dds__row">
                  <div class="dds__col--1">
                    <div class="dds__input-text__container">
                      <label id="text-input-label-545247653" for="text-input-control-name-545247653">Title</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="text"
                          class="dds__input-text"
                          name="name"
                          id="text-input-control-545247653"
                          required=""
                          aria-labelledby="text-input-label-545247653 text-input-helper-545247653"
                        />
                        <small id="text-input-helper-545247653" class="dds__input-text__helper"></small>
                        <div id="text-input-error-545247653" class="dds__invalid-feedback">Enter a title to continue</div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="dds__row">
                  <div class="dds__col--1">
                    <div class="dds__text-area__container" data-dds="text-area">
                      <div class="dds__text-area__header">
                        <label id="text-area-label-256775854" for="text-area-control-256775854">Description</label>
                      </div>
                      <div class="dds__text-area__wrapper">
                        <textarea
                          class="dds__text-area"
                          name="description"
                          id="text-area-control-256775854"
                          data-maxlength="null"
                          aria-required="true"
                          aria-labelledby="text-area-label-256775854 text-area-helper-256775854"
                          required=""
                        ></textarea>
                        <small id="text-area-helper-256775854" class="dds__input-text__helper"></small>
                        <small id="text-area-error-256775854" class="dds__invalid-feedback">Enter a description to continue</small>
                      </div>
                    </div>
                  </div>
                </div>

              </fieldset>
              <div class="modal-footer">
                <button type="button" class="dds__button dds__button--secondary dds__button--md" data-bs-dismiss="modal" data-bs-target="#activityModal">Close</button>
                <button type="submit" class="dds__button dds__button--md">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection

@push('css')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link id="pagestyle" href="{{ asset('assets/css/nurulstyle.css') }}" rel="stylesheet" />
<link rel="stylesheet" crossorigin href="https://dds.dell.com/components/2.19.1/css/dds-fonts.min.css" />
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
<script>
  window.onload=function(){
    const myModalEl = document.getElementById('activityModal')
    myModalEl.addEventListener('show.bs.modal')
}

$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endpush