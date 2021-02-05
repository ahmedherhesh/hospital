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

        <div class=" white-3 settings">
            <div class="clearfix">
                <div class="col-md-7">
                    <h1><i class="fas fa-user-cog"></i>changing your settings</h1>
                </div>
                <div class="col-md-4">
                    <nav>
                        <ul class="nav nav-tabs nav-fill" id="nav-tab">
                            <li class="active div"><a class="nav-item nav-link" data-toggle="tab"
                                    href="#nav-home">settings</a></li>
                            {{-- <li><a class="nav-item nav-link" data-toggle="tab" href="#nav-profile">prescription
                                    settings</a></li> --}}

                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="tab-content ">
                <form action="{{route('settingsPost')}}" method="post" enctype="multipart/form-data" >
                  @csrf
                    <div class="tab-pane active" id="nav-home">
                        <div class="white-3">
                            <div class="clearfix edit-2">
                                <h1><i class="fas fa-info-circle mr5"></i>basic info</h1>
                            </div>
                            <div class="step1 mb30">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> Name</label>
                                        <input type="text" class="form-control ml15" value="{{session()->get('doctor')->name}}"name="name" id="exampleInputEmail1"
                                            placeholder=" Name"> 
                                            @error('name')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">last Name</label>
                                        <input type="text" class="form-control ml15" value="{{session()->get('doctor')->last_name}}" name="last_name" id="exampleInputEmail1"
                                            placeholder="last Name">
                                            @error('last_name')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror  
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> old password</label>
                                        <input type="password" class="form-control ml15" name="old_password" id="exampleInputEmail1" placeholder="old password">
                                        <input type="hidden" name="old_pass" value="{{$user->password}}">
                                        @error('old_password')
                                            <div  class=" error text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">new password</label>
                                        <input type="password" class="form-control ml15" name="new_password" id="exampleInputEmail1"
                                            placeholder="new password">
                                        @error('new_password')
                                            <div  class="error text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <input type="text" class="form-control ml15" value="{{session()->get('doctor')->personal_mobile}}" name="personal_mobile" id="exampleInputEmail1"
                                            placeholder="mobile number">
                                            @error('personal_mobile')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror  

                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">email</label>
                                        <input type="email" name="email" class="form-control ml15" value="{{session()->get('doctor')->email}}" id="exampleInputEmail1"
                                            placeholder="email">
                                            @error('email')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror  

                                    </div>

                                </div>
                                <div class="clearfix">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1 " class="ml0">profile picture</label>
                                        <div class="clearfix">
                                            <input type="file" name="profile_image"/>
                                            @error('profile_image')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror  
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="white-3">
                            <div class="clearfix edit-2">
                                <h1><i class="fas fa-map-marker-alt mr5"></i>address</h1>
                            </div>
                            <div class="">
                                <div class="clearfix">
                                    <div class="col-md-8">
                                        <div id="address">
                                            @if(!isset($doctor_info))
                                            <div class="step1 mb10 row">
                                                <div class="col-md-4">
                                                    <select class="form-control " name="address[0][state]">
                                                        <option value="">state---</option>
                                                        <option value="giza">giza</option>
                                                        <option value="alexandria">alexandria</option>
                                                        <option value="daqahlya">daqahlya</option>
                                                        <option value="cairo">cairo</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select class="form-control " name="address[0][city]">
                                                        <option value="">city---</option>
                                                        <option value="mansoura">mansoura</option>
                                                        <option value="belqas">belqas</option>
                                                        <option value="mahalla">mahalla</option>
                                                        <option value="tanta">tanta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 ">
                                                    <input type="text" class="form-control width " id="r"
                                                        placeholder=" address" name="address[0][address]">
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <input type="text" class="form-control width " id="r"
                                                        placeholder=" mobile number" name="address[0][mobile]">
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <input type="text" class="form-control width " id="r"
                                                        placeholder=" telephone number" name="address[0][telephone]">
                                                </div>
                                            </div>
                                            @else 
                                            <?php $addressValue = 100; ?>
                                                @foreach (json_decode($doctor_info->address) as $address)
                                                    @if(!empty($address->state) ||!empty($address->cite) ||!empty($address->adress) ||!empty($address->mobile) ||!empty($address->telephone))
                                                    <div class="step1 mb10 row">
                                                        <div class="col-md-4">
                                                            <select class="form-control " name="address[{{$addressValue}}][state]">
                                                                <option value="{{$address->state}}">{{$address->state}}</option>
                                                                <option value="giza">giza</option>
                                                                <option value="alexandria">alexandria</option>
                                                                <option value="daqahlya">daqahlya</option>
                                                                <option value="cairo">cairo</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <select class="form-control " name="address[{{$addressValue}}][city]">
                                                                <option value="{{$address->city}}">{{$address->city}}</option>
                                                                <option value="mansoura">mansoura</option>
                                                                <option value="belqas">belqas</option>
                                                                <option value="mahalla">mahalla</option>
                                                                <option value="tanta">tanta</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12 ">
                                                            <input type="text" class="form-control width " id="r"
                                                                placeholder=" address" name="address[{{$addressValue}}][address]" value="{{$address->address}}">
                                                        </div>
                                                        <div class="form-group col-md-6 ">
                                                            <input type="text" class="form-control width " id="r"
                                                                placeholder=" mobile number" name="address[{{$addressValue}}][mobile]" value="{{$address->mobile}}">
                                                        </div>
                                                        <div class="form-group col-md-6 ">
                                                            <input type="text" class="form-control width " id="r"
                                                                placeholder=" telephone number" name="address[{{$addressValue}}][telephone]" value="{{$address->telephone}}">
                                                        </div>
                                                    </div>
                                                    @endif
                                            <?php $addressValue++ ?>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div id="inputList"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" value="Add new" class="add-new add" id="addInputs" />
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="white-3">
                            <div class="clearfix edit-2">
                                <h1><i class="fas fa-user-edit mr5"></i> Curriculum</h1>
                            </div>
                            <div class="step1 mb30">
                                <div class="row">
                                    <div class="quill"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> specialization</label>
                                        <select class="form-control ml15" name="specialization">
                                            @if(isset($doctor_info))
                                                <option value="{{$doctor_info->specialization}}">
                                                    {{$doctor_info->specialization}}
                                                </option>
                                            @endif
                                            <option value="specialization">specialization</option>
                                            <option value="specialization">specialization</option>
                                            <option value="specialization">specialization</option>
                                            <option value="specialization">specialization</option>
                                        </select>
                                        @error('specialization')
                                            <div class="error text-danger">{{$message}}</div>
                                        @enderror   
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> bachelor degree</label>
                                        <input type="text" class="form-control ml15" name="bachelor_degree" id="exampleInputEmail1" value="{{isset($doctor_info)?$doctor_info->bachelor_degree : ''}}" placeholder="bachelor degree">
                                        @error('bachelor_degree')
                                            <div class="error text-danger">{{$message}}</div>
                                        @enderror  
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class="white-3">
                            <div class="clearfix edit-2">
                                <h1 class="mt20"><i class="fas fa-tags mr5"></i>pricing</h1>
                            </div>
                            <div class="step1 mb30">
                                <label for="exampleInputEmail1">treatments</label>
                                <div class="clearfix">
                                    <div class="col-md-8">
                                        <div id="price">
                                            
                                                @if(!isset($doctor_info))
                                                <div class="row repeat">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="treatments[0][title]"
                                                            id="p" placeholder=" title" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control " name="treatments[0][price]"
                                                            id="pp" placeholder=" price">
                                                    </div>
                                                </div>
                                                @else
                                                    <?php $treatmentValue = 100 ?>
                                                    @foreach (json_decode($doctor_info->treatment) as $info)  
                                                        @if(!empty($info->title) && !empty($info->price))
                                                        <div class="row repeat">
                                                            <div class="col-md-6 ">
                                                                <input type="text" class="form-control" name="treatments[{{$treatmentValue}}][title]" id="p" placeholder=" title" value="{{$info->title}}">
                                                            </div>
                                                            <div class="col-md-6  ">
                                                                <input type="text" class="form-control " name="treatments[{{$treatmentValue}}][price]" id="pp" placeholder=" price" value="{{$info->price}}">
                                                            </div>
                                                        </div>

                                                        @endif
                                                    <?php $treatmentValue++ ?>
                                                    @endforeach
                                                @endif
                                            
                                        </div>
                                        <div id="inputList-2"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" value="Add item" class="add-new float " id="addInputs-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-3">
                            <div class="clearfix edit-2">
                                <h1 class="mt20"><i class="fas fa-calendar-week mr5"></i>Schedule</h1>
                            </div>
                            <div class="step1 mb30 form-group ">
                                <label for="exampleInputEmail1">date</label>
                                <div class="clearfix">
                                    <div class="col-md-8">
                                        <div id="Schedule">
                                            @if(!isset($doctor_info))
                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <input type="date" name="schedule[0][date]" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="time" name="schedule[0][time_start]"
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group ">
                                                        <input type="time" name="schedule[0][time_end]"
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <?php $scheduleValue = 100 ?>
                                            @foreach (json_decode($doctor_info->schedule) as $schedule)  
                                                @if(!empty($schedule->date) && !empty($schedule->time_start) && !empty($schedule->time_end))
                                                   <div class="row ">
                                                        <div class="col-md-4">
                                                            <input type="date" name="schedule[{{$scheduleValue}}][date]" class="form-control"  value="{{$schedule->date}}">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group">
                                                                <input type="time" name="schedule[{{$scheduleValue}}][time_start]"
                                                                    class="form-control" value="{{$schedule->time_start}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group ">
                                                                <input type="time" name="schedule[{{$scheduleValue}}][time_end]" class="form-control" value="{{$schedule->time_end}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            <?php $scheduleValue++ ?>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div id="inputList-3"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" value="Add item" class="add-new  float" id="addInputs-3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-3">
                            <div class="clearfix edit-2">
                                <h1><i class="fas fa-paint-brush mr5"></i>logo</h1>
                            </div>
                            <div class="step1 mb30">
                                <div class="clearfix">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1 prof" class="ml0">upload your logo</label>
                                        <div class="clearfix">
                                            <input type="file" name="logo_image" />
                                            @error('logo_image')
                                                <div class="error text-danger">{{$message}}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-3">
        <div class="step1">
            <div class="clearfix">
                <div class="col-md-3">
                    <span class="check"><i class="fas fa-map-marker-question q"></i>who can see the
                        patient diagnosis:</span>
                    <input type="radio" id="male" name="gender" value="male">
                    <label class="qq" for="male">available for the patient only</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label class="qq" for="female">available for the doctors only</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label class="qq" for="other">available for only one doctor :</label>
                    <input type="text" class="form-control mb30" id="exampleInputEmail1"
                        placeholder=" the doctor name">

                </div>
                <div class="col-md-3">
                    <div class="clearfix">
                        <span class="check"><i class="fas fa-map-marker-question q"></i>can the doctor
                            accept to do online check ups:</span>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                id="myonoffswitch" tabindex="0" checked>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <p class="onoffswitch-inner"></p>
                                <p class="onoffswitch-switch"></p>
                            </label>
                        </div>
                    </div>
                    <div class="clearfix">
                        <span class="check"><i class="fas fa-map-marker-question q"></i>language
                            :</span>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                id="myonoffswitch-3" tabindex="0" checked>
                            <label class="onoffswitch-label lang" for="myonoffswitch-3">
                                <p class="onoffswitch-inner-3"></p>
                                <p class="onoffswitch-switch "></p>
                            </label>
                        </div>
                    </div>


                </div>

                <div class="col-md-3">
                    <span class="check"><i class="fas fa-map-marker-question q"></i>can the doctor
                        accept to do online chat:</span>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                            id="myonoffswitch-1" tabindex="0" checked>
                        <label class="onoffswitch-label" for="myonoffswitch-1">
                            <p class="onoffswitch-inner"></p>
                            <p class="onoffswitch-switch"></p>
                        </label>
                    </div>


                </div>
                <div class="col-md-3">
                    <span class="check"><i class="fas fa-map-marker-question q"></i>can the assistant
                        see all the dashboard:</span>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                            id="myonoffswitch-2" tabindex="0" checked>
                        <label class="onoffswitch-label" for="myonoffswitch-2">
                            <p class="onoffswitch-inner"></p>
                            <p class="onoffswitch-switch"></p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>
                        <div class="form-group" style="text-align: center;margin-top:10px">
                            <button type="submit" class="preview">save changes</button>
                        </div>

                    </div>
                </form>
                <div class="tab-pane " id="nav-profile">
                    <div class="white-3">
                        <div class="clearfix edit-2 ">

                            <h1><i class="fas fa-info-circle mr5"></i>doctor info</h1>
                        </div>
                        <div class="step1 mb30">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control ml15" id="exampleInputEmail1"
                                        placeholder=" Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">specialization</label>
                                    <select class="form-control ml15">
                                        <option>specialization</option>
                                        <option>specialization</option>
                                        <option>specialization</option>
                                        <option selected>specialization</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1"> bachelor degree</label>
                                    <input type="text" class="form-control ml15" id="exampleInputEmail1"
                                        placeholder="bachelor degree">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1"> description</label>
                                    <textarea class="notes ml15 w96"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-3">
                        <div class="clearfix edit-2">
                            <h1><i class="fas fa-paint-brush mr5"></i>logo</h1>
                        </div>
                        <div class="step1 mb30">
                            <div class="clearfix">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1 prof" class="ml0">upload your logo</label>
                                    <div class="clearfix">
                                        <input type="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-3">
                        <div class="clearfix edit-2">
                            <h1><i class="fas fa-info-circle mr5"></i>patient info</h1>
                        </div>
                        <div class="step1 mb30">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control ml15" id="exampleInputEmail1 "
                                        placeholder=" Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">address</label>
                                    <input type="text" class="form-control ml15" id="exampleInputEmail1 "
                                        placeholder="address">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1"> date of examination</label>
                                    <input type="text" class="form-control ml15" id="example-2">
                                </div>

                            </div>




                        </div>
                    </div>
                    <div class="white-3">
                        <div class="clearfix edit-2">
                            <h1><i class="fas fa-map-marker-alt mr5"></i>address</h1>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-8">
                                <div id="presc-address">
                                    <div class="step1 mb30">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> state</label>
                                                <select class="form-control ">
                                                    <option>giza</option>
                                                    <option>alexandria</option>
                                                    <option>daqahlya</option>
                                                    <option selected>cairo</option>
                                                </select>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> city</label>
                                                <select class="form-control ">
                                                    <option>mansoura</option>
                                                    <option>belqas</option>
                                                    <option>mahalla</option>
                                                    <option selected>tanta</option>
                                                </select>

                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="email" class="form-control width " id="exampleInputEmail1"
                                                    placeholder=" address">

                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="col-md-10">
                                                <div id="numbers">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label for="exampleInputEmail1"> mobile number</label>
                                                            <input type="text" class="form-control "
                                                                id="exampleInputEmail1 " placeholder="mobile number">


                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="exampleInputEmail1"> telephone number</label>
                                                            <input type="text" class="form-control "
                                                                id="exampleInputEmail1 " placeholder="telephone number">


                                                        </div>


                                                    </div>
                                                </div>
                                                <div id="inputList-44"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="button" value="Add new" class="add-new add"
                                                    id="addInputs-44" />
                                            </div>
                                        </div>
                                        <div class="clearfix">

                                        </div>





                                    </div>
                                </div>
                                <div id="inputList-4"></div>
                            </div>
                            <div class="col-md-4">
                                <input type="button" value="Add new" class="add-new add" id="addInputs-4" />
                            </div>
                        </div>

                    </div>


                    <div class="white-3">
                        <div class="clearfix edit-2">
                            <h1><i class="fas fa-stamp mr5"></i>seal</h1>
                        </div>
                        <div class="step1 mb30">
                            <div class="clearfix">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1 prof" class="ml0">upload your seal</label>
                                    <div class="clearfix mb30">
                                        <input type="file" />
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="clearfix">
                        <ul class="links mb30">
                            <li><a href="#" class="preview">save changes</a></li>

                        </ul>
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

<script>
    [{
            supported: 'Symbol' in window,
            fill: 'https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser-polyfill.min.js'
        },
        {
            supported: 'Promise' in window,
            fill: 'https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js'
        },
        {
            supported: 'fetch' in window,
            fill: 'https://cdn.jsdelivr.net/npm/fetch-polyfill@0.8.2/fetch.min.js'
        },
        {
            supported: 'CustomEvent' in window && 'log10' in Math && 'sign' in Math && 'assign' in Object && 'from' in
                Array && ['find', 'findIndex', 'some', 'includes'].reduce(function (previous, prop) {
                    return (prop in Array.prototype) ? previous : false;
                }, true),
            fill: 'https://unpkg.com/filepond-polyfill/dist/filepond-polyfill.js'
        }
    ].forEach(function (p) {
        if (p.supported) return;
        document.write('<script src="' + p.fill + '"><\/script>');
    });

</script>
<script src="js/filepond.js"></script>

<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create the FilePond instance
    const pond = FilePond.create(inputElement, {
        allowMultiple: true,
        allowReorder: true,
        allowRemove: false
    });

    // Easy console access for testing purposes
    window.pond = pond;

</script>

<script>
    var adressValue = 1
    $('#addInputs').click(function () {
        var zzz = $(
            `<div id="address"><div class="step1 mb10 row"><div class="col-md-4"><select class="form-control " name="address[${adressValue}][state]"><option value="">stat---</option><option value="giza">giza</option><option value="alexandria">alexandria</option><option value="daqahlya">daqahlya</option><option value="cairo">cairo</option></select></div><div class="col-md-4 form-group"><select class="form-control " name="address[${adressValue}][city]"><option value="">city---</option><option value="mansoura">mansoura</option><option value="belqas">belqas</option><option value="mahalla">mahalla</option><option value="tanta">tanta</option></select></div></div><div class="row"><div class="form-group col-md-12 "><input type="text" class="form-control width " id="r"placeholder=" address" name="address[${adressValue}][address]"></div><div class="form-group col-md-6 "><input type="text" class="form-control width " id="r"placeholder=" mobile number" name="address[${adressValue}][mobile]"></div><div class="form-group col-md-6 "><input type="text" class="form-control width " id="r"placeholder=" telephone number" name="address[${adressValue}][telephone]"></div></div></div>`
            );
        $('#inputList').append(zzz);
        adressValue++

    });

</script>

<script>
    var priceValue = 1
    $('#addInputs-2').click(function () {
        var price = $(
            `<div id="price"><div class="row repeat"><div class="col-md-6"><input type="text" class="form-control "name="treatments[${priceValue}][title]" id="p" placeholder=" title"></div><div class="col-md-6"><input type="text" class="form-control " name="treatments[${priceValue}][price]"  id="pp" placeholder=" price"></div></div></div>`
            )
        $('#inputList-2').append(price)
        priceValue++
    });

</script>

<script>
    var scheduleValue = 1
    $('#addInputs-3').click(function () {
        var schedule = $(`<div id="Schedule"><div class="row "><div class="col-md-4"><input type="date" name="schedule[${scheduleValue}][date]" class="form-control "></div><div class="col-md-2"><div class="input-group"><input type="time" class="form-control" name="schedule[${scheduleValue}][time_start]" value="09:30"></div></div><div class="col-md-2"><div class="input-group "><input type="time" name="schedule[${scheduleValue}][time_end]" class="form-control" value="11:30"></div></div></div></div>`)
        $('#inputList-3').append(schedule)
        scheduleValue++
    });

</script>

<script>
    $('#addInputs-4').click(function () {
        $('#presc-address').clone().appendTo('#inputList-4')


    });

</script>

<script>
    $('#addInputs-44').click(function () {
        $('#numbers').clone().appendTo('#inputList-44')


    });

</script>

<script src="{{ asset(('js/the-datepicker.js')) }}"></script>
<script>
    (function () {
        const input = document.getElementById('example');
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
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
            method: 'HEAD',
            mode: 'no-cors'
        })).then(function (response) {
            return true;
        }).catch(function (e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }

</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-46156385-1', 'cssscript.com');
    ga('send', 'pageview');

</script>


<script type="text/javascript" src="{{ asset(('js/bootstrap-clockpicker.min.js')) }}"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker()
        .find('input').change(function () {
            console.log(this.value);
        });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    $('.clockpicker-with-callbacks').clockpicker({
            donetext: 'Done',
            init: function () {
                console.log("colorpicker initiated");
            },
            beforeShow: function () {
                console.log("before show");
            },
            afterShow: function () {
                console.log("after show");
            },
            beforeHide: function () {
                console.log("before hide");
            },
            afterHide: function () {
                console.log("after hide");
            },
            beforeHourSelect: function () {
                console.log("before hour selected");
            },
            afterHourSelect: function () {
                console.log("after hour selected");
            },
            beforeDone: function () {
                console.log("before done");
            },
            afterDone: function () {
                console.log("after done");
            }
        })
        .find('input').change(function () {
            console.log(this.value);
        });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function (e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }

</script>
<script type="text/javascript" src="{{ asset('js/highlight.min.js') }}"></script>
<script type="text/javascript">
    hljs.configure({
        tabReplace: '    '
    });
    hljs.initHighlightingOnLoad();

</script>
@endsection
