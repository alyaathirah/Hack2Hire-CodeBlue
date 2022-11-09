@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Attendance QR Scanner'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div id="app">
            
            <div class="sidebar">
                <div class="video-container">
                    <video class="video" id="preview"></video>
                </div>
                <ul v-if="scans.length === 0">
                    <p class="empty">No scans found</p>
                </ul>
                
                <section class="cameras">
                    <h4>Cameras</h4>
                    <ul>
                        <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                        <li v-for="camera in cameras">
                        <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">@{{ formatName(camera.name) }}</span>
                        <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                            <a @click.stop="selectCamera(camera)">@{{ formatName(camera.name) }}</a>
                        </span>
                        </li>
                    </ul>
                </section>
                <section class="scans">
                    <h4>Participant Info</h4>
                    <transition-group name="scans" tag="ul">
                        <li v-for="scan in scans" :key="scan.date" :title="scan.content">@{{ scan.content }}
                            <!-- <form action="target.php" method="get"> -->
                            <form action="{{url('qr-scanner-store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="qr" :key="scan.date" :value="scan.content" />
                            <input type="submit" value="Submit Attendance"/>
                            </form>
                        </li>
                    </transition-group>
                    @if(session('success'))
                    <?php
                        $participants = session()->get('success');
                        $firstname = $participants->firstname;
                        $lastname = $participants->lastname;
                        $age_category = $participants->age_category;
                    ?>
                    <p><?php echo $firstname;?> <?php echo $lastname;?></p>
                    <p><?php echo $age_category;?></p>
                    @endif
                    
                    
                </section>
            
                <input class="dds__button" type="button" value="Camera On" onclick="camera_toggle()" id="camera-toggle"></input> 

            

            </div>
        </div>
    </div>
    </div>
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="assets/js/qr-scanner.js"></script>
@endpush
@push('css')
<link id="pagestyle" href="{{ asset('assets/css/qr-style.css') }}" rel="stylesheet" />
@endpush
@endsection