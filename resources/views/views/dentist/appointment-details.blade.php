@extends('views.dentist.dentist')

@section('innercontent')

    <!--dateDetails section-->
    <section class="card">

        <div class="card-body">
            <h4>@lang('resrv.details')</h4>
            <div class="content pt-4 pb-4">
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.detailsID')</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="#{{ $object[0]->event_id }}" readonly>
                </div>
                <div class="date-det pb-3">
                    @if ($follower)
                        <h5 class="grey3">@lang('resrv.ill')</h5>
                    @else
                        <h5 class="grey3">@lang('resrv.patient')</h5>
                    @endif
                    <h4 class="blue2">
                        @if ($follower)
                            <input class="form-control loginInput" name="name" required type="text"
                                value="{{ $follower[0]->name }}" readonly>
                        @else
                            <input class="form-control loginInput" name="name" required type="text"
                                value="{{ $object[0]->Uname }}" readonly>

                        @endif
                    </h4>
                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('about.dentist')</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="@if ($object[0]->status == '1' || $object[0]->status == '2' || $object[0]->status == '3' || $object[0]->status == '5' || $object[0]->status == '6' || $object[0]->status == '7') {{  $object[0]->D_name }} @endif" readonly>


                    @if ($object[0]->status == '1' || $object[0]->status == '2')
                  <!--      <a href="{{ route('messages') }}"> <img src="{{ asset('img/chat-bubbles.png') }}"
                                width="35"></a>
                                -->

                    @endif

                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('login.hospital')</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{ $object[0]->hospital_name_ar }}" readonly>
                </div>
                @if (isset(Auth::guard('dentist')->user()->id))
                    <!--<div class="date-det">
                                                                                                                                                                      <h5 class="grey3">الطبيب المعالج</h5>
                                                                                                                                                                      <h4 class="blue2">{{ $object[0]->D_name }}</h4>
                                                                                                                                                                    </div>-->
                @endif
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.trate')</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{ $object[0]->service_name_ar }}" readonly>
                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3"> @lang('resrv.dateTime')</h5>
                    <?php
                    $start_time = date('h:i', strtotime($object[0]->start_time));
                    $am = date('A', strtotime($object[0]->start_time));
                    ?>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{ $object[0]->event_date }} / {{ $start_time }} {{ $am }}" readonly>

                </div>
                <!--<div class="date-det">
                                                                                                                                                                      <div class="custom-control custom-checkbox">
                                                                                                                                                                        <input class="custom-control-input" type="checkbox" id="alarm" name="alarmCheck">
                                                                                                                                                                        <label class="custom-control-label blue" for="alarm">تفعيل التنبية</label>
                                                                                                                                                                      </div>
                                                                                                                                                                    </div>-->
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.satus')</h5>
                    @if ($object[0]->status == '0')
                        <h4 class="badge badge-pill bg-warning-light">@lang('resrv.satus0')</h4>
                    @elseif($object[0]->status=="1")
                        <h4 class="badge badge-pill bg-success-light">@lang('resrv.satus1')</h4>
                    @elseif($object[0]->status=="2")
                        <h4 class="badge badge-pill bg-success-light">@lang('resrv.satus2')</h4>
                    @elseif($object[0]->status=="3")
                        <h4 class="badge badge-pill bg-danger-light">@lang('resrv.satus3')</h4>
                   
                    @elseif($object[0]->status=="4")
                        <h4 class="badge badge-pill bg-danger-light">@lang('resrv.satus4')</h4>
                        
                         @elseif($object[0]->status=="5")
                        <h4 class="badge badge-pill bg-success-light">@lang('resrv.satus5')</h4>
                        <!-- <div class="date-det">
                                                                                                                                                                      <h5 class="grey3">سبب الرفض</h5>
                                                                                                                                                                      <h4 class="pink">{{ $object[0]->reason }}</h4>
                                                                                                                                                                    </div>-->
                    @endif

                </div>

                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('about.dentistMobile')</h5>
                    <input class="form-control loginInput" name="name" required type="text" value="@if ($object[0]->status == '1' || $object[0]->status == '2' || $object[0]->status == '5' || $object[0]->status == '6' || $object[0]->status == '7' ) {{ $object[0]->D_mobile }} @endif"
                    readonly>

                </div>

                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('about.patientMobile')</h5>
                    <input class="form-control loginInput" name="name" required type="text" value="@if ($object[0]->status == '1' || $object[0]->status == '2' || $object[0]->status == '5' || $object[0]->status == '6' || $object[0]->status == '7' ) @if ($follower)
                        {{ $follower[0]->user->mobile }}
                    @else
                        {{ $object[0]->Umobile }} @endif
                        @endif" readonly>
                </div>


                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.attachments')</h5>
                    <div class="attach-image">

                        @if (!empty($object[0]->event_photo))
                            <a href="{{ asset('images/' . $object[0]->event_photo) }}" target="_blank">
                                <img width="100" height="100" src="{{ asset('images/' . $object[0]->event_photo) }}"></a>
                        @endif

                        @if (!empty($object[0]->event_photo2))
                            <a href="{{ asset('images/' . $object[0]->event_photo2) }}" target="_blank">
                                <img width="100" height="100" src="{{ asset('images/' . $object[0]->event_photo2) }}"></a>
                        @endif
                        @if (!empty($object[0]->event_photo3))
                            <a href="{{ asset('images/' . $object[0]->event_photo3) }}" target="_blank">
                                <img width="100" height="100" src="{{ asset('images/' . $object[0]->event_photo3) }}"></a>
                        @endif
                        @if (!empty($object[0]->event_photo4))
                            <a href="{{ asset('images/' . $object[0]->event_photo4) }}" target="_blank">
                                <img width="100" height="100" src="{{ asset('images/' . $object[0]->event_photo4) }}"></a>
                        @endif
                        @if (!empty($object[0]->event_photo5))
                            <a href="{{ asset('images/' . $object[0]->event_photo5) }}" target="_blank">
                                <img width="100" height="100" src="{{ asset('images/' . $object[0]->event_photo5) }}"></a>
                        @endif

                        @if (empty($object[0]->event_photo) && empty($object[0]->event_photo2) && empty($object[0]->event_photo3) && empty($object[0]->event_photo4) && empty($object[0]->event_photo5))
                            @lang('resrv.notfound')
                        @endif

                    </div>
                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.diseases')</h5>
                    <input class="form-control loginInput" name="name" required type="text" value="@if (!empty($object[0]->diseases)) {{ $object[0]->diseases }} @endif"
                    readonly>

                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.drugs')</h5>
                    <input class="form-control loginInput" name="name" required type="text" value="@if (!empty($object[0]->drugs)) {{ $object[0]->drugs }} @endif"
                    readonly>
                </div>
                
                 <div class="date-det pb-3">
                    <h5 class="grey3">ملاحظات</h5>
                    <input class="form-control loginInput" name="name" required type="text" value="@if (!empty($object[0]->drugs)) {{ $object[0]->description }} @endif"
                    readonly>
                </div>
                @if ($object[0]->status !== 3 && $object[0]->status !== 4)

                    <?php
                    $now_date = Carbon\Carbon::now()->format('Y-m-d');
                    $date1 = new DateTime($object[0]->event_date);
                    $date2 = new DateTime($now_date);
                    $interval = $date1->diff($date2);
                    $now_time = Carbon\Carbon::now()->format('H:i:s');
                    ?>

                    @if (isset(Auth::guard('dentist')->user()->id))
                        <?php
                        $today = date('Y-m-d');
                        if ($object[0]->event_date >= $today and $object[0]->status == 0) { ?>

                        <div class="btns">
                            <a href="{{ route('accepetReservation', $object[0]->event_id) }}"
                                class="btn btn-primary btn-md login-btn">@lang('resrv.confirm')</a>
                            <!--  <button class="w-btn">الغاء الحجز</button>-->
                        </div>
                        <?php }

                        if ($object[0]->status == 2) { ?>
                        <a href="{{ route('approveArrival', $object[0]->event_id) }}"
                            class="btn btn-primary btn-md login-btn {{ $interval->days > 0 && $object[0]->start_time < $now_time ? 'isDisabled' : '' }}">@lang('resrv.confirm3')
                        </a>
                        <?php }
                        if ($object[0]->status != 5) {
                        if ($object[0]->status == 0) { ?>
                        <br />
                        <div class="btns">
                            <a href="{{ route('neglectReservation', $object[0]->event_id) }}"
                                class="btn btn-danger btn-md login-btn">@lang('resrv.cancle1') </a>
                        </div>
                        <?php } else { ?>

                        <br />
                        <div class="btns">
                            <a href="{{ route('neglectReservation', $object[0]->event_id) }}"
                                class="btn btn-danger btn-md login-btn">@lang('resrv.cancle') </a>
                        </div>
                        <?php }
                        }
                        ?>
                    @endif
                    @if (isset(Auth::guard('client')->user()->id))
                        <?php
                        if ($object[0]->status == 1) { ?>

                        <div class="btns">
                            <a href="{{ route('accepetArr', $object[0]->event_id) }}"
                                class="navBtn {{ $interval->days > 1 ? 'isDisabled' : '' }}">@lang('resrv.confirm2')</a>


                            <!--  <button class="w-btn">الغاء الحجز</button>-->
                        </div>
                        <?php }
                        if ($object[0]->status != 4) { ?>


                        <br />
                        <div class="btns">
                            <a href="{{ route('neglectArr', $object[0]->event_id) }}"
                                class="btn btn-danger btn-md login-btn">@lang('resrv.cancle')
                            </a>
                        </div>
                        <?php }
                        ?>
                        <!-- <div class="btns">
                                                                                                                                                                      <a href="{{ route('messages.create') }}" class="navBtn">ارسال رسالة </a>

                                                                                                                                                                    </div>
                                                                                                                                                          -->

                    @endif
                @endif

            </div>
        </div>
    </section>








@endsection
