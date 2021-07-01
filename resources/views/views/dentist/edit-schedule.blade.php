@extends('views.dentist.dentist')

@section('innercontent')

    <section class="card">

        <!--doctorSchedule section-->
        <!--addModal-->
        <div class="card-body">
            <h4 class="card-title">@lang('login.Uservice')</h4>
            <div class="contentWrap">
                <div class="content2">

                    <form method="POST" action="{{ route('updateCalander', $object->id) }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"
                                for="service_id">@lang('resrv.service')</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-lg" name="service_id" id="service_id" required>

                                    @foreach ($services as $service)
                                        <option {{ $object->service_id == $service->id ? 'selected="selected"' : '' }}
                                            value="{{ $service->id }}">
                                            @if (app()->getLocale() == 'ar')
                                                {{ $service->service_name_ar }}
                                            @elseif( app()->getLocale()=='en')
                                                {{ $service->service_name_en }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('service'))
                                    <span class="help-block">
                                        <strong style="color: #FF0000;">{{ $errors->first('service') }}</strong>
                                    </span>
                                @endif


                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="service_id"
                                id="date_name">@lang('resrv.day') </label>
                            <div class="col-md-12">
                                <?php $newDate = date('m/d/y', strtotime($object->start_date)); ?>
                                <input type="text" value="@lang('mesg.'.$object->day)" class="form-control "
                                    autocomplete="off" disabled />

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong style="color: #FF0000;">{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>



                        <div class="form-group row">

                            <label class="col-md-4 col-form-label text-md-right" for="day">
                                <?php if ($object->start_time > '10:00:00') { ?>
                                @lang('mesg.noon_time')
                                <?php } else { ?>

                                @lang('mesg.morning_time')

                                <?php } ?>

                            </label>
                            <div class="col-md-12">

                                <select class="form-control" required="required" name="morning_time">



                                    <?php if ($object->start_time != '0') { ?>
                                    <option value="{{ $object->start_time }}">{{ $object->start_time }}</option>

                                    <?php } else { ?>
                                    <option value="0">@lang('login.select')</option>
                                    <?php } ?>

                                    <?php if ($object->start_time > '10:00:00') { ?>

                                    <option value="13:00:00">13:00:00</option>
                                    <option value="14:00:00">14:00:00</option>
                                    <option value="15:00:00">15:00:00</option>

                                    <?php } else { ?>


                                    <option value="08:00:00">08:00:00</option>
                                    <option value="09:00:00">09:00:00</option>
                                    <option value="10:00:00">10:00:00</option>
                                    <?php } ?>
                                </select>


                            </div>

                        </div>



                        <div class="btns">
                            <button class="btn btn-primary" type="submit" id="button">@lang('login.edit') </button>

                        </div>
                    </form>

                    <!--end addModal-->

                </div>
            </div>
        </div>
    </section>

@endsection
