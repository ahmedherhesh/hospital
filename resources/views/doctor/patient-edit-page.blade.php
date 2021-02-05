@extends('doctor.master')
@section('title')
<title>Document</title>
@endsection
@section('content')
<!-- start tabs section -->
<div class="clearfix tabs-section">
    {{ View::make('doctor.sidebar') }}
    <div class="col-md-10">
        {{ View::make('doctor.navbar') }}
        <div class="clearfix mt20">
            <div class="adv">
            </div>
        </div>
        <div class="clearfix ">
            <div class=" col-md-3 white-3 patient-2 ">
                @if($patient->gender == 'male')
                    <img src="{{ asset('images/male.png') }}" alt="male">
                @else
                    <img src="{{ asset('images/female.png') }}" alt="female">
                @endif
                <p>{{ $patient->fullname }}</p>
                <h1><i class="fas fa-calendar-alt"></i>last examination date :</h1>
                <span>{{ isset($patientEx) ? $patientEx->examination_date : '' }}</span>
            </div>
            <div class="col-md-8 white-3 patient-cont-2 ">
                <div class="clearfix">
                    <div class="col-md-6">
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-id-card"></i>ID No. :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $patient->code_number }}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-transgender"></i>Gender :</h1>
                            </div>
                            <div class="col-md-8">
                                @if($patient->gender == 'male')
                                    <p>Male</p>
                                @else
                                    <p>Female</p>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-calendar-day"></i>Age :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $patient->age }}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-map-marker-alt"></i>Address :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $patient->adress }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="far fa-mobile-android-alt"></i>Phone :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $patient->mobile_number }}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-stethoscope"></i>Chronic Diseases :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ isset($diseasesP) ? $diseasesP->chronic_diseases : '' }}
                                </p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-edit"></i>Notes :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ isset($diseasesP) ? $diseasesP->notes : '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="collapsed add-new mt-30 " data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="false" aria-controls="collapseThree"><a href="#" data-toggle="pill">edit</a></button>
        <div id="collapseThree" class="clearfix white-3 edit collapse" aria-labelledby="headingTwo"
            data-parent="#accordion-3">
            <div class="clearfix">
                <h1>editing profile</h1>
            </div>
            <form action="{{route('edit_profile')}}" method="post">
                @csrf
                <div class="step1">
                    <span class="info"><i class="fas fa-info-circle infoo"></i>information about patient :</span>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                            <input type="number" name="mobile_number" class="form-control ml15" id="exampleInputEmail1"
                                placeholder="mobile number">
                                @error('mobile_number')
                                    <div class="error text-danger">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1"> address</label>
                            <input type="text" class="form-control ml15" id="exampleInputEmail1" name="address" placeholder="address">
                            @error('address')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">age</label>
                            <input type="number" class="form-control ml15" id="exampleInputEmail1" name="age" placeholder="age">
                            @error('age')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb30">
                            <label for="exampleInputEmail1">gender</label>
                            <label class="radio-btn"><input type="radio" name="gender" class="mr" value="male" checked ><img class="wid" src="{{asset('images/male.png')}}" alt="male"></label>
                            <label class="radio-btn"><input type="radio" name="gender" class="mr" value="female"><img class="wid"src="{{asset('images/female.png')}}" alt="female"></label>
                            @error('gender')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <span class="info"><i class="fas fa-file-alt infoo"></i>The History of Patient with Any Disease :</span>
                    <div class="step_21">
                        <div class="row">
                            <label class="ml" for="exampleInputEmail1">Chronic Diseases</label>
                            <input type="text" name="chronic_diseases" class="form-control chronic" id="exampleInputEmail1" placeholder="">
                            @error('chronic_diseases')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror
                        </div><br>
                        <div class="row">
                            <label class="ml" for="exampleInputEmail1">notes</label>
                            <div class="clearfix">
                                <div class="col-md-9">
                                    <textarea class="notes" name="diseases_notes" placeholder="enter any other notes about the patient ..."></textarea>
                                    @error('notes')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <ul class="links mt0">
                            <li><button type="submit" class="preview">save</button></li>
                        </ul>
                    </div>
                </div>
            </form>

        </div>
        <div class="clearfix white-3 mt-30 diag">
            <h1> <i class="fas fa-diagnoses"></i>diagnosis details</h1>
            <div class="clearfix bb">
                <div class="col-md-2">
                    <h2><i class="fas fa-stethoscope"></i>details :</h2>
                </div>
                <div class="col-md-10">
                    <p>{{isset($diagnosis) ? $diagnosis->diagnosis_details : ''}}</p>
                </div>
            </div>
            <div class="clearfix bb">
                <div class="col-md-2">
                    <h2><i class="fas fa-edit"></i>notes :</h2>
                </div>
                <div class="col-md-10">
                    <p>{{isset($diagnosis) ? $diagnosis->notes : ''}}</p>
                </div>
            </div>
        </div>
        <button class="collapsed add-new mt-30 " data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="false" aria-controls="collapseFour"><a href="#" data-toggle="pill">edit</a></button>
        <div id="collapseFour" class="clearfix white-3 edit collapse" aria-labelledby="headingTwo"
            data-parent="#accordion-4">
            <div class="clearfix">
                <h1>editing diagnosis</h1>
            </div>
            <form action="{{route('edit_diagnosis')}}" method="post">
                @csrf
                <div class="step1">
                    <span class="info"><i class="fas fa-stethoscope infoo"></i>The Details of Patient Diagonsis :</span>
                    <div class="row">
                        <label class="ml30" for="exampleInputEmail1">diagnosis info</label>
                        <div class="clearfix">
                            <div class="col-md-9">
                                <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                <textarea class="notes" name="diagnosis_details" placeholder="enter all details about the patient ..."></textarea>
                                @error('diagnosis_details')
                                    <div class="error text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="ml30" for="exampleInputEmail1">notes</label>
                        <div class="clearfix">
                            <div class="col-md-9">
                                <textarea class="notes" name="diagnosis_notes" placeholder="enter any other notes about the patient ..."></textarea>
                                @error('diagnosis_notes')
                                    <div class="error text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <ul class="links mt0">
                            <li><button type="submit" class="preview">save</button></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix white-3 mt-30 diag">
            <h1> <i class="fas fa-vials"></i>medical tests details</h1>
            <div class="clearfix ">
                <div class="gallery" id="gallery">
                    <div class="clearfix mb30">
                        @if(isset($prescriptionP))
                            @foreach ($prescriptionP as $test)
                                @foreach (json_decode($test->required_test) as $required_test)
                                    @if(!empty($required_test->required_test))
                                        <div class="col-md-3">
                                            <div class="gallery-item">
                                                <div class="content">
                                                    <label for="" class="text-center">{{$required_test->required_test}}</label>
                                                    <img src="{{ asset('images/test-1.jpg') }}"alt="medical test">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
        {{-- <button class="collapsed add-new mt-30 " data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="false" aria-controls="collapseFive"><a href="#" data-toggle="pill">edit</a></button> --}}
        {{-- <div id="collapseFive" class="clearfix white-3 edit collapse" aria-labelledby="headingTwo"
            data-parent="#accordion-5">
            <div class="clearfix">
                <h1>editing medical tests</h1>
            </div>
            <div class="step1">
                <span class="info"><i class="fas fa-vials infoo"></i>The Tests of Patient :</span>
                <div class="row">
                    <label class="ml40" for="exampleInputEmail1">required tests</label>
                    <div class="clearfix">
                        <div class="col-md-8">
                            <div id="test">
                                <div class="clearfix mb20">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control " id="exampleInputEmail2"
                                            placeholder="Medical Tests">
                                    </div>
                                </div>
                            </div>
                            <div id="inputList"></div>
                        </div>
                        <div class="col-md-4">
                            <input type="button" value="Add new" class="add-new " id="addInputs" />
                        </div>
                    </div>
                    <label class="ml40" for="exampleInputEmail1">uploading files</label>
                    <div class="clearfix ml15">
                        <div class="col-md-9">
                            <input type="file" />
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <ul class="links mt0">
                        <li><a href="#" class="print">print</a></li>
                        <li><a href="#" class="preview">save</a></li>
                        <li><a href="#" class="cancel">cancel</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="clearfix white-3 mt-30 diag">
            <h1> <i class="fas fa-x-ray"></i>medical radiology details</h1>
            <div class="clearfix ">
                <div class="gallery" id="gallery-2">
                    <div class="clearfix mb30">
                        @if(isset($prescriptionP))
                            @foreach ($prescriptionP as $prescription)
                                    @foreach (json_decode($prescription->medical_radiology) as $medical)
                                        @if(!empty($medical->medical_radiology))
                                            <div class="col-md-3">
                                                <div class="gallery-item">
                                                    <div class="content">
                                                        <label for="" class="text-center">{{$medical->medical_radiology}}</label>
                                                        <img src="{{ asset('images/test-1.jpg') }}"alt="medical test">   
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- <button class="collapsed add-new mt-30 " data-toggle="collapse" data-target="#collapsesix" aria-expanded="false"
            aria-controls="collapsesix"><a href="#" data-toggle="pill">edit</a></button> --}}
        {{-- <div id="collapsesix" class="clearfix white-3 edit collapse" aria-labelledby="headingTwo"
            data-parent="#accordion-6">
            <div class="clearfix">
                <h1>editing medical radiology</h1>
            </div>
            <div class="step1">
                <span class="info"><i class="fas fa-x-ray infoo"></i>The Tests of Patient :</span>
                <div class="row">
                    <label class="ml40" for="exampleInputEmail1">required tests</label>
                    <div class="clearfix">
                        <div class="col-md-8">
                            <div id="radio">
                                <div class="clearfix mb20">
                                    <div class="col-md-8">
                                        <input type="email" class="form-control " id="exampleInputEmail2"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div id="inputList-2"></div>
                        </div>
                        <div class="col-md-4">
                            <input type="button" value="Add new" class="add-new" id="addInputs-2" />
                        </div>
                    </div>
                    <label class="ml40" for="exampleInputEmail1">uploading files</label>
                    <div class="clearfix">
                        <input type="file" />
                    </div>
                </div>
                <div class="clearfix">
                    <ul class="links mt0">
                        <li><a href="#" class="print">print</a></li>
                        <li><a href="#" class="preview">save</a></li>
                        <li><a href="#" class="cancel">cancel</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="clearfix white-3 mt-30 diag">
            
            <h1 class="col-md-3"> <i class="fas fa-pills"></i>Prescription details</h1>
            <table class="table table-striped w-auto mt00">
               
                <!--Table head-->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>medicine Details</th>
                        <th>notes</th>
                        <th>examination_date</th>
                        <th>next_examination</th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @if(isset($prescriptionP))
                        @foreach ($prescriptionP as $key=>$presc)
                            <tr class="table-info" id="table_info">
                                <td id="number">{{++$key}}</td>
                                <td>
                                    @foreach (json_decode($presc->medicine) as $pre)
                                    <a href="/doctor/prescription-print/{{$presc->id}}">
                                        <p class="drug-name"><b>Rx:</b> {{$pre->name}}</p>
                                        <p class="dose"><b>Dose:</b> {{$pre->dose}}</p>
                                        <p ><b>time:</b>{{$pre->time}}</p>
                                    </a>
                                    @endforeach
                                </td>
                                <td><a href="/doctor/prescription-print/{{$presc->id}}">{{$presc->notes}}</a></td>
                                <td><a href="/doctor/prescription-print/{{$presc->id}}">{{$presc->examination_date}}</a></td>
                                <td><a href="/doctor/prescription-print/{{$presc->id}}">{{$presc->next_examination}}</a></td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                <!--Table body-->
            </table>
            
            <!--Table-->
            <div class="text-center">
                {{$prescriptionP->links("pagination::bootstrap-4")}}
            </div>
        </div>

        <button class="collapsed add-new mt-30 mb30 " data-toggle="collapse" data-target="#collapseseven"
            aria-expanded="false" aria-controls="collapseseven"><a href="#" data-toggle="pill">edit</a></button>
        <div id="collapseseven" class="clearfix white-3 edit collapse" aria-labelledby="headingTwo"
            data-parent="#accordion-7">
            <div class="clearfix">
                <h1>editing prescription</h1>
            </div>
            <form action="{{ route('prescription_insert') }}" method="post">
                @csrf
                <div class="step1">
                    <span class="info"><i class="fas fa-pills infoo"></i>The medicine of Patient :</span>
                    <div class="step_21">
                        <div class="clearfix">
                            <div class="col-md-8">
                                <div id="medicine">
                                    <div class="repeat">
                                        <div class="row">
                                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                            <div class="col-md-4">
                                                <label class="ml15" for="exampleInputEmail1">required medicine</label>
                                                <input type="text" class="form-control livesearch" name="medicine[0][name]" autocomplete="off" required placeholder="">
                                                    <ul class="data"></ul>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="ml15" for="exampleInputEmail1">medicine dose</label>
                                                <input type="text" class="form-control" name="medicine[0][dose]"
                                                    placeholder="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="ml15" for="exampleInputEmail1">medicine time</label>
                                                <input type="text" class="form-control " name="medicine[0][time]"
                                                    placeholder="" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="inputList-3"></div>

                                <div class="row mt-30">
                                    <label class="ml30" for="exampleInputEmail1">notes</label>
                                    <div class="clearfix">
                                        <div class="col-md-8">
                                            <textarea class="notes" name="notes"
                                                placeholder="enter any other notes about the patient ..." required></textarea>
                                                @error('notes')
                                                    <div class="error text-danger">{{$message}}</div>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="button" value="Add new" class="add-new float" id="addInputs-3" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <label for="exampleInputEmail1">required tests</label>
                            <div class="clearfix">
                                <div class="col-md-8">
                                    <div id="test">
                                        <div class="clearfix mb20">
                                            <div class="col-md-10">
                                                <input type="text" name="test[0][required_test]" class="form-control ml-15"
                                                       placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div id="inputList"></div>
                                </div>
                                <div class="col-md-2">
                                    <input type="button" value="Add new" class="add-new"
                                        id="addInputs" />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <label for="exampleInputEmail1">required radiologies</label>
                            <div class="clearfix">
                                <div class="col-md-8">
                                    <div id="radio">
                                        <div class="clearfix mb20">
                                            <div class="col-md-10">
                                                <input type="text" name="medical[0][medical_radiology]" class="form-control  ml-15"placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="inputList-2"></div>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="button" value="Add new" class="add-new"
                                        id="addInputs-2" />
                                </div>
                            </div>

                    
                        </div>
                </div>
                    <div class="row">
                        <label class="ml30" for="exampleInputEmail1">next examination</label>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <input type="date" name="next_examination" required class="form-control ml15">
                                @error('next_examination')
                                    <div class="error text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <ul class="links mt0">
                            <li><button type="submit" class="preview">save</button></li>
                            <li><a href="#" class="cancel">cancel</a></li>
                        </ul>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- end tabs section -->

<!-- JS
============================================ -->


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/fontawesome.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script>
    var required_test = 1;
    $('#addInputs').click(function () {
        $('#inputList').append(`<div class="clearfix mb20"><div class="col-md-10"><input type="text" name="test[${required_test}][required_test]" class="form-control  ml-15"placeholder=""></div></div>`)
        required_test++
    });
    
</script>

<script>
    var medical_radiology = 1;
    $('#addInputs-2').click(function () {
        $('#inputList-2').append(`<div class="clearfix mb20"><div class="col-md-10"><input type="text" name="medical[${medical_radiology}][medical_radiology]" class="form-control  ml-15"placeholder=""></div></div>`)
        medical_radiology++
    });

</script>

<script>
    var medicineValue = 1
    $('#addInputs-3').click(function () {
      
        var medicine = $(
            `<div class="row"><div class="col-md-4"><label class="ml15" for="exampleInputEmail1">required medicine</label><input type="text" class="form-control livesearch" required name="medicine[${medicineValue}][name]" autocomplete="off"placeholder=""><ul class="data"></ul></div><div class="col-md-4"><label class="ml15" for="exampleInputEmail1">medicine dose</label><input type="text" class="form-control" required name="medicine[${medicineValue}][dose]"placeholder=""></div><div class="col-md-4"><label class="ml15" for="exampleInputEmail1">medicine time</label><input type="text" class="form-control " required name="medicine[${medicineValue}][time]"placeholder=""></div></div>`
        );
        $('#inputList-3').append(medicine)
        medicineValue++
    });

</script>
<script src="{{ asset('js/filepond.js') }}"></script>
<script>
    [{
            supported: 'Symbol' in window,
            fill: 'https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser-polyfill.min.js'
        },
        {
            supported: 'Promise' in window,
            fill: 'https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js'
        },
        {
            supported: 'fetch' in window,
            fill: 'https://cdn.jsdelivr.net/npm/fetch-polyfill@0.8.2/fetch.min.js'
        },
        {
            supported: 'CustomEvent' in window && 'log10' in Math && 'sign' in Math && 'assign' in Object && 'from' in
                Array && ['find', 'findIndex', 'some', 'includes'].reduce(function (previous, prop) {
                    return (prop in Array.prototype) ? previous : false;
                }, true),
            fill: 'https://unpkg.com/filepond-polyfill/dist/filepond-polyfill.js'
        }
    ].forEach(function (p) {
        if (p.supported) return;
        document.write('<script src="' + p.fill + '"><\/script>');
    });

</script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create the FilePond instance
    const pond = FilePond.create(inputElement, {
        allowMultiple: true,
        allowReorder: true,
        allowRemove: false
    });

    // Easy console access for testing purposes
    window.pond = pond;

</script>
<script>
    var gallery = document.querySelector('#gallery');
    var getVal = function (elem, style) {
        return parseInt(window.getComputedStyle(elem).getPropertyValue(style));
    };
    var getHeight = function (item) {
        return item.querySelector('.content').getBoundingClientRect().height;
    };
    var resizeAll = function () {
        var altura = getVal(gallery, 'grid-auto-rows');
        var gap = getVal(gallery, 'grid-row-gap');
        gallery.querySelectorAll('.gallery-item').forEach(function (item) {
            var el = item;
            el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
        });
    };
    gallery.querySelectorAll('img').forEach(function (item) {
        item.classList.add('byebye');
        if (item.complete) {
            console.log(item.src);
        } else {
            item.addEventListener('load', function () {
                var altura = getVal(gallery, 'grid-auto-rows');
                var gap = getVal(gallery, 'grid-row-gap');
                var gitem = item.parentElement.parentElement;
                gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                item.classList.remove('byebye');
            });
        }
    });
    window.addEventListener('resize', resizeAll);
    gallery.querySelectorAll('.gallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            item.classList.toggle('full');
        });
    });

</script>


<script>
    var gallery = document.querySelector('#gallery-2');
    var getVal = function (elem, style) {
        return parseInt(window.getComputedStyle(elem).getPropertyValue(style));
    };
    var getHeight = function (item) {
        return item.querySelector('.content').getBoundingClientRect().height;
    };
    var resizeAll = function () {
        var altura = getVal(gallery, 'grid-auto-rows');
        var gap = getVal(gallery, 'grid-row-gap');
        gallery.querySelectorAll('.gallery-item').forEach(function (item) {
            var el = item;
            el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
        });
    };
    gallery.querySelectorAll('img').forEach(function (item) {
        item.classList.add('byebye');
        if (item.complete) {
            console.log(item.src);
        } else {
            item.addEventListener('load', function () {
                var altura = getVal(gallery, 'grid-auto-rows');
                var gap = getVal(gallery, 'grid-row-gap');
                var gitem = item.parentElement.parentElement;
                gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                item.classList.remove('byebye');
            });
        }
    });
    window.addEventListener('resize', resizeAll);
    gallery.querySelectorAll('.gallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            item.classList.toggle('full');
        });
    });

</script>

<script src="js/the-datepicker.js"></script>
<script>
    (function () {
        const input = document.getElementById('example');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>
</body>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
            method: 'HEAD',
            mode: 'no-cors'
        })).then(function (response) {
            return true;
        }).catch(function (e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }

</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-46156385-1', 'cssscript.com');
    ga('send', 'pageview');

</script>

@endsection
