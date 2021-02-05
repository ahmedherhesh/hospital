@extends('doctor.master')
@section('title')
<title>Document</title>
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
            <div class=" col-md-3 white-3 patient-2 col-xs-12 col-sm-4">
              @if($patient->gender == 'male')
                <img src="{{asset('images/male.png')}}" alt="male">
              @else 
                <img src="{{asset('images/female.png')}}" alt="female">
              @endif
                <p>{{$patient->fullname}}</p>
                <h1><i class="fas fa-calendar-alt"></i>last examination date :</h1>
                <span></span>
            </div>
            <div class="col-md-8 white-3 patient-cont-2 col-xs-12 col-sm-7">
                <div class="clearfix">
                    <div class="col-md-6">
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-id-card"></i>ID No. :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$patient->code_number}}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-transgender"></i>Gender :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$patient->gender}}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-calendar-day"></i>Age :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$patient->age}}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-map-marker-alt"></i>Address :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$patient->adress}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="far fa-mobile-android-alt"></i>Phone :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{$patient->mobile_number}}</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-stethoscope"></i>Chronic Diseases :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{isset($diseases) ? $diseases->chronic_diseases : ''}}</p>
                            </div>
                        </div>

                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-edit"></i>Notes :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{isset($diseases) ? $diseases->notes : ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <h3 class="new-exam">new examination</h3>
        <div class="clearfix">
            <section>
                <div class="wizard wizard-2">
                    <div class="wizard-inner">
                        <div class="connecting-line con-2"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                    <span class="round-tab">
                                        <i class="fas fa-x-ray"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <span class="round-tab">
                                        <i class="fas fa-diagnoses"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <span class="round-tab">
                                        <i class="fas fa-pills"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('prescription_insert') }}" method="post">                                    
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="step1">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1>medical tests and radiology</h1>
                                            <span>the tests of patient</span>
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
{{-- 
                                            <label for="exampleInputEmail1">uploading files</label>
                                            <div class="clearfix ml15">
                                                <input type="file" />
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <h1>medical tests and radiology</h1>
                                            <span>the radiologies of patient</span>
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

                                            {{-- <label for="exampleInputEmail1">uploading files</label>
                                            <div class="clearfix">
                                                <input type="file" />
                                            </div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="clearfix">
                                        <ul class="links">
                                            <li><a href="#" class="preview">preview</a></li>
                                            <li><a href="#" class="print">print</a></li>

                                        </ul>
                                    </div> --}}

                                </div>
                                <ul class="list-inline ">
                                    {{-- <li><button type="button" class="btn btn-primary prev-step">next</button></li> --}}
                                    <li><button type="button" class="btn btn-primary next-step">Save and
                                            continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="step2">
                                    <h1>diagnosis</h1>
                                    <span>The Details of Patient Diagonsis</span>
                                    <div class="step_21">
                                        <div class="row">
                                            <label class="ml" for="exampleInputEmail1">diagnosis info</label>
                                            <textarea class="notes" name="diagnosis_details" placeholder="enter all details about the patient ..."></textarea>
                                            @error('diagnosis_details')
                                                <div class="error text-danger"></div>
                                            @enderror
                                        </div><br>
                                        <div class="row">
                                            <label class="ml" for="exampleInputEmail1">notes</label>
                                            <textarea class="notes" name="diagnosis_notes" placeholder="enter any other notes about the patient ..."></textarea>
                                            @error('diagnosis_notes')
                                                <div class="error text-danger"></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="step-22">

                                    </div>
                                </div>
                                <ul class="list-inline ">

                                    <li><button type="button" class="btn btn-primary next-step">Save and
                                            continue</button></li>
                                    {{-- <li><button type="button" class="btn btn-primary prev-step">next</button></li> --}}

                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="step33">

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
                                                                        <input type="text" class="form-control livesearch" autocomplete="off"name="medicine[0][name]" required
                                                                            placeholder="">
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
                                                                            <div class="error text-danger"></div>
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
                                                <label class="ml30" for="exampleInputEmail1">next examination</label>
                                                <div class="clearfix">
                                                    <div class="col-md-4">
                                                        <input type="date" name="next_examination" required class="form-control ml15">
                                                        @error('next_examination')
                                                            <div class="error text-danger"></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <ul class="list-inline ">
                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                            <li><button type="submit" class="btn btn-primary btn-info-full">Save</button></li>
                                        </ul>
                                    
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix">
                            <ul class="links">
                                {{-- <li><a href="#" class="preview">preview</a></li> --}}
                                @if(session()->has('prescriptionId'))
                                    <li><a href="/doctor/prescription-print/{{session()->get('prescriptionId')}}" class="print">print</a></li> 
                                @endif
                            </ul>
                        </div>
                    </form>
                </div>
            </section>
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
            `<div class="row"><div class="col-md-4"><label class="ml15" for="exampleInputEmail1">required medicine</label><input type="text" class="form-control livesearch" autocomplete="off" required name="medicine[${medicineValue}][name]"placeholder=""><ul class="data"></ul></div><div class="col-md-4"><label class="ml15" for="exampleInputEmail1">medicine dose</label><input type="text" class="form-control" required name="medicine[${medicineValue}][dose]"placeholder=""></div><div class="col-md-4"><label class="ml15" for="exampleInputEmail1">medicine time</label><input type="text" class="form-control " required name="medicine[${medicineValue}][time]"placeholder=""></div></div>`
        );
        $('#inputList-3').append(medicine)
        medicineValue++
    });

</script>


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
<script src="js/filepond.js"></script>

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
<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);
            if ($target.parent().hasClass('disabled')) {
                return false;
            }

        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

</script>
@endsection
