@extends('layouts.app')

@if(isset($object))

    @section('title','Edit Hospital')

@endif

@section('title','Edit Hospital')

@section('content')





    @if(isset($object) &&!empty($object))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="hospital_form"
                                      action="{{route('updatehospital', $object->id)}}"
                                      class="form ls_form validate_form" method="post">

                                    {{ csrf_field() }}

                                    {{method_field('PUT')}}

                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Edit Hospital</h4>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_ar">

                                                Arabic Name

                                            </label>

                                            <input type="text" id="hospital_name_ar"
                                                   class="form-control validate[required]" name="hospital_name_ar"
                                                   value="{{$object->hospital_name_ar}}" autofocus>

                                            @if ($errors->has('hospital_name_ar'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_name_ar') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_en">

                                                English Name

                                            </label>

                                            <input type="text" id="hospital_name_en"
                                                   class="form-control validate[required]" name="hospital_name_en"
                                                   value="{{$object->hospital_name_en}}">

                                            @if ($errors->has('hospital_name_en'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_name_en') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">

                                                Arabic Address

                                            </label>

                                            <input type="text" id="hospital_address_ar"
                                                   class="form-control validate[required]" name="hospital_address_ar"
                                                   value="{{$object->hospital_address_ar}}">


                                            @if ($errors->has('hospital_address_ar'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_address_ar') }}</strong>

                                                </span>

                                            @endif

                                        </div>


                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">

                                                English Address

                                            </label>

                                            <input type="text" id="hospital_address_en"
                                                   class="form-control validate[required]" name="hospital_address_en"
                                                   value="{{$object->hospital_address_en}}">


                                            @if ($errors->has('hospital_address_en'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_address_en') }}</strong>

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
                                        <div class="form-group col-md-12">
                                                <div class="col-md-6">		
                                                     <input {{($object->active)?'checked="checked"':""}} type="checkbox" id="active"  name="active" value="1"/>
                                                     Display dates?		
                                                    </div>			
                                        </div>
                                        <div class="form-group col-md-12">

                                            <label for="city">

                                                City

                                            </label>


                                            <select class="form-control validate[required]" required name="city_id">
                                                <option>Select City</option>
                                                @foreach($citys as $city)
                                                    <option {{($object->city_id == $city->id)?'selected="selected"':""}} value="{{$city->id}}">  {{$city->city_name_en}}</option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('city_id'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('city_id') }}</strong>

                                                </span>

                                            @endif

                                        </div>


                                        <div class="form-group col-md-12">
                                            <label class="col-lg-12 control-label text-lg-right pt-2"
                                                   for="req_map_location">@lang('location')</label>
                                            <div class="col-lg-12">
                                                <input type="text" style="width:70%;margin-top: 10px;" id="pac-input"
                                                       class="form-control">
                                                <?php  $location = (!empty($object->req_map_location)) ? $object->req_map_location : "26.4214,50.0812";
                                                 $latitude = (!empty($object->latitude)) ? $object->latitude : "";
                                                 $longitude = (!empty($object->longitude)) ? $object->longitude : "";
                                                  ?>
                                                <input type="hidden" readonly="readonly" id="req_map_location"
                                                       name="req_map_location" value="<?=$location?>"/>

                                                       <input type="hidden" readonly="readonly" id="latitude"
                                                       name="latitude" value="<?=$latitude?>"/>

                                                       <input type="hidden" readonly="readonly" id="longitude"
                                                       name="longitude" value="<?=$longitude?>"/>

                                                <div id="googlemaps" style="width:100%;height:480px"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">Edit</button>

                                        <a href="{{route('showhospital')}}" class="btn btn-warning box-shadow-1 mr-1">
                                            <i class="ft-x"></i>

                                            Back

                                        </a></div>
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

                                <form class="form ls_form validate_form" enctype="multipart/form-data"
                                      id="hospital_form" action="{{route('storehospital')}}" method="post">

                                    {{ csrf_field() }}


                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i>Add Hospital</h4>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_ar">

                                                Arabic Name

                                            </label>

                                            <input type="text" id="hospital_name_ar"
                                                   class=" form-control validate[required]" name="hospital_name_ar"
                                                   tabindex="1" autofocus>

                                            @if ($errors->has('hospital_name_ar'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_name_ar') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_en">

                                                English Name

                                            </label>

                                            <input type="text" id="hospital_name_en"
                                                   class=" form-control validate[required]" name="hospital_name_en"
                                                   tabindex="1">

                                            @if ($errors->has('hospital_name_en'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_name_en') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">
                                                Arabic address


                                            </label>

                                            <input type="text" id="hospital_address_ar"
                                                   class="form-control validate[required]" name="hospital_address_ar"
                                                   value="">


                                            @if ($errors->has('hospital_address_ar'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_address_ar') }}</strong>

                                                </span>

                                            @endif

                                        </div>


                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">

                                                English address

                                            </label>

                                            <input type="text" id="hospital_address_en"
                                                   class="form-control validate[required]" name="hospital_address_en"
                                                   value="">


                                            @if ($errors->has('hospital_address_en'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('hospital_address_en') }}</strong>

                                                </span>

                                            @endif

                                        </div>
                                        <div class="form-group col-md-12">

                                        <label for="sort">

                                           Sort Number

                                        </label>

                                        <input type="number" id="sort" value="0"
                                            class=" form-control" min='0' name="sort">

                                        @if ($errors->has('sort'))

                                            <span class="help-block text-danger">

                                                <strong>{{ $errors->first('sort') }}</strong>

                                            </span>

                                        @endif

                                        </div>

                                        <div class="form-group col-md-12">
                                                <div class="col-md-6">
                                                     <input {{(!empty(old('active')) && old('active') == 1)?'checked="checked"':""}} type="checkbox" id="active"  name="active" value="1"/>
                                                    Display dates?		
                                                    </div>			
                                        </div>
                                        <div class="form-group col-md-12">

                                            <label for="city">

                                                City

                                            </label>


                                            <select class="form-control validate[required]" required name="city_id">
                                                <option>Select City</option>
                                                @foreach($citys as $city)
                                                    <option value="{{$city->id}}">  {{$city->city_name_en}}</option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('city_id'))

                                                <span class="help-block text-danger">

                                                    <strong>{{ $errors->first('city_id') }}</strong>

                                                </span>

                                            @endif

                                        </div>


                                        <div class="form-group col-md-12">
                                            <label class="col-lg-3 control-label text-lg-right pt-2"
                                                   for="req_map_location">@lang('location')</label>
                                            <div class="col-lg-12">
                                                <input type="text" style="width:70%;margin-top: 10px;" id="pac-input"
                                                       class="form-control">
                                                <?php  $location = (!empty(old('req_map_location'))) ? old('req_map_location') : "26.4214,50.0812";
                                                 $latitude = (!empty(old('latitude'))) ? old('latitude') : "";
                                                 $longitude = (!empty(old('longitude'))) ? old('longitude') : "";  ?>

                                                <input type="hidden" readonly="readonly" id="req_map_location"
                                                       name="req_map_location" value="<?=$location?>"/>

                                                       <input type="hidden" readonly="readonly" id="latitude"
                                                       name="latitude" value="<?=$latitude?>"/>

                                                       <input type="hidden" readonly="readonly" id="longitude"
                                                       name="longitude" value="<?=$longitude?>"/>

                                                <div id="googlemaps" style="width:100%;height:480px"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1"><i
                                                    class="la la-check-square-o"></i>

                                            Add
                                        </button>

                                        <a href="{{route('showhospital')}}" class="btn btn-warning box-shadow-1 mr-1">
                                            <i class="ft-x"></i>

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
@section('script')



@endsection