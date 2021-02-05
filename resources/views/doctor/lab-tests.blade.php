@extends('doctor.master')
@section('title')
<title>Document</title>
@section('content')
<!-- start tabs section -->

<div class="clearfix tabs-section">
    {{ View::make('doctor.sidebar') }}
    <div class="col-md-10">
        {{ View::make('doctor.navbar') }}
        <div class="adv">
        </div>
    </div>

    <div class=" white-3">
        <div class="clearfix title">
            <div class="col-md-2">
                <h1>lab tests</h1>
            </div>
            <div class="col-md-3">
                <select class="form-control ml15 mt10">
                    <option>lab name</option>
                    <option>al mokhtabar lab</option>
                    <option>al borg lab</option>
                    <option>al mokhtabar lab</option>
                    <option>al borg lab</option>
                    <option>al mokhtabar lab</option>
                    <option>al borg lab</option>
                    <option>al mokhtabar lab</option>
                    <option>al borg lab</option>
                    <option>al mokhtabar lab</option>
                    <option>al borg lab</option>
                </select>
            </div>
            <div class="col-md-3 col-md-offset-4">
                <input type="text" class="search ser-three" id="search-box-2" placeholder="search here ...">
                <i id="search-2" class="far fa-search serr-4"></i>
            </div>
        </div>
        <hr class="b45">

        <div class="clearfix">
            <div class="quill "></div>
        </div>
        <div class="clearfix">
            <ul class="links mb30">
                <li><a href="#" class="preview">send</a></li>


            </ul>
        </div>


    </div>





</div>
</div>















<!-- end tabs section -->

<!-- JS
============================================ -->



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
