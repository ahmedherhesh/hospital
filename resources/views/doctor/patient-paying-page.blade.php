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
            <div class=" col-md-3 white-3 patient mt">
                @if($patient->gender == 'male')
                    <img src="{{ asset('images/male.png') }}" alt="male">
                @else
                    <img src="{{ asset('images/female.png') }}" alt="female">
                @endif

                <p>{{ $patient->fullname }}</p>
                <h1><i class="fas fa-calendar-alt"></i>last examination date :</h1>
                <span>{{ isset($patientEx) ? $patientEx->examination_date : '' }}</span>
            </div>
            <div class="col-md-8 white-3 patient-cont mt">
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
                                <p>{{ $patient->gender }}</p>
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
                                <p>{{ isset($diseasesP) ? $diseasesP->chronic_diseases : '' }}</p>
                            </div>
                        </div>

                        <div class="clearfix">
                            <div class="col-md-4">
                                <h1> <i class="fas fa-edit"></i>Notes :</h1>
                            </div>
                            <div class="col-md-8">
                                <p>{{ isset($diseasesP) ? $diseasesP->notes : '' }}</p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="clearfix mt-30">
            <button type="button" class="btn btn-primary outlay-btn" data-toggle="modal" data-target="#exampleModal-3"
                data-whatever="@mdo">resumption</button>

            <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel-3">resumption</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="x">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('payingPagePost') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="examination_type" value="resumption">
                                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                    <label for="recipient-name" class="col-form-label">date of examination</label>
                                    <input type="date" name="examination_date" class="form-control mt10" id="example-1">
                                    @error('examination_date')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">cost of examination</label>
                                    <input type="number" name="price" class="form-control" id="cost">
                                    @error('price')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">discount</label>
                                    <input type="number" name="discount" class="form-control" id="outlay-date">
                                    @error('discount')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">final cost</label>
                                    <input type="number" name="final_price" class="form-control" id="final-cost">
                                    @error('final_price')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                    <button type="submit" class="btn btn-primary">save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <button type="button" class="btn btn-primary outlay-btn" data-toggle="modal" data-target="#exampleModal-2"
                data-whatever="@mdo">new payment</button>

            <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel-2">new payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="x">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('payingPagePost') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="examination_type" value="new">
                                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                    <label for="recipient-name" class="col-form-label">date of examination</label>
                                    <input type="date" name="examination_date" class="form-control mt10" id="example-1">
                                    @error('examination_date')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">cost of examination</label>
                                    <input type="number" name="price" class="form-control" id="cost">
                                    @error('price')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">discount</label>
                                    <input type="number" name="discount" class="form-control" id="outlay-date">
                                    @error('discount')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">final cost</label>
                                    <input type="number" name="final_price" class="form-control" id="final-cost">
                                    @error('final_price')
                                        <div class="error text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                    <button type="submit" class="btn btn-primary">save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<!-- end tabs section -->

<!-- JS
============================================ -->


<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
