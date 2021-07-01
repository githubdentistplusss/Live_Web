@extends('layouts.app')

@section('title','Dentists Calendar')

@section('content')


    @if(isset($objects))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                </div>

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">
                                
                               <h1>مواعيد الاطباء</h1> 

                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">

                                        <thead>

                                        <tr>

                                            <th>#</th>
                                            <th>Doctor</th>
                                            <th>Hospital</th>
                                            <th>Service</th>
                                            <th>Start Date</th>
                                           <!--// <th>End Date</th>-->
                                          <th>Day</th>
                                            <th>Start Time</th>
                        
                                            <th>Mobile</th>
                                            <th>Status</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        @if(count($objects))

                                            <?php

                                            $_page = (!empty($_GET['page']))?$_GET['page']:1;

                                            $counter = intval($_per_page * intval($_page - 1)) + 1;

                                            ?>



                                            @foreach($objects as  $object)

                                                @if($object->admin != 2)

                                                    <tr>

                                                        <td>{{$object->id}}</td>
                                                       
                                                           <td>{{$object->dentist['name']}}</td>

        
                                                        <td>{{$object->hospital['hospital_name_en']}}</td>

                                                        <td>{{$object->service['service_name_en']}}</td>

                                                        <td>{{$object->start_date}}</td>

                                                        <td>{{$object->day}}</td>

                                                        <td>{{date("g:ia", strtotime($object->start_time))}}</td>

                                                        <td>{{$object->dentist['mobile']}}</td>

                                                        <td>
                                                            @if($object->status)
                                                            Reserved
                                                            @else
                                                            Not reserved
                                                            @endif
                                                        </td>

                                                    </tr>

                                                @endif

                                                <?php $counter++; ?>

                                            @endforeach

                                        @else

                                            <tr>

                                                <td colspan="7">لا يوجد اعضاء</td>

                                            </tr>

                                        @endif

                                        </tbody>



                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif

@endsection