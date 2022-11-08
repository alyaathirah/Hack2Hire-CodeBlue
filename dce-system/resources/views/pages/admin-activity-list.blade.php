@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Activity List'])
    
    <div class="container">
      <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3">
        <div class="dds__card">
          <div class="dds__card__content">
            <div class="dds__card__header">
              <span class="dds__card__header__text">
                <h5 class="dds__card__header__title">Activity List</h5>
              </span>
              
              <button type="button" class="dds__button" data-bs-toggle="modal" data-bs-target="#activityModal">
                <i class="dds__icon dds__icon--accessibility dds__card__header__iconn"></i>
                &nbsp&nbspAdd New Activity
              </button>
            </div>
            <div class="dds__card__body mt-3">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Age Category</th>
                        <th>Slot</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  {{-- <tr>
                    <td>huihu</td>
                    <td>ASASA</td>
                    <td>ASASA</td>
                    <td>ASAS</td>
                    <td>SASAS</td>
                    <td>sdasad</td>
                    <td>Edit and View</td>
                  </tr> --}}
                  @foreach ($activities as $activity)
                  <tr>
                    <td>{{$activity->name}}</td>
                    <td>{{$activity->start_time}}</td>
                    <td>{{$activity->end_time}}</td>
                    <td>{{$activity->age_category}}</td>
                    <td>{{$activity->current_slot}}/{{$activity->max_slot}}</td>
                    <td>{{$activity->type}}</td>
                    <td><button type="button" class="dds__button dds__button--mini" data-bs-toggle="modal" data-bs-target="#editModal" data-whatever="{{ $activity->id }}">
                      Edit
                    </button>&nbsp&nbsp
                      <a class="dds__button dds__button--mini" href="{{url('/admin-activity-participant/'.$activity->id) }}" role="button" id="{{ $activity->id }}">View Participants</a>
                  </tr>
                  
                  @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Modal -->
    <div class="dds__modal modal-dialog-scrollable" id="activityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0.125rem">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="activityModalLabel">Add New Activity</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
          </div>
          <div class="modal-body">
            <form data-dds="form" class="dds__form dds__container p-1 mb-0" method="POST" action="{{url('add-activity')}}">
              @csrf
              @method('POST')
              <fieldset class="dds__form__section">
                <legend>Activity Details</legend>
                <div class="dds__row">
                  <div class="dds__col--1 dds__col--sm-3">
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
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__select" data-dds="select">
                      <label id="select-label-730835274" for="select-control-730835274">Event</label>
                      <div class="dds__select__wrapper">
                        <select name="event" id="select-control-730835274" class="dds__select__field" aria-describedby="select-helper-730835274" required="">
                          <option value="" class="dds__select__option--placeholder" selected>Select an option</option>
                          <option value="1">Dell Charity Event</option>
                        </select>
                        <small id="select-helper-730835274" class="dds__select__helper"></small>
                        <div id="select-error-730835274" class="dds__invalid-feedback"></div>
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
                <div class="dds__row">
                  <div class="dds__col--2 dds__col--sm-2">
                    <div class="dds__input-text__container">
                      <label id="text-input-label-943990465" for="text-input-control-name-943990465">Start Time</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="time"
                          class="dds__input-text"
                          name="start-time"
                          id="text-input-control-943990465"
                          aria-labelledby="text-input-label-943990465 text-input-helper-943990465"
                        />
            
                        <small id="text-input-helper-943990465" class="dds__input-text__helper">Choose start time</small>
                      </div>
                    </div>
                  </div>
                  <div class="dds__col--2 dds__col--sm-2">
                    <div class="dds__input-text__container">
                      <label id="text-input-label-943990465" for="text-input-control-name-943990465">End Time</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="time"
                          class="dds__input-text"
                          name="end-time"
                          id="text-input-control-943990465"
                          aria-labelledby="text-input-label-943990465 text-input-helper-943990465"
                        />
            
                        <small id="text-input-helper-943990465" class="dds__input-text__helper">Choose end time</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dds__row">
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__input-text__container" data-dds="input-mask" data-mask="(999) 999 - 9999">
                      <label id="inputmask-label-361872271" for="inputmask-861793963">Slots</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="number"
                          class="dds__input-text"
                          maxlength="256"
                          name="slot"
                          id="inputmask-861793963"
                          required
                          aria-labelledby="inputmask-label-361872271 inputmask-helper-154907673"
                        />
                        <div id="inputmask-feedback-460077514" class="dds__invalid-feedback">Enter slots continue</div>
                      </div>
                    </div>
                  </div>
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__select" data-dds="select">
                      <label id="select-label-730835274" for="select-control-730835274">Age Category</label>
                      <div class="dds__select__wrapper">
                        <select name="age-category" id="select-control-730835274" class="dds__select__field" aria-describedby="select-helper-730835274" required="">
                          <option value="" class="dds__select__option--placeholder" selected>Select an option</option>
                          <option value="adult">Adult</option>
                          <option value="child">Child</option>
                        </select>
                        <small id="select-helper-730835274" class="dds__select__helper"></small>
                        <div id="select-error-730835274" class="dds__invalid-feedback"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dds__row">
                <div class="dds__col--1 dds__col--sm-3">
                  <div class="dds__select" data-dds="select">
                    <label id="select-label-730835274" for="select-control-730835274">Type (Open/Close)</label>
                    <div class="dds__select__wrapper">
                      <select name="type" id="select-control-730835274" class="dds__select__field" aria-describedby="select-helper-730835274" required="">
                        <option value="" class="dds__select__option--placeholder" selected>Select an option</option>
                        <option value="Open">Open</option>
                        <option value="Close">Close</option>
                      </select>
                      <small id="select-helper-730835274" class="dds__select__helper"></small>
                      <div id="select-error-730835274" class="dds__invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                </div>
              </fieldset>
              <div class="modal-footer">
                <button type="button" class="dds__button dds__button--secondary dds__button--md" data-bs-dismiss="modal" data-bs-target="#activityModal">Cancel</button>
                <button type="submit" class="dds__button dds__button--md">Add Activity</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Modal -->
    <div class="dds__modal modal-dialog-scrollable" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0.125rem">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editModalctivityModalLabel">Edit Activity</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
          </div>
          <div class="modal-body">
            <form data-dds="form" class="dds__form dds__container p-1 mb-0" method="POST" action="{{url('/update-activity/'.$activity->id)}}">
              @csrf
              @method('POST')
              <fieldset class="dds__form__section">
                <legend>Activity Details</legend>
                <div class="dds__row">
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__input-text__container">
                      <label id="text-input-label-545247653" for="text-input-control-name-545247653">Title</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="text"
                          class="dds__input-text"
                          name="name"
                          id="text-input-control-545247653"
                          required=""
                          value = '{{$activity->name}}'
                          aria-labelledby="text-input-label-545247653 text-input-helper-545247653"
                        />
                        <small id="text-input-helper-545247653" class="dds__input-text__helper"></small>
                        <div id="text-input-error-545247653" class="dds__invalid-feedback">Enter a title to continue</div>
                      </div>
                    </div>
                  </div>
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__select" data-dds="select">
                      <label id="select-label-730835274" for="select-control-730835274">Event</label>
                      <div class="dds__select__wrapper">
                        <select name="event" id="select-control-730835274" class="dds__select__field" aria-describedby="select-helper-730835274" required="">
                          <option value="" class="dds__select__option--placeholder" selected>Select an option</option>
                          <option value="1">Dell Charity Event</option>
                        </select>
                        <small id="select-helper-730835274" class="dds__select__helper"></small>
                        <div id="select-error-730835274" class="dds__invalid-feedback"></div>
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
                          value = {{$activity->description}}
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
                <div class="dds__row">
                  <div class="dds__col--2 dds__col--sm-2">
                    <div class="dds__input-text__container">
                      <label id="text-input-label-943990465" for="text-input-control-name-943990465">Start Time</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="time"
                          class="dds__input-text"
                          name="start-time"
                          id="text-input-control-943990465"
                          aria-labelledby="text-input-label-943990465 text-input-helper-943990465"
                        />
            
                        <small id="text-input-helper-943990465" class="dds__input-text__helper">Choose start time</small>
                      </div>
                    </div>
                  </div>
                  <div class="dds__col--2 dds__col--sm-2">
                    <div class="dds__input-text__container">
                      <label id="text-input-label-943990465" for="text-input-control-name-943990465">End Time</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="time"
                          class="dds__input-text"
                          name="end-time"
                          id="text-input-control-943990465"
                          aria-labelledby="text-input-label-943990465 text-input-helper-943990465"
                        />
            
                        <small id="text-input-helper-943990465" class="dds__input-text__helper">Choose end time</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dds__row">
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__input-text__container" data-dds="input-mask" data-mask="(999) 999 - 9999">
                      <label id="inputmask-label-361872271" for="inputmask-861793963">Slots</label>
                      <div class="dds__input-text__wrapper">
                        <input
                          type="number"
                          class="dds__input-text"
                          maxlength="256"
                          name="slot"
                          id="inputmask-861793963"
                          required
                          aria-labelledby="inputmask-label-361872271 inputmask-helper-154907673"
                        />
                        <div id="inputmask-feedback-460077514" class="dds__invalid-feedback">Enter slots continue</div>
                      </div>
                    </div>
                  </div>
                  <div class="dds__col--1 dds__col--sm-3">
                    <div class="dds__select" data-dds="select">
                      <label id="select-label-730835274" for="select-control-730835274">Age Category</label>
                      <div class="dds__select__wrapper">
                        <select name="age-category" id="select-control-730835274" class="dds__select__field" aria-describedby="select-helper-730835274" required="">
                          <option value="" class="dds__select__option--placeholder" selected>Select an option</option>
                          <option value="Adult">Adult</option>
                          <option value="Child">Child</option>
                        </select>
                        <small id="select-helper-730835274" class="dds__select__helper"></small>
                        <div id="select-error-730835274" class="dds__invalid-feedback"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dds__row">
                <div class="dds__col--1 dds__col--sm-3">
                  <div class="dds__select" data-dds="select">
                    <label id="select-label-730835274" for="select-control-730835274">Type (Open/Close)</label>
                    <div class="dds__select__wrapper">
                      <select name="type" id="select-control-730835274" class="dds__select__field" aria-describedby="select-helper-730835274" required="">
                        <option value="" class="dds__select__option--placeholder" selected>Select an option</option>
                        <option value="Open">Open</option>
                        <option value="Close">Close</option>
                      </select>
                      <small id="select-helper-730835274" class="dds__select__helper"></small>
                      <div id="select-error-730835274" class="dds__invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                </div>
              </fieldset>
              <div class="modal-footer">
                <button type="button" class="dds__button dds__button--secondary dds__button--md" data-bs-dismiss="modal" data-bs-target="#editModal">Cancel</button>
                <button type="submit" class="dds__button dds__button--md">Edit Activity</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- @if(session('edit-activity'))
    <script>
      $(document).ready(function(){
        $("#editModal").modal('show');
    });
      </script> --}}
    
    
    {{-- @endif --}}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link id="pagestyle" href="{{ asset('assets/css/nurulstyle.css') }}" rel="stylesheet" />
<link rel="stylesheet" crossorigin href="https://dds.dell.com/components/2.19.1/css/dds-fonts.min.css" />
@endpush

@push('js')

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<!-- Datatable Script -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!-- Custom Script -->
<script src="assets/js/nurulscript.js"></script>
<script>
  window.onload=function(){
    const myModalEl = document.getElementById('activityModal')
    myModalEl.addEventListener('show.bs.modal')
}

$(document).ready(function () {
    $('#example').DataTable();
});

$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.dds__input-text').text('New message to ' + recipient)
  modal.find('.dds__input-text').val(recipient)
})
</script>

@endpush




