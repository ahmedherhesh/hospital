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

        <div class="white-3">
            <div class="clearfix title">
                <div class="col-md-6">
                    <h1>report of patients of today</h1>
                </div>
            </div>
            <hr class="b45">
            <!--Table-->
            <table class="table table-striped w-auto mt55">

                <!--Table head-->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>fullname</th>
                        <th>examination type</th>
                        <th>total income</th>
                        {{-- <th>total outlay</th>
                        <th>final cost</th> --}}

                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @foreach ($reports_today as $key =>$report)
                        <tr class="table-info">
                            <th scope="row">{{++$key}}</th>
                            <td><?php echo patient($report->patient_id)->fullname?></td>
                            <td>{{$report->examination_type}}</td>
                            <td> {{$report->final_price}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <!--Table body-->


            </table>
            <!--Table-->

            <div class="text-center">
                {{$reports_today->links('pagination::bootstrap-4')}}
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
