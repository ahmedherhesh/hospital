<div class="clearfix white-2 navbar none">
    <div class="col-md-3 col-xs-4 col-sm-4">
        <form action="{{route('payingPage')}}" method="get">
            <input type="text" class="search" id="search-box" name="paying_for" placeholder="search here ...">
            <button type="submit" hidden></button>
        </form>
        
    </div>
    <div class="col-md-5 col-md-offset-4  col-xs-8 col-sm-8">
        <ul class="header-list">
            <li> <a href="{{route('all_messages')}}"><i class="fas fa-envelope env"></i></a></li>
            <li>
                <div class="dropdown">
                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"> <i class="fas fa-bell env"></i></a>

                    <ul class="dropdown-menu">
                        <li class="not">you have 4 notifications :</li>

                        <li><a href="#"><i class="fas fa-circle"></i>There are many variations of pages
                                available</a></li>
                        <li><a href="#"><i class="fas fa-circle"></i>There are many variations of pages
                                available</a></li>
                        <li><a href="#"><i class="fas fa-circle"></i>There are many variations of pages
                                available</a></li>
                        <li><a href="#"><i class="fas fa-circle"></i>There are many variations of pages
                                available</a></li>

                        <a href="{{route('notifications')}}" class="view">view all</a>
                    </ul>

                </div>
            </li>
            <li>
                
                <div class="dropdown">
                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><span>dr.{{ session()->get('doctor')->name }}</span>
                        <img class="doctor" style="border-radius: 50%"
                            src="{{ asset('uploads/images/'. session()->get('doctor')->profile_image .'') }}"
                            alt="doctor icon"></a>
                            

                    <ul class="dropdown-menu dr">

                        <li><a
                                href="{{ route('settings') }}">Dr.{{ session()->get('doctor')->name }}</a>
                        </li>
                        <li><a
                                href="{{ route('settings') }}">{{ session()->get('doctor')->email }}</a>
                        </li>
                        <li><a href="#">Arabic</a></li>
                        <li><a href="#">English</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="{{ route('settings') }}"><i
                                    class="fas fa-user-cog"></i>settings</a></li><br>
                        <li><a href="{{ route('doctor_logout') }}"><i class="fas fa-sign-out"></i>sign
                                out</a></li>

                    </ul>
                </div>
            </li>
        </ul>
        
    </div>
    <button id="btn-side" class="pull-right btn-side"><i class="fas fa-grip-lines"></i></button>


</div>
