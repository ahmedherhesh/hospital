<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>analysis</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial Narrow">

    <link rel="stylesheet" href="{{ asset("css/jquery.listtopie.css") }}">

    <link rel="stylesheet" href="{{ asset('css/example.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-charts.css') }}">

    <link rel="stylesheet" href="{{ asset('css/jquery.lineProgressbar.css') }}" />

    <link href="{{ asset('css/the-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="gray" style="direction:rtl">

    <!-- start tabs section -->

    <div class="clearfix tabs-section">
        {{ View::make('doctor.sidebar') }}
        <div class="col-md-10">
            {{ View::make('doctor.navbar') }}
            <div class="clearfix mt20">
                <div class="adv">
                </div>
            </div>
            <div class=" white-4 ">

                <div class="clearfix">
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="white-new">
                            <img src="{{ asset('images/waiting-2.jpg') }}" class="memb"
                                alt="number of patients">
                            <h1>number of patients for today :</h1>
                            <div id="progressbar1"></div>
                            <p><a href="{{route('reports_for_today')}}">{{$reports_today}} patients</a></p>

                        </div>

                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="white-new">
                            <img src="{{ asset('images/waiting-2.jpg') }}" class="memb"
                                alt="number of patients">
                            <h1>number of patients this month :</h1>
                            <div id="progressbar2"></div>
                            <p><a href="{{route('reports_this_month')}}">{{$reports_this_month}} patients</a></p>

                        </div>

                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="white-new">
                            <img src="{{ asset('images/gender.png') }}" class="memb" alt="gender">
                            <h1>female to male percentage For This Month :</h1>
                            <div class="clearfix">
                                <div class="col-md-6">
                                    <div id="progressbar3"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="progressbar4"></div>
                                </div>
                            </div>

                            <p>female</p>

                        </div>

                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="white-new">
                            <img src="{{ asset('images/reserve.jpg') }}" class="memb"
                                alt="online reservation">
                            <h1>number of patients reserved online this month :</h1>
                            <div id="progressbar5"></div>
                            <p><a href="#">0 patients</a></p>

                        </div>

                    </div>
                </div>
                <div class="clearfix">

                    <div class="col-md-6">
                        <div class="white-5">
                            <h1>sales :</h1>
                            <p>changing in sales during the year</p>
                            <div class="row">

                                <div class="col-lg-6 col-xs-12 col-sm-6">
                                    <div class='donut'>

                                        <div data-lcolor="#085f63">25.2</div>
                                        <div data-lcolor="#49beb7">25.6</div>
                                        <div data-lcolor="#facf5a">34.2</div>
                                        <div data-lcolor="#ff5959">30.2</div>
                                        <div data-lcolor="#085f63">22.2</div>
                                        <div data-lcolor="#49beb7">80.6</div>
                                        <div data-lcolor="#facf5a">30.2</div>
                                        <div data-lcolor="#ff5959">45.2</div>
                                        <div data-lcolor="green">22.2</div>
                                        <div data-lcolor="red">80.6</div>
                                        <div data-lcolor="orange">30.2</div>
                                        <div data-lcolor="brown">45.2</div>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-6">
                                    <ul class="chart-key">
                                        <li><i class="fas fa-square jan"></i>Januray</li>
                                        <li><i class="fas fa-square feb"></i>february</li>
                                        <li><i class="fas fa-square mar"></i>march</li>
                                        <li><i class="fas fa-square apr"></i>april</li>
                                        <li><i class="fas fa-square may"></i>may</li>
                                        <li><i class="fas fa-square jun"></i>june</li>
                                        <li><i class="fas fa-square jul"></i>july</li>
                                        <li><i class="fas fa-square aug"></i>august</li>
                                        <li><i class="fas fa-square sep"></i>september</li>
                                        <li><i class="fas fa-square oct"></i>october</li>
                                        <li><i class="fas fa-square nov"></i>november</li>
                                        <li><i class="fas fa-square dec"></i>december</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="banner" src="{{ asset('images/banner-2.jpg') }}" alt="banner">
                    </div>
                </div>

                <div class="clearfix">

                    <div class="col-md-4">
                        <img class="banner" src="{{ asset('images/banner.jpg') }}" alt="banner">
                    </div>
                    <div class="col-md-8">
                        <div class="white-5">
                            <h1>outlay :</h1>
                            <p>changing in outlay during the year</p>
                            <div class="row">

                                <div id="bar-chart-example"></div>

                            </div>
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
    <script src="{{ asset('js/bootstrap.js') }}"></script>

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
        (function () {
            const input = document.getElementById('example');
            const datepicker = new TheDatepicker.Datepicker(input);
            datepicker.render();
        })();

    </script>

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




    <script src="{{ asset('js/example.js') }}"></script>
    <script src="{{ asset('js/material-charts.js') }}"></script>

    <script src="{{ asset('js/jquery.lineProgressbar.js') }}"></script>


    <script>
        $('#progressbar1').LineProgressbar();

    </script>

    <script>
        $('#progressbar2').LineProgressbar2();

    </script>
    <script>
        $('#progressbar3').LineProgressbar3();

    </script>
    <script>
        $('#progressbar4').LineProgressbar4();

    </script>
    <script>
        $('#progressbar5').LineProgressbar();

    </script>


    <script>
        Morris.Area({
            element: 'graph',
            data: [{
                    x: '2010 Q4',
                    y: 3,
                    z: 7
                },
                {
                    x: '2011 Q1',
                    y: 3,
                    z: 4
                },
                {
                    x: '2011 Q2',
                    y: null,
                    z: 1
                },
                {
                    x: '2011 Q3',
                    y: 2,
                    z: 5
                },
                {
                    x: '2011 Q4',
                    y: 8,
                    z: 2
                },
                {
                    x: '2012 Q1',
                    y: 4,
                    z: 4
                }
            ],
            xkey: 'x',
            ykeys: ['y', 'z'],
            labels: ['Y', 'Z']
        }).on('click', function (i, row) {
            console.log(i, row);
        });

    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js"></script>
    <script src="{{ asset('js/jquery.listtopie.min.js') }}"></script>
    <script>
        $('#static').listtopie({
            startAngle: 0,
            strokeWidth: 0,
            hoverEvent: false,
            drawType: 'round',
            speedDraw: 150,
            hoverColor: '#ffffff',
            textColor: '#000',
            strokeColor: '#ffffff',
            textSize: '18',
            hoverAnimate: true,
            marginCenter: 1,
            sectorRotate: true,
            easingType: mina.bounce,
            infoText: true,
        });
        $('.donut').listtopie({
            startAngle: 270,
            strokeWidth: 5,
            hoverEvent: true,
            hoverBorderColor: '#2a363b',
            hoverAnimate: false,
            drawType: 'round',
            speedDraw: 150,
            hoverColor: '#ffffff',
            textColor: '#000',
            strokeColor: '#ffffff',
            textSize: '14',
            hoverAnimate: true,
            marginCenter: 50,

        });

    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
                method: 'HEAD',
                mode: 'no-cors'
            })).then(function (response) {
                return true;
            }).catch(function (e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }

    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

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

<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
