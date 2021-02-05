<div class="popup none">
    <div class="col-md-2">
        <div class="tabs-titles">
            <div class="clearfix">
                <a href="{{route('analysis')}}"><img class="logo" src="{{ asset('images/logo.png') }}"
                        alt="logo"></a>
            </div>
            <ul class="nav nav-pills nav-stacked flex-column">
                <li><a href="{{ route('add-patient') }}"><i class="fas fa-smile-plus"></i>add patient <i
                            class="fas fa-bell bell-2"></i></a></li>
                <li><a href="{{route('followingUpView')}}"><i class="fas fa-box-up"></i>following up</a></li>
                <div id="accordion">
                    <li class=" collapsed collap" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo"><a href="#" data-toggle="pill"><i
                                class="fas fa-stethoscope exam"></i>examination<i class="fad fa-angle-double-down"></i></a>
                    </li>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <li><a href="{{route('mini')}}"><i class="fas fa-pills"></i>mini</a></li>
                            <li><a href="{{route('patient_new')}}"><i class="fas fa-smile-plus"></i>new</a></li>
                            <li><a href="{{route('patient_resumption')}}"><i class="fad fa-repeat"></i>resumption</a></li>
                            <li><a href="{{route('today_waiting')}}"><i class="far fa-address-book"></i>waiting</a></li>
                        </div>
                    </div>
                </div>
                <li><a href="#tab_z" data-toggle="pill"><i class="fas fa-globe"></i>online</a></li>
                <li><a href="#"><i class="fas fa-vials"></i>lab tests</a></li>
                <div id="accordion-2">
                    <li class=" collapsed collap" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false"
                        aria-controls="collapsethree"><a href="#" data-toggle="pill"><i
                                class="fas fa-cash-register exam"></i>account reports<i
                                class="fad fa-angle-double-down"></i></a></li>
                    <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-2">
                        <div class="card-body">
                            <li><a href="{{route('day_closing')}}"><i class="fas fa-cash-register"></i>day closing</a></li>
                            <li><a href="{{(route('all_reports'))}}"><i class="fas fa-file-chart-line"></i>reports</a></li>
                            <li class="active"><a href="#"><i class="fal fa-analytics"></i>analysis</a></li>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>
