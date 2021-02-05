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
                    <h1>report of patients reserved online this month</h1>
                </div>
            </div>
            <hr class="b45">
            <!--Table-->
            <table class="table table-striped w-auto mt55">

                <!--Table head-->
                <thead>
                    <tr>
                        <th>date</th>
                        <th>examination type</th>
                        <th>total income</th>
                        <th>total outlay</th>
                        <th>final cost</th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    <tr class="table-info">
                        <th scope="row">11 March 2019</th>
                        <td>new</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr>
                        <th scope="row">11 March 2019</th>
                        <td>resumption</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr class="table-info">
                        <th scope="row">11 March 2019</th>
                        <td>new</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr>
                        <th scope="row">11 March 2019</th>
                        <td>resumption</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr class="table-info">
                        <th scope="row">11 March 2019</th>
                        <td>new</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr>
                        <th scope="row">11 March 2019</th>
                        <td>new</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr class="table-info">
                        <th scope="row">11 March 2019</th>
                        <td>resumption</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr>
                        <th scope="row">11 March 2019</th>
                        <td>new</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                    <tr class="table-info">
                        <th scope="row">11 March 2019</th>
                        <td>new</td>

                        <td> $320,800</td>
                        <td> $320,800</td>
                        <td> $320,800</td>

                    </tr>
                </tbody>
                <!--Table body-->


            </table>
            <!--Table-->

            <div class="clearfix counter">
                <ul>
                    <li><a href="#">>></a></li>
                    <li class="active-pag"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">
                            <<< /a>
                    </li>
                </ul>
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