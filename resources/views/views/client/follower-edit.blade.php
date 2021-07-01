@extends('views.client.client')

@section('innercontent')
    <section class="card">

        <!--doctorSchedule section-->


        <div class="card-body">
            <h4>@lang('resrv.editFollower')</h4>
            <div class="content2">
                <form method="POST" action="{{ url('updateFClient/' . $object->id) }}">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <!-- <div class="col-2">
                                            <div class="icon"><img src="assets/imgs/reserve/user.svg"></div>
                                          </div>-->
                            <div class="col-12">
                                <h4 class="grey3">@lang('login.fName')</h4>
                                <input class="form-control loginInput" name="name" required type="text"
                                    value="{{ $object->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <!--<div class="col-2">
                                            <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                                          </div>-->
                            <div class="col-12">
                                <h4 class="grey3">@lang('login.nationality')</h4>

                                <select class="form-control loginInput" name="nationality" id="nationality" required>
                                    <option value="">@lang('login.nationality')</option>
                                    @foreach ($nationalitys as $nationality)
                                        <option
                                            {{ $object->nationality == $nationality->id ? 'selected="selected"' : '' }}
                                            value="{{ $nationality->id }}">
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
                            <!--<div class="col-2">
                                            <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                                          </div>-->
                            <div class="col-12">
                                <h4 class="grey3">@lang('login.birthdate')</h4>
                                <input class="form-control loginInput" type="text" id="datetimepickerDate1"
                                    value="{{ $object->birthdate }}" name="birthdate" data-toggle="datetimepicker"
                                    data-target="#datetimepickerDate1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="grey3">@lang('login.gender')</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input"
                                            {{ $object->gender == 'Male' ? 'checked="checked"' : '' }} value="Male"
                                            type="radio" name="gender">
                                        @lang('login.male')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" value="Female" type="radio" name="gender"
                                            {{ $object->gender == 'Female' ? 'checked="checked"' : '' }}>@lang('login.female')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="grey3">@lang('login.relation')</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="friend" name="relation"
                                            {{ $object->relation == 'friend' ? 'checked="checked"' : '' }}>@lang('login.friend')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="brother" name="relation"
                                            {{ $object->relation == 'brother' ? 'checked="checked"' : '' }}>@lang('login.brother')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" value="wife" type="radio" name="relation"
                                            {{ $object->relation == 'wife' ? 'checked="checked"' : '' }}>@lang('login.wife')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="husband" name="relation"
                                            {{ $object->relation == 'husband' ? 'checked="checked"' : '' }}>@lang('login.husband')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="son" name="relation"
                                            {{ $object->relation == 'son' ? 'checked="checked"' : '' }}>@lang('login.son')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="daughter" name="relation"
                                            {{ $object->relation == 'daughter' ? 'checked="checked"' : '' }}>@lang('login.daughter')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="father" name="relation"
                                            {{ $object->relation == 'father' ? 'checked="checked"' : '' }}>@lang('login.father')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="mother" name="relation"
                                            {{ $object->relation == 'mother' ? 'checked="checked"' : '' }}>@lang('login.mother')
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-md login-btn" type="submit">@lang('login.update')
                        </button>
                    </div>
                </form>
            </div>


        @endsection
