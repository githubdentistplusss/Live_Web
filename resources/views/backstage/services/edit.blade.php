@extends('layouts.app')

@if(isset($object))

    @section('title','Edit Service')

@endif

@section('title','Edit Service')

@section('content')





    @if(isset($object) &&!empty($object))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="service_form" action="{{route('updateservice', $object->id)}}" class="form ls_form validate_form" method="post">

                                    {{ csrf_field() }}

                                    {{method_field('PUT')}}

                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Edit Service</h4>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_ar">

                                              Arabic Name

                                            </label>

                                            <input type="text" id="service_name_ar" class="form-control validate[required]" name="service_name_ar" value="{{$object->service_name_ar}}" autofocus>

                                            @if ($errors->has('service_name_ar'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('service_name_ar') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_en">

                                                English Name

                                            </label>

                                            <input type="text" id="service_name_en" class="form-control validate[required]" name="service_name_en" value="{{$object->service_name_en}}" >

                                            @if ($errors->has('service_name_en'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('service_name_en') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                      
                                        <div class="form-group col-md-12">

                                        <label for="sort">

                                            Sort Number

                                        </label>

                                        <input type="number" id="sort"
                                            class="form-control"  min='0' name="sort"
                                            value="{{$object->sort}}">


                                        @if ($errors->has('sort'))

                                            <span class="help-block text-danger">

                                                <strong>{{ $errors->first('sort') }}</strong>

                                            </span>

                                        @endif

                                        </div>

 
                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">Added</button>

                                        <a  href="{{route('showservice')}}" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            Back

                                        </a> </div>

                                </form>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @else

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form  class="form ls_form validate_form" enctype="multipart/form-data" id="service_form" action="{{route('storeservice')}}"  method="post">

                                    {{ csrf_field() }}



                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Add Service</h4>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_ar">

                                               Arabic Name

                                            </label>

                                            <input type="text" id="service_name_ar"  class=" form-control validate[required]" name="service_name_ar" tabindex="1" autofocus>

                                            @if ($errors->has('service_name_ar'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('service_name_ar') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_en">

                                               English Name

                                            </label>

                                            <input type="text" id="service_name_en"  class=" form-control validate[required]" name="service_name_en" tabindex="1" >

                                            @if ($errors->has('service_name_en'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('service_name_en') }}</strong>

                                                </span>

                                            @endif

                                        </div>
                                        <div class="form-group col-md-12">

                                                <label for="sort">

                                                Sort Number

                                                </label>

                                                <input type="number" id="sort"
                                                    class=" form-control" value="0" min='0' name="sort">

                                                @if ($errors->has('sort'))

                                                    <span class="help-block text-danger">

                                                        <strong>{{ $errors->first('sort') }}</strong>

                                                    </span>

                                                @endif

                                                </div>

                                      
                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1"> <i class="la la-check-square-o"></i>

                                            Add                                </button>

                                        <a  href="{{route('showservice')}}" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            Back

                                        </a>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif

@endsection