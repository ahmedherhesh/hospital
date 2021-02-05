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
  <title>day-closing</title>
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
        <div class="white-3">
            <div class="clearfix title">
                <div class="col-md-2">
                    <h1>today income</h1>
                </div>

                <form action="" method="get">
                    <div class="col-md-3 step33">
                        <input type="date" name="from" class="form-control mt10" id="example-1" >
                    </div>
                    <div class="col-md-3 step33">
                        <input type="date" name="to" class="form-control mt10" id="example-2" >
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class ="preview ed">search</button>
                    </div>
                </form>
            </div>
            <hr class="b45">
            <!--Table-->
            <table class="table table-striped w-auto mt55">

                <!--Table head-->
                <thead>
                    <tr>
                        <th>name</th>
                        <th>examination type</th>
                        <th>cost</th>
                        <th>discount</th>
                        <th>final cost</th>

                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @if(isset($exams_of_day))
                        @foreach ($exams_of_day as $exam)
                            <tr class="table-info">
                                <th scope="row"><?php echo patient($exam->patient_id)->fullname ?></th>
                                <td>{{$exam->examination_type}}</td>
                                <td>{{$exam->price}}</td>
                                <td>{{$exam->discount}}</td>
                                <td>{{$exam->final_price}}</td>
                            </tr> 
                        @endforeach
                    @endif
                </tbody>
                <!--Table body-->


            </table>
            <!--Table-->

            <div class="text-center">
                {{$exams_of_day->links('pagination::bootstrap-4')}}
            </div>

            <h2 class="final">final income :</h2>
            @if(isset($exams_of_day))
                <p class="mr">{{$exams_of_day->sum('final_price')}}</p>
            @else 
            <p class="mr">0</p>
            @endif
        </div>
    </div>
</div>

<!-- end tabs section -->

<!-- JS
============================================ -->


<!-- Include all compiled plugins (below), or include individual files as needed -->


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
<script src="js/the-datepicker.js"></script>
<script>
    (function () {
        const input = document.getElementById('example-1');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>

<script>
    (function () {
        const input = document.getElementById('example-2');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>



<script>
    (function () {
        const input = document.getElementById('example-3');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>
<script>
    (function () {
        const input = document.getElementById('example-4');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>
@endsection
