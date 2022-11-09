@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Attendance List'])
    
    <div class="container">
      <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3">
        <div class="dds__card">
          <div class="dds__card__content">
            <div class="dds__card__header">
              <span class="dds__card__header__text">
                <h5 class="dds__card__header__title">Attendance List</h5>
              </span>
              
            </div>
            <div class="dds__card__body mt-3">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age Category</th>
                        <th>T-Shirt Size</th>
                        <th>Attend Time</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($participants as $participant)
                  <tr>
                    <td>{{$participant->firstname}} {{$participant->lastname}}</td>
                    <td>{{$participant->age_category}}</td>
                    <td>{{$participant->shirt_size}}</td>
                    <td>{{$participant->attend_time}}</td>
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
    const myModalEl = document.getElementById('attendanceModal')
    myModalEl.addEventListener('show.bs.modal')
}

$(document).ready(function () {
    $('#example').DataTable();
});
</script>

@endpush




