@extends('layouts.app')

@section('content')
    @include('layouts.navbars.guest.navbar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .form-section{
            display: none;
        }
        .form-section.current{
            display: inline;
        }
        .parsley-errors-list{
            color:red;
        }
    </style>
    <main class="main-content">
        <div class="container vh-100 justify-content-center align-items-center mt-5">
            <div class="row justify-content-md-center">
                <div class="col-md-9 ">
                    <div class="card px-5 py-3 mt-5 shadow">
                        <h1 class="text-center mt-3 mb-4">Dell Charity Engage Event Registration</h1>
                            <div class="nav nav-fill my-3">
                                <label class="nav-link shadow-sm step0 border ml-2">Step One</label>
                                <label class="nav-link shadow-sm step1 border ml-2">Step Two</label>
                                {{-- <label class="nav-link shadow-sm step2 border ml-2">Step Three</label> --}}
                            </div>
                        <form method="POST" class="employee-form" action="{{ url('register-event-post') }}" >
                        @csrf
                        @method('POST')
                        {{-- First Step --}}
                        <div class="form-section">
                        @for ($i = 1; $i <= $total; $i++)
                            <div class="dds__card p-5 m-5">
                                @if ($i <= $adult)
                                    @php 
                                        $str="Adult";
                                        $num = $i;
                                    @endphp
                                @else
                                    @php 
                                        $str="Child";
                                        $num = $i - $adult;
                                    @endphp
                                @endif
                                <h5>{{ $str . " " . $num }}</h5>
                                    <label for="">First Name:</label>
                                    <input type="text" class="form-control mb-3" name="firstname[]" required>
                                    <label for="">Last Name:</label>
                                    <input type="text" class="form-control mb-3" name="lastname[]" required>
                                    <div class="dds__select " data-dds="select">
                                        <label id="select-0Label" for="select-0">Employee Status</label>
                                        <div class="dds__select__wrapper">
                                            <select id="select-0" class="dds__select__field" name="employee_status[]" aria-describedby="select-0Helper">
                                                <option value="non-employee">Non-employee</option>
                                                <option value="employee">Employee</option>
                                            </select>
                                            <div id="select-0Feedback" class="dds__invalid-feedback">This field is Required</div>
                                        </div>
                                    </div>      
                                    <div class="dds__select " data-dds="select">
                                        <label id="select-0Label" for="select-0">Worksite</label>
                                        <div class="dds__select__wrapper">
                                            <select id="select-0" class="dds__select__field" name="worksite[]" aria-describedby="select-0Helper">
                                                <option value="">Non-employee</option>
                                                <option value="penang">Penang</option>
                                                <option value="cyberjaya">Cyberjaya</option>
                                                <option value="apcc2">APCC2</option>
                                            </select>
                                            <div id="select-0Feedback" class="dds__invalid-feedback">This field is Required</div>
                                        </div>
                                    </div>     
                                    <div class="dds__input-text__container" data-dds="input-mask" data-mask="(999) 999-9999">
                                        <label id="inputmask-label-866077187" for="inputmask-884970456">Phone Number (Optional)</label>
                                        <div class="dds__input-text__wrapper">
                                        <input
                                            type="tel"
                                            class="dds__input-text"
                                            maxlength="256"
                                            name="phone[]"
                                            id="inputmask-884970456"
                                            required=""
                                            aria-labelledby="inputmask-label-866077187 inputmask-helper-830276334"
                                        />
                                        <small id="inputmask-helper-830276334" class="dds__input-text__helper">Example: 012-3456789</small>
                                        <div id="inputmask-feedback-780648282" class="dds__invalid-feedback">Please use format</div>
                                        </div>
                                    </div>   
                                    <div class="dds__select " data-dds="select">
                                        <label id="select-0Label" for="select-0">Shirt Size</label>
                                        <div class="dds__select__wrapper">
                                            <select id="select-0" class="dds__select__field" name="shirt_size[]" aria-describedby="select-0Helper">
                                                <option value="1-2">1 - 2 years</option>
                                                <option value="3-4">3 - 4 years</option>
                                                <option value="5-6">5 - 6 years</option>
                                                <option value="7-8">7 - 8 years</option>
                                                <option value="9-11">9 - 11 years</option>
                                                <option value="XS">XS</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="2XL">2XL</option>
                                                <option value="3XL">3XL</option>
                                                <option value="4XL">4XL</option>
                                                <option value="5XL">5XL</option>
                                            </select>
                                            {{-- <small id="select-0Helper" class="dds__select__helper">Helper text</small> --}}
                                            <div id="select-0Feedback" class="dds__invalid-feedback">This field is Required</div>
                                        </div>
                                    </div>
                                    <div class="dds__select " data-dds="select">
                                        <label id="select-0Label" for="select-0">Choose NGO to donate</label>
                                        <div class="dds__select__wrapper">
                                            <select id="select-0" class="dds__select__field" name="ngo_id[]" aria-describedby="select-0Helper">
                                                <option value="1">Epic Homes</option>
                                                <option value="2">SOLS 24/7</option>
                                                <option value="3">Free Tree Society</option>
                                                <option value="4">Mercy Malaysia</option>
                                                <option value="5">EcoKnights</option>
                                                <option value="6">Yellow House</option>
                                                <option value="7">Elom Empowerment</option>
                                                <option value="8">SUKA Society</option>
                                                <option value="9">MyKasih</option>
                                                <option value="10">Fugee School</option>
                                            </select>
                                            {{-- <small id="select-0Helper" class="dds__select__helper">Helper text</small> --}}
                                            <div id="select-0Feedback" class="dds__invalid-feedback">This field is Required</div>
                                        </div>
                                    </div>   
                            </div>
                        @endfor
                    </div>
                            {{-- Second Step --}}
                            {{-- <div class="form-section">
                                <div class="dds__col-12 dds__col--md-6 dds__col--lg-4 dds__mb-3">
                                    <div class="dds__card">
                                      <div class="dds__card__content">
                                        <div class="dds__card__header">
                                          <span class="dds__card__header__text">
                                            <h5 class="dds__card__header__title">Adult 1</h5>
                                            <span class="dds__card__header__subtitle">Optional Subtitle</span>
                                          </span>
                                        </div>
                                        <div class="dds__card__body">
                                          <p>Description text should not exceed more than a few lines.</p>
                                          <p>Description text should not exceed more than a few lines.</p>
                                          <p>Description text should not exceed more than a few lines.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div> --}}
                            {{-- Last Step --}}
                            <div class="form-section">
                                <fieldset required="" aria-required="true" class="dds__fieldset dds__radio-button-group" role="radiogroup">
                                    <legend>Select service</legend>
                                  
                                    <div class="dds__radio-button">
                                      <input class="dds__radio-button__input" type="radio" name="name-549821690" id="radio-button-control-897686901" value="standardopt1" />
                                      <label class="dds__radio-button__label" id="radio-button-label-897686901" for="radio-button-control-897686901">Visa / Mastercard</label>
                                    </div>
                                    <div class="dds__radio-button">
                                      <input class="dds__radio-button__input" type="radio" name="name-549821690" id="radio-button-control-381794037" value="standardopt1" />
                                      <label class="dds__radio-button__label" id="radio-button-label-381794037" for="radio-button-control-381794037">Online Banking</label>
                                    </div>
                                    <div id="radio-button-feedback" class="dds__invalid-feedback">Please choose one option</div>
                                  </fieldset>
                            </div>
                            <div class="form-navigation mt-3">
                                <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
                                <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(function() {
            var $sections=$('.form-section');
            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [Type=submit]').toggle(atTheEnd);
        
                const step= document.querySelector('.step'+index);
                step.style.backgroundColor="#17a2b8";
                step.style.color="white";
            }
            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }
            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex() - 1);
            });
            $('.form-navigation .next').click(function(){
                $('.employee-form').parsley().whenValidate({
                    group:'block-'+curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });
            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });
            navigateTo(0);
        });
    </script>
    @include('layouts.footers.guest.footer')
@endsection
