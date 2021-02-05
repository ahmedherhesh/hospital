@extends('doctor.master')
@section('title')
    <title>Login | Doctor</title>
@endsection
@section('content')

    <div class="clearfix login" id="main">

        <!-- sign in section -->
        <div class="col-md-3 col-md-offset-1  ">
           <!-- <div class="clearfix">
           <a href="index.html"><img class="logo" src="images/logo.png" alt="logo"></a> 
        </div>-->
        <div class="white">
            {{-- <h1 style="color:#428bca;border:1px solid #428bca;border-radius:20px;padding:10px;box-shadow:2px 2px 2px #428bca" >Sign In</h1> --}}
            <form action="{{route('doctor_login')}}" method="POST" style="color:#428bca;border:2px solid #428bca;box-shadow:2px 2px 6px #428bca;border-radius:20px;padding:10px;padding-bottom:20px" class="text-center">
                @csrf
                @if (session()->has('login_error'))
                    <div class="text-danger">{{session()->get('login_error')}}</div>
                @endif
                    
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="user ID / Email">
                </div>                
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary col-md-5">sign in</button>
            </form>
        </div>
    </div>

        <!-- end sign in section -->


<!-- login img section-->
<div class="col-md-8">
    <img class="log-img" src="{{asset('images/banner-2.jpg')}}" alt="login image">
</div>


<!-- end login img section -->
    </div>


    <!-- JS
============================================ -->

		<script >
        function autoResizeDiv()
        {
            document.getElementById('main').style.height = window.innerHeight +'px';
        }
        window.onresize = autoResizeDiv;
        autoResizeDiv();
    </script>
@endsection