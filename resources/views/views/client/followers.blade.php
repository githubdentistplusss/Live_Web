@extends('views.client.client')

@section('innercontent')

    <div class="card">
        <div class="card-body pt-0">

            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('clientDashboard') }}">@lang('resrv.follower')</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookedoffers') }}"><span
                                class="med-records">@lang('resrv.uDate')</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('bookedservices') }}"><span
                                class="med-records">مواعيد الخدمات</span></a>
                    </li>
                   
                </ul>
            </nav>
            <!-- /Tab Menu -->

            <!-- Tab Content -->
            <div class="tab-content pt-0">

                <!-- Follower Tab -->
                <div id="pat_appointments" class="tab-pane fade show active">
                    <div class="pb-3">
                        <button data-toggle="modal" data-target="#flollowerModal" class="btn btn-sm add-new-btn">
                            <i class="fas fa-plus"></i> @lang('resrv.addFollower')
                        </button>
                    </div>
                    <div class="card card-table mb-0">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Birth Date</th>
                                            <th>Gender</th>
                                            <th>Relation</th>
                                            <th style="">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Allfollowers as $follower)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ url('editFollower/' . $follower->id) }}">{{ $follower->name }}
                                                            <span>{{ $follower->relation }}</span></a>
                                                    </h2>
                                                </td>
                                                <td>{{ $follower->birthdate }}
                                                </td>
                                                <td>{{ $follower->gender }}</td>
                                                <td>{{ $follower->relation }}</td>
                                                <td class="text-right">
                                                    <div class="table-action row">
                                                        <a href="{{ url('editFollower/' . $follower->id) }}"
                                                            class="btn btn-sm bg-primary-light">
                                                            <i class="fas fa-edit"></i> @lang('login.edit')
                                                        </a>
                                                        <form class="pr-2"
                                                            action="{{ route('deleteFollower', $follower->id) }}"
                                                            method="post">

                                                            {{ csrf_field() }}

                                                            {{ method_field('DELETE') }}

                                                            <button class="btn btn-sm bg-danger-light" type="submit"
                                                                onclick="return confirm('انت على وشك حذف عنصر. هل أنت متأكد ؟!');"><i
                                                                    class="far fa-trash-alt"></i>@lang('login.delete')</button>

                                                        </form>
                                                        {{-- <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="far fa-trash-alt"></i> Delete
                                                                    </a> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Follower Tab -->

            </div>
            <!-- Tab Content -->

        </div>
    </div>
    <!--flollowerModal-->
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
    <!--end flollowerModal-->
@endsection
