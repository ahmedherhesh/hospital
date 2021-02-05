<?php 
    use Illuminate\Support\Facades\DB;
    function getPatient(){
        $patient = DB::table('patients')->where(['id' => session()->get('patient_id')])->first();
        return $patient;
    }
?>


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
        <div class=" white-3">
            <div class="clearfix title">
                <div class="col-md-6">
                    <h1>mini</h1>
                </div>

            </div>

            <div class="clearfix mb30 none">
                <div class="row">
                    <form class="form-group ml15" id="form_search"  action="" method="get">
                        <div class="col-md-3">
                            <input type="search" name="code" id="code" class="form-control" placeholder="search" >
                        </div>
                        <div class="col-md-2">
                            <button style="display:none" type="submit"></button>
                        </div>
                        @if(session()->has('patient_id'))
                        <script>
                            code.value = {{getPatient()->code_number}}
                            form_search.submit()
                        </script>
                        @endif
                    </form>

                </div>

                <form action="{{route('mini_post')}}" method="post" class="ml15">

                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control mt10" name="exam_type">
                                <option value="">examination type</option>
                                <option value="new">new</option>
                                <option value="resumption">resumption</option>
                            </select>
                            @error('exam_type')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror 
                        </div>
                        <div class="col-md-2">
                            <select class="form-control mt10" name="gender">
                                <option value="">gender</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                            @error('gender')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror 
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="fullname" class="form-control mt10" placeholder="name">
                            @error('fullname')
                                <span class="text-danger error">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="mobile" class="form-control mt10" placeholder="mobile no.">
                            @error('mobile')
                                <span class="text-danger error">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="hidden"></button>
                    </div>
                </form>
                <div class="col-md-2">
                    <p class="mt10">code no. @isset($patient)
                        {{$patient->code_number}}
                    @endisset</p>
                </div>
            </div>
            <form action="{{ route('prescription_insert') }}" method="post">
                @csrf
                <div class="clearfix ">
                    <div class="col-md-10">
                        <div class="presc">
                            <div class="clearfix">
                                <div class="col-md-6 style">
                                    <p>doctor name : {{ session()->get('doctor')->name }}
                                        {{ session()->get('doctor')->last_name }}</p>
                                    <p>specialization : {{ $doctor_info->specialization }}</p>
                                    <p>Bachelor Degree : {{ $doctor_info->bachelor_degree }}</p>
                                </div>
                                <div class="col-md-6 style">
                                    <p>patient name : @isset($patient) {{$patient->fullname}} @endisset</p>
                                    <p>patient address : @isset($patient) {{$patient->adress}} @endisset</p>
                                    <p>date of examination : {{ date('Y-m-d') }}</p>
                                </div>
                            </div>

                            <div class="clearfix q mb30 none">
                                
                                    <div class="step1">
                                        <span class="info"><i class="fas fa-pills infoo"></i>The medicine of Patient
                                            :</span>
                                        <div class="step_21">
                                            <div class="clearfix">
                                                <div class="col-md-8">
                                                    <div id="medicine">
                                                        <div class="repeat">
                                                            <div class="row">
                                                                @if(isset($patient))
                                                                    <input type="hidden" name="patient_id"
                                                                        value="{{ $patient->id }}">
                                                                @endif
                                                                <div class="col-md-4">
                                                                    <label class="ml15" for="exampleInputEmail1">required
                                                                        medicine</label>
                                                                    <input type="text" class="form-control livesearch"
                                                                        name="medicine[0][name]" autocomplete="off" required
                                                                        placeholder="">
                                                                    <ul class="data"></ul>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="ml15" for="exampleInputEmail1">medicine
                                                                        dose</label>
                                                                    <input type="text" class="form-control"
                                                                        name="medicine[0][dose]" placeholder="" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="ml15" for="exampleInputEmail1">medicine
                                                                        time</label>
                                                                    <input type="text" class="form-control "
                                                                        name="medicine[0][time]" placeholder="" required>
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
                                                                    placeholder="enter any other notes about the patient ..."
                                                                    required></textarea>
                                                                    @error('notes')
                                                                        <span class="text-danger error">{{$message}}</span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="button" value="Add new" class="add-new float"
                                                        id="addInputs-3" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                {{-- <h1>medical tests and radiology</h1>
                                                <span>the tests of patient</span> --}}
                                                <div class="clearfix">
                                                    <div class="col-md-8">
                                                        <div id="test">
                                                            <div class="clearfix mb20">
                                                                <div class="col-md-10">
                                                                    <input type="text" name="test[0][required_test]"
                                                                        class="form-control ml-15" placeholder="required tests">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input type="button" value="Add new" class="add-new"
                                                                        id="addInputs" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="inputList"></div>
                                                    </div>

                                                </div>
                                                {{-- 
                                                <label for="exampleInputEmail1">uploading files</label>
                                                <div class="clearfix ml15">
                                                    <input type="file" />
                                                </div> --}}
                                            </div>
                                            <div class="col-md-6">
                                                {{-- <h1>medical tests and radiology</h1>
                                                <span>the radiologies of patient</span> --}}

                                                <div class="clearfix">
                                                    <div class="col-md-8" >
                                                        <div id="radio">
                                                            <div class="clearfix mb20">
                                                                <div class="col-md-10" >
                                                                    <input type="text" name="medical[0][medical_radiology]"
                                                                        class="form-control  ml-15" placeholder="required radiologies"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 ">
                                                                    <input type="button"  value="Add new" class="add-new"
                                                                        id="addInputs-2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="inputList-2"></div>
                                                    </div>
                                                    
                                                </div>

                                                {{-- <label for="exampleInputEmail1">uploading files</label>
                                                <div class="clearfix">
                                                    <input type="file" />
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="ml30" for="exampleInputEmail1">next examination</label>
                                            <div class="clearfix">
                                                <div class="col-md-4">
                                                    <input type="date" name="next_examination" required
                                                        class="form-control ml15">
                                                        @error('next_examination')
                                                            <span class="text-danger error">{{$message}}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                
                            </div>

                            <div class="clearfix ">
                                <div class="col-md-10  mb30 style">
                                    @if(!empty($doctor_info->address))
                                        <p>doctor address:</p>
                                        @foreach(json_decode($doctor_info->address) as $address)
                                            <span class="address">
                                                {{ $address->state }} / {{ $address->city }} /
                                                {{ $address->address }}/
                                                mobile: {{ $address->mobile }} / telephone: {{ $address->telephone }}
                                            </span>
                                            <br>
                                        @endforeach
                                    @else
                                        <p>doctor address</p>
                                        <p>doctor mobile no.</p>
                                        <p>doctor telephone no.</p>
                                    @endif
                                </div>
                                <div class="col-md-2 pull-right">
                                    @if(!empty($doctor_info->logo))
                                        <p>logo :</p> <img class="logo"
                                            src="{{ asset('uploads/images/'. $doctor_info->logo) }}">
                                    @else
                                        <p>logo : not found</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
               
                    <div class="clearfix mb30 none">
                        <div class="col-md-2 col-md-offset-8">
                            <button type="submit" class="preview">save</button>
                        </div>
                        <div class="col-md-2 ">
                            @if(session()->has('prescriptionId'))
                                <a href="/doctor/prescription-print/{{session()->get('prescriptionId')}}" class="print">print</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
        </form>


    </div>
</div>















<!-- end tabs section -->

<!-- JS
============================================ -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

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

<script src="{{ asset('js/quill.min.js') }}"></script>
<script>
    var quill = new Quill('.quill', {
        theme: 'snow'
    });

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
