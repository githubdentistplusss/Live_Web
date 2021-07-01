<?php $page = 'register'; ?>
@extends('views.layout.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content" style="min-height:200px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-2">

                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">

                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>@lang('login.dregister') </h3>
                                </div>
                                @if (Session::has('message'))
                                    <div class="alert alert-success col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {!! Session::get('message') !!}
                                    </div>
                                @elseif(Session::has('error_message'))
                                    <div class="alert alert-danger col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <strong style="color: #000;">{!! Session::get('error_message') !!}</strong>
                                    </div>
                                @endif
                                <!-- Register Form -->
                                <form method="POST" action="{{ route('dentistRegister') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group card-label">
                                        <label>@lang('login.nation_id')</label>
                                        <input id="nation_id" type="text"
                                            class="form-control loginInput @error('nation_id') is-invalid @enderror"
                                            name="nation_id" value="{{ old('nation_id') }}" required
                                            autocomplete="nation_id" autofocus>

                                        @error('nation_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.name')</label>
                                        <input id="name" type="text"
                                            class="form-control loginInput @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.email')</label>
                                        <input id="email" type="email"
                                            class="form-control loginInput @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.mobile')</label>
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror loginInput"
                                            name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.password')</label>
                                        <input id="password" type="password"
                                            class="form-control loginInput  @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.re_pass')</label>
                                        <input id="password-confirm" type="password" class="form-control loginInput"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group card-label">
                                        <h4>@lang('login.nationality')</h4>
                                        <select class="form-control loginInput form-control-lg" name="nationality"
                                            id="nationality" required>

                                            @foreach ($nationalitys as $nationality)
                                                <option
                                                    {{ old('nationality') == $nationality->nationality ? 'selected="selected"' : '' }}
                                                    value="{{ $nationality->id }}">
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $nationality->nationality_name_ar }}
                                                    @elseif( app()->getLocale()=='en')
                                                        {{ $nationality->nationality_name_en }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('nationality'))
                                            <span class="help-block">
                                                <strong
                                                    style="color: #FF0000;">{{ $errors->first('nationality') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group card-label">
                                        <h4>@lang('login.city')</h4>
                                        <select class="form-control loginInput form-control-lg" name="city_id" id="city_id"
                                            required>
                                            <option value="">@lang('login.city')</option>
                                            @foreach ($cities as $city)
                                                <option {{ old('city_id') == $city->id ? 'selected="selected"' : '' }}
                                                    value="{{ $city->id }}">
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $city->city_name_ar }}
                                                    @elseif( app()->getLocale()=='en')
                                                        {{ $city->city_name_en }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('city_id'))
                                            <span class="help-block">
                                                <strong style="color: #FF0000;">{{ $errors->first('city_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group card-label">
                                        <h4>@lang('login.hospital')</h4>

                                        <select class="form-control loginInput form-control-lg" name="hospital"
                                            id="hospital" required>
                                            <option selected value="">@lang('login.hospital')</option>
                                            @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $hospital->hospital_name_ar }}
                                                    @elseif( app()->getLocale()=='en')
                                                        {{ $hospital->hospital_name_en }}
                                                    @endif
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('hospital'))
                                            <span class="help-block">
                                                <strong style="color: #FF0000;">{{ $errors->first('hospital') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group card-label">
                                        <h4>@lang('login.gender')</h4>
                                        <div class="form-check-inline">
                                            <label class="gender-radio">
                                                <input class="form-check-input" type="radio" value="Male" name="gender"
                                                    checked>@lang('login.male')
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="gender-radio">
                                                <input class="form-check-input" type="radio" value="Female"
                                                    name="gender">@lang('login.female')
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong style="color: #FF0000;">{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group card-label">
                                        <h4>@lang('login.dgree')</h4>

                                        <select id="dgree" type="text"
                                            class="form-control @error('dgree') is-invalid @enderror loginInput"
                                            name="dgree" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">@lang('login.entern')</option>
                                        </select>
                                        @if ($errors->has('dgree'))
                                            <span class="help-block">
                                                <strong style="color: #FF0000;">{{ $errors->first('dgree') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.birthdate')</label>
                                        <input required id="datetimepickerDate1" type="text" class="form-control datetimepicker"
                                            value="" data-toggle="datetimepicker" data-target="#datetimepickerDate1"
                                            name="birthdate">

                                    </div>
                                    <h4>@lang('login.uPhoto')</h4>
                                    <div class="form-group">
                                        <div class="change-avatar">
                                           
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" id="photo" required="required" class="form-control upload"
                                                        name="photo">
                                                    @if ($errors->has('photo'))
                                                        <span class="help-block text-danger">
                                                            <strong>{{ $errors->first('photo') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                                    
                                                    <div class="profile-img">
                                                <br>
                                                 <ul id="upload-wrap"></ul>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>@lang('login.pPhoto')</h4>
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" id="profile" class="form-control upload" name="profile_photo">
                                                    @if ($errors->has('profile_photo'))
                                                        <span class="help-block text-danger">
                                                            <strong>{{ $errors->first('profile_photo') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                                    
                                                     <div class="profile-img">
                                                <br>
                                                 <ul id="upload-wrap1"></ul>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <div class="terms-accept">
                                                <div class="custom-checkbox">
                                                    <input class="form-check-input" required type="checkbox" value="">
                                                    <label for="terms_accept"><a
                                                            href="{{ route('termsdentist') }}">@lang('login.privacy')</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block btn-lg login-btn"
                                        type="submit">@lang('login.dregister')</button>
                                    <div class="text-right pt-2">
                                        <a class="forgot-link" href="{{ route('dentistlogin') }}">
                                            @lang('login.hasAccount')</a>
                                    </div>
                                    {{-- <div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div> --}}
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
    
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
		    $(document).ready(function() {
		        
		       
  if (window.File && window.FileList && window.FileReader) {
      
    $("#photo").on("change", function(e) {
      
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("#upload-wrap").append("<li style=\"display:inline\"><div class=\"upload-images\">" +
            "<img  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span style=\"color:red\" class=\"remove\">مسح</span>" +
            "</div></li>");
          $(".remove").click(function(){
            $(this).parent(".upload-images").remove();
          });
          
														
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
   if (window.File && window.FileList && window.FileReader) {
  $("#profile").on("change", function(e) {
      
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("#upload-wrap1").append("<li style=\"display:inline\"><div class=\"upload-images\">" +
            "<img  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span style=\"color:red\" class=\"remove\">مسح</span>" +
            "</div></li>");
          $(".remove").click(function(){
            $(this).parent(".upload-images").remove();
          });
          
														
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
  
});
</script>
@endsection
