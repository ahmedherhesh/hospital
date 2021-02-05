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
                <h1>online</h1>
            </div>
        </div>

        <div class="clearfix mb30 mt20 ">
            <div class=" col-md-3 col-sm-6 col-xs-12">
                <button type="button" class="btnn" data-toggle="modal" data-target="#exampleModal-2"
                    data-whatever="@mdo">
                    <div class=" white-3 patient-3  ">

                        <div class="clearfix">

                            <img src="{{ asset('images/female.png') }}" alt="female">



                            <p><a href="#" class="link">kamilia ahmad</a></p>
                            <h1>ID NO. : </h1>
                            <p class="ans">44A</p>


                            <i class="fad fa-webcam online"></i>
                            <i class="fas fa-smile-plus news"></i>

                        </div>

                    </div>
                </button>

                <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="x">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body hight">
                                <form>




                                </form>
                            </div>
                            <div class="modal-footer">
                                <ul class="online-icons">
                                    <li><a href="#"><i class="fad fa-user-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-volume"></i></a></li>
                                    <li><a href="#"><i class="fad fa-microphone"></i></a></li>
                                    <li><a href="#"><i class="fas fa-phone-alt call"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="clearfix counter">
            <ul>
                <li><a href="#">>></a></li>
                <li class="active-pag"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">
                        <<<< /a>
                </li>
            </ul>
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
