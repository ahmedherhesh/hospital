@extends('doctor.master')
@section('title')
    <title>add-patient</title>
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

        <section>
            <div class="wizard top">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="round-tab">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="round-tab">
                                    <i class="fas fa-file-medical-alt"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                <span class="round-tab">
                                    <i class="fas fa-money-check-alt"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>


                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="step1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1>personal information</h1>
                                        <span>information about patient</span>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('payingPage')}}" method="GET">
                                            <div class="clearfix">
                                                <div class="col-md-9">
                                                    {{-- <label for="InputText">Search</label> --}}
                                                    <input type="text" style="margin-top: 4px; margin-right: -45px" class="form-control " name="paying_for" id="code_number" placeholder= "Search">
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="preview">search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <form action="{{ route('doctor_add_patient') }}" method="POST" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="InputText">Full Name</label>
                                        <input type="text" class="form-control ml15" name="fullname" id="InputText"
                                            placeholder="Full Name">
                                            @error('fullname')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <input type="number" class="form-control ml15" name="mobile_number"
                                            id="exampleInputEmail1" placeholder="mobile number">
                                            @error('mobile_number')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror

                                    </div>
                                    <div class="col-md-6">

                                        <label for="exampleInputEmail1" style="margin-top: 5px"> address</label>
                                        <input type="text" class="form-control ml15" name="adress"
                                            id="exampleInputEmail1" placeholder="address">
                                            @error('adress')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" style="margin-top: 5px">age</label>
                                        <input type="number" class="form-control ml15" name="age"
                                            id="exampleInputEmail1" placeholder="age">
                                            @error('age')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">gender</label>
                                        <label class="radio-btn "><input type="radio" name="gender" value="male"
                                                class="mr" checked><img class="wid"
                                                src="{{ asset('images/male.png') }}"
                                                alt="male"></label>
                                        <label class="radio-btn"><input type="radio" name="gender" value="female"
                                                class="mr"><img class="wid"
                                                src="{{ asset('images/female.png') }}"
                                                alt="female"></label>
                                                @error('gender')
                                                    <div class="error text-danger">{{$message}}</div>
                                                @enderror
                                    </div>


                                </div>
                            </div>
                            <ul class="list-inline ">
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="step2">
                                <h1>patient history</h1>
                                <span>The History of Patient with Any Disease</span>
                                <div class="step_21">
                                    <div class="row">
                                        <label class="ml" for="exampleInputEmail1">Chronic Diseases</label>
                                        <input type="text" class="form-control chronic" name="diseases"
                                            id="exampleInputEmail1" placeholder="">
                                    </div><br>
                                    @error('diseases')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                    <div class="row">
                                        <label class="ml" for="exampleInputEmail1">notes</label>
                                        <div class="clearfix">
                                            <div class="col-md-9">
                                                <textarea class="notes" name="notes"
                                                    placeholder="enter any other notes about the patient ..."></textarea>
                                                    @error('notes')
                                                        <div class="error text-danger">{{$message}}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-22">

                                </div>
                            </div>
                            <ul class="list-inline ">

                                <li><button type="button" class="btn btn-primary next-step">Save and
                                        continue</button></li>
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <div class="step33">
                                <h1>Bill</h1>
                                <span>Final Cost of The Examination</span>
                                <div class="step_21">
                                    <div class="row">
                                        <label class="ml" for="exampleInputEmail1">date of examination</label>

                                        <div class="clearfix mb30">
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="examination_date"
                                                    id="example">
                                                    @error('examination_date')
                                                        <div class="error text-danger">{{$message}}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb30">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">cost of examination</label>
                                            <input type="text" class="form-control" name="price" id="exampleInputEmail1"
                                                placeholder="">
                                                @error('price')
                                                    <div class="error text-danger">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">discount</label>
                                            <input type="number" class="form-control" name="discount"
                                                id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">final cost</label>
                                            <input type="number" class="form-control" name="final_price"
                                                id="exampleInputEmail1" placeholder="">
                                                @error('final_price')
                                                    <div class="error text-danger">{{$message}}</div>
                                                @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <ul class="list-inline ">

                                {{-- <li><button type="button" class="btn btn-default next-step">Skip</button></li> --}}
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and
                                        continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="step44">
                                <h5 class="animate__animated animate__tada">Completed ! </h5>
                                <button type="submit"
                                    class="animate__animated animate__tada btn btn-success">Save</button>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </form>
            </div>
        </section>


    </div>
</div>

<!-- end tabs section -->

<!-- JS
    ============================================ -->


<!-- Include all compiled plugins (below), or include individual files as needed -->

<script>
    (function () {
        const input = document.getElementById('example');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>
<script src="{{asset('js/jquery.min.js')}}"></script>
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

        $(".next-step").click(function () {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function () {

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
