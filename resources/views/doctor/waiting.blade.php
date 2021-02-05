<?php
    use Illuminate\Support\Facades\DB;
    function patient($patient_id){
        $patient = DB::table('patients')->where([
            'id' => $patient_id,
        ])->first();
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


        <div class=" white-3 edit mb30">
            <div class="clearfix">
                <h1>today waiting</h1>
            </div>
        </div>

        <div class="clearfix mb30 mt20 ">
            @foreach($today_waiting as $wait)
                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class=" white-3 patient-3  " id="about">
                        <div  style="display: block;">
                        </div>
                        <div class="clearfix">
                            @if(patient($wait->patient_id)->gender == 'male')
                                <img src="{{asset('images/male.png')}}" alt="male">
                            @else 
                                <img src="{{asset('images/female.png')}}" alt="female">
                            @endif

                            <p><a href="{{route('examination_page')}}?code=<?php echo patient($wait->patient_id)->code_number ?>" class="link">{{patient($wait->patient_id)->fullname}}</a></p>
                            <h1>ID NO. : </h1>
                            <p class="ans">{{patient($wait->patient_id)->code_number}}</p>
                            @if($wait->register_with == 'online')
                                <i class="fad fa-webcam online"></i>
                            @else 
                                <i class="fad fa-webcam-slash offline"></i>
                            @endif
                            <i class="fas fa-smile-plus news"></i>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>


        <div class="text-center">
            {{$today_waiting->links('pagination::bootstrap-4')}}
        </div>


    </div>


</div>

</div>
















<!-- end tabs section -->

<!-- JS
============================================ -->


<!-- Include all compiled plugins (below), or include individual files as needed -->

<script>
    $('#about').click(function () {
        $('#pagebox').show();
    });

</script>
<script>
    $('#about-1').click(function () {
        $('#pagebox-1').show();
    });

</script>
<script>
    $('#about-2').click(function () {
        $('#pagebox-2').show();
    });

</script>
<script>
    $('#about-3').click(function () {
        $('#pagebox-3').show();
    });

</script>
<script>
    $('#about-4').click(function () {
        $('#pagebox-4').show();
    });

</script>
<script>
    $('#about-5').click(function () {
        $('#pagebox-5').show();
    });

</script>
<script>
    $('#about-6').click(function () {
        $('#pagebox-6').show();
    });

</script>
<script>
    $('#about-7').click(function () {
        $('#pagebox-7').show();
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
