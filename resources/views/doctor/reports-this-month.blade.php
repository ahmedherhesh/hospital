<?php
    use Illuminate\Support\Facades\DB;

    function count_exam($date,$type){
        $count_exam = DB::table('examinations')->where([
            'doctor_id' => session()->get('doctor')->id,
            'examination_type' => $type,
            'examination_date' => $date
        ]);
        return $count_exam;
    }    
    function sum_exam($date){
        $sum_exam = DB::table('examinations')->where([
            'doctor_id' => session()->get('doctor')->id,
            'examination_date' => $date
        ]);
        return $sum_exam;
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

        <div class="white-3">
            <div class="clearfix title">
                <div class="col-md-6">
                    <h1>account report for the month</h1>
                </div>
            </div>
            <hr class="b45">
            <!--Table-->
            <table class="table table-striped w-auto mt55">

                <!--Table head-->
                <thead>
                    <tr>
                        <th>date</th>
                        <th>examination no.</th>
                        <th>resumption no.</th>
                        <th>total income</th>

                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @foreach ($reports_this_month as $report)
                        <tr class="table-info">
                            <th scope="row">{{$report->examination_date}}</th>
                            <td><?php echo count_exam($report->examination_date,'new')->count(); ?></td>
                            <td><?php echo count_exam($report->examination_date,'resumption')->count(); ?></td>
                            <td><?php echo sum_exam($report->examination_date)->sum('final_price');?></td>
                        </tr>
                    @endforeach
                </tbody>
                <!--Table body-->


            </table>
            <!--Table-->

            <div class="text-center">
                {{$reports_this_month->links('pagination::bootstrap-4')}}
            </div>
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

@endsection
