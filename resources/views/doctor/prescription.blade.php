@extends('doctor.master')
@section('content')
        <div class="clearfix">
            <div class="col-md-6 style">
                <p>doctor name : {{ session()->get('doctor')->name }}
                    {{ session()->get('doctor')->last_name }}</p>
                <p>specialization : {{ $doctor_info->specialization }}</p>
                <p>Bachelor Degree : {{ $doctor_info->bachelor_degree }}</p>
            </div>
            <div class="col-md-6 style">
                <p>patient name : @isset($patient) {{ $patient->fullname }} @endisset</p>
                <p>patient address : @isset($patient) {{ $patient->adress }} @endisset</p>
                <p>date of examination : {{ date('Y-m-d') }}</p>
            </div>
        </div>
       <table class="table table-striped w-auto mt00">
           
                 <!--Table head-->
                 <thead>
                    <tr>
                        <th>medicine Details</th>
                        <th>notes</th>
                        @if(!empty($prescription->required_test))
                            @if(!empty(json_decode($prescription->required_test)))
                                <th>required_test</th>
                            @endif
                        @endif
                        @if(!empty($prescription->medical_radiology))
                            @if(!empty(json_decode($prescription->medical_radiology)))
                                <th>medical_radiology</th>
                            @endif  
                        @endif
                        <th>examination_date</th>
                        <th>next_examination</th>

                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>

                            <tr class="table-info" id="table_info">
                                <td>
                                    @if(!empty(json_decode($prescription->medicine)))
                                        @foreach (json_decode($prescription->medicine) as $medicine)
                                            <p class="drug-name"><b>Rx:</b> {{$medicine->name}}</p>
                                            <p class="dose"><b>Dose:</b> {{$medicine->dose}}</p>
                                            <p ><b>time:</b>{{$medicine->time}}</p>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{$prescription->notes}}</td>
                                @if(!empty($prescription->required_test))
                                    @if(!empty(json_decode($prescription->required_test)))
                                    <td>
                                        @foreach (json_decode($prescription->required_test) as $test)
                                            <p > {{$test->required_test}}</p>
                                        @endforeach
                                    </td>
                                    @endif
                                @endif
                                @if(!empty($prescription->medical_radiology))
                                    
                                    @if(!empty(json_decode($prescription->medical_radiology)))
                                    <td>
                                        @foreach (json_decode($prescription->medical_radiology) as $radio)
                                            <p > {{$radio->medical_radiology}}</p>
                                        @endforeach
                                    </td>
                                    @endif
                                @endif
                                <td>{{$prescription->examination_date}}</td>
                                <td>{{$prescription->next_examination}}</td>
                            </tr>
                </tbody>
                <!--Table body-->
            </table>
           
        


            <div class="clearfix ">
                <div class="col-md-10  mb30 style">
                    @if(!empty($doctor_info->address))
                        <p>doctor address:</p>
                        @foreach(json_decode($doctor_info->address) as $address)
                            <div class="address">
                                {{ $address->state }} / {{ $address->city }} /
                                {{ $address->address }}/
                                mobile: {{ $address->mobile }} / telephone: {{ $address->telephone }}
                            </div>
                            
                        @endforeach
                    @else
                        <p>doctor address</p>
                        <p>doctor mobile no.</p>
                        <p>doctor telephone no.</p>
                    @endif
                </div>
                <div class="col-md-2 pull-right">
                    @if(!empty($doctor_info->logo))
                        <p>logo :</p> <img class="logo"
                            src="{{ asset('uploads/images/'. $doctor_info->logo) }}">
                    @else
                        <p>logo : not found</p>
                    @endif
                </div>
            </div>


    </div>
    <script>window.print()</script>
@endsection
