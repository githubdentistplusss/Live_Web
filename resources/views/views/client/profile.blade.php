@extends('views.client.client')

@section('innercontent')
    <!-- Page Content -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (Session::has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>{{ Session::get('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
     <div class="pb-3">
                        <button data-toggle="modal" data-target="#flollowerModal" class="btn btn-sm add-new-btn">
                            <i class="fas fa-plus"></i> @lang('resrv.addFollower')
                        </button>
                    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">@lang('login.accountEdit')</h4>
            <!-- Profile Settings Form -->
            <form enctype="multipart/form-data" class="form-horizontal form-simple" method="POST"
                action="{{ route('postprofile') }}">
                {{ csrf_field() }}

                @if (isset($error))
                    <p style="text-align:center;color:red;direction:rtl">
                        <strong>{{ $error }} !</strong>
                    </p>
                @endif
                <div class="row form-row">
                 
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>@lang('login.name')</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $client->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>@lang('login.email')</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $client->email }}" autocomplete="email">
                            <input type="hidden" id="old_email" name="old_email" value="{{ $client->email }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('login.password')</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>@lang('login.re_pass')</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div> --}}
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>@lang('login.nationality')</label>
                            <select class="form-control" name="nationality" id="nationality_id" required>
                                <option value="">@lang('login.nationality')</option>
                                @foreach ($nationalitys as $nationality)
                                    <option {{ $client->nationality == $nationality->id ? 'selected="selected"' : '' }}
                                        value="{{ $nationality->id }}">
                                        @if (app()->getLocale() == 'ar')
                                            {{ $nationality->nationality_name_ar }}
                                        @elseif( app()->getLocale()=='en')
                                            {{ $nationality->nationality_name_en }}
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
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>@lang('login.city')</label>
                            <select autocomplete="off" class="form-control form-control-lg" name="city_id" id="city_id"
                                required>
                                <option value="">@lang('login.city')</option>
                                @foreach ($cities as $city)
                                    <option {{ $client->city_id == $city->id ? 'selected="selected"' : '' }}
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
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>@lang('login.gender')</label>
                            <select class="form-control" name="gender" id="Gender" required>
                                <option value="">@lang('login.select')</option>
                                <option value="Male" {{ $client->gender == 'Male' ? 'selected="selected"' : '' }}>
                                    @lang('login.male')</option>
                                <option {{ $client->gender == 'FeMale' ? 'selected="selected"' : '' }} value="FeMale">
                                    @lang('login.female')</option>


                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong style="color: #FF0000;">{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <?php $newDate = date('m/d/y', strtotime($client->birthdate)); ?>
                        <div class="form-group">
                            <label>@lang('login.birthdate')</label>
                            <input id="datetimepickerDate1" type="text" class="form-control"
                                value="{{ $client->birthdate }}" data-toggle="datetimepicker"
                                data-target="#datetimepickerDate1" name="birthdate">
                            @if ($errors->has('birthdate'))
                                <span class="help-block">
                                    <strong style="color: #FF0000;">{{ $errors->first('birthdate') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">@lang('login.edit')</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->

        </div>
    </div>
    
     <div class="modal fade call-modal" id="flollowerModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>@lang('login.addf')</h3>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('createFollower') }}">
                        @csrf

                        <div class="form-group">

                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><img src="assets/imgs/reserve/user.svg"></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3">@lang('login.fName')</h4>
                                    <input class="form-control loginInput" name="name" required type="text"
                                        placeholder="@lang('login.fName')">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><img src="assets/imgs/account/lang.svg"></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3">@lang('login.nationality')</h4>
                                    <select class="form-control loginInput" name="nationality" id="nationality" required>
                                        <option value="">@lang('login.nationality')</option>
                                        @foreach ($nationalitys as $nationality)
                                            <option value="{{ $nationality->id }}">
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $nationality->nationality_name_ar }}
                                                @elseif( app()->getLocale()=='en')
                                                    {{ $nationality->nationality_name_en }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><i class="fas fa-calendar-alt"
                                            style="color: #0de0fe; font-size: x-large;"></i></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3">@lang('login.birthdate')</h4>
                                    <input class="form-control datetimepicker" type="text" id="datetimepickerDate1" value=""
                                        name="birthdate" data-toggle="datetimepicker" data-target="#datetimepickerDate1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group card-label">
                            <h4>@lang('login.gender')</h4>
                            <div class="form-check-inline">
                                <label class="gender-radio">
                                    <input class="form-check-input" type="radio" value="Male"
                                        name="gender">@lang('login.male')
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
                            <h4 class="grey3">@lang('login.relation')</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="friend"
                                                name="relation">@lang('login.friend')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="brother"
                                                name="relation">@lang('login.brother')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" value="wife" type="radio"
                                                name="relation">@lang('login.wife')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="husband"
                                                name="relation">@lang('login.husband')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="son"
                                                name="relation">@lang('login.son')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="daughter"
                                                name="relation">@lang('login.daughter')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="father"
                                                name="relation">@lang('login.father')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="mother"
                                                name="relation">@lang('login.mother')
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-md login-btn" type="submit">@lang('login.addf')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection
