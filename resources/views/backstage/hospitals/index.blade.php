@extends('layouts.app')

@section('title','Hospitals')

@section('content')

    @if(isset($objects))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements" style='display: inline-block'>

                                <a href="{{route('addhospital')}}"
                                   class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>

                            </div>
                            
                            <!--<div class="col-md-6" style='float: right ;display: inline-block;z-index:9999'>-->
                                
                            <!--    <form action="{{route('showhospital')}}" method="GET">-->
                            <!--        <div class="input-group">-->
                            <!--            <input type="text" class="form-control" name="search" placeholder="Search for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">-->
                            <!--            <span class="input-group-btn">-->
                            <!--                <button class="btn btn-secondary" type="submit">Search</button>-->
                            <!--            </span>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">

                                    <!--<table class="table table-bordered table-striped">-->

                                        <thead>

                                        <tr>

                                            <th>#</th>
                                              
                                               <th>Hospital Id#</th>

                                            <th>Hospital name arabic</th>
                                            <th>Hospital name english</th>


                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        @if(($objects))


                                            @foreach($objects as $object)

                                                <tr>

                                                    <td>{{$object->sort}}</td>
                                                    
                                                     <td>{{$object->id}}</td>



                                                    <td>{{$object->hospital_name_ar}}</td>

                                                    <td>{{$object->hospital_name_en}}</td>

                                                    <td>
                                                        <div class="container">

                                                            <div class="row">

                                                                {{--@foreach(Auth::user()->permission as $per)--}}

                                                                    {{--@if($per->per_name == 'edithospital')--}}

                                                                        <a href="{{route('edithospital', $object->id)}}"
                                                                           class="btn btn-icon btn-pure info"><i
                                                                                    class="ft-settings"></i>Edit</a>

                                                                    {{--@endif @endforeach--}}

                                                                {{--@foreach(Auth::user()->permission as $per)--}}



                                                                    {{--@if($per->per_name == 'deletehospital')--}}



                                                                        <form action="{{route('deletehospital', $object->id)}}"
                                                                              method="post">

                                                                            {{csrf_field()}}

                                                                            {{method_field('DELETE')}}

                                                                            <button class="btn btn-icon btn-pure danger"
                                                                                    type="submit"
                                                                                    onclick="return confirm('?????? ?????? ?????? ?????? ????????. ???? ?????? ?????????? ??!');">
                                                                                <i class="ft-trash-2"></i>Delete
                                                                            </button>

                                                                        </form>

                                                                    {{--@endif @endforeach--}}

                                                            </div>


                                                        </div>
                                                    </td>

                                                </tr>





                                            @endforeach

                                        @else

                                            <tr>

                                                <td colspan="7">No hospitals found</td>

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