@extends('views.client.client')

@section('innercontent')



    <div class="card">
        <div class="card-body pt-0">
            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientDashboard') }}">@lang('resrv.follower')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('UAReservation') }}">@lang('resrv.uADate')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookedoffers') }}"><span
                                class="med-records">@lang('resrv.uDate')</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('prevReservation') }}">@lang('resrv.pDate')</a>
                    </li>
                </ul>
            </nav>
            <!-- /Tab Menu -->
            <!-- Tab Content -->
            <div class="tab-content pt-0">
                <div class="card card-table mb-4 pb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                         <th>رقم الموعد</th>
                                        <th>@lang('resrv.doctor')</th>
                                        <th>@lang('resrv.appointment_date')</th>
                                        <th>@lang('resrv.patient')</th>
                                        <th>@lang('resrv.treatment')</th>
                                        <th>@lang('resrv.satus')</th>
                                        <th style="">@lang('resrv.action')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    @if (count($events) != 0)
                                        @foreach ($events as $i => $event)
                                            <?php
                                            $day = date('d', strtotime($event->event_date));
                                            $month = date('M', strtotime($event->event_date));
                                            $dayName = date('l', strtotime($event->event_date));
                                            $am = date('A', strtotime($event->start_time));
                                            $start_time = date('g', strtotime($event->start_time));
                                            ?>
                                            <tr>
                                                <td>
                                                     #{{$event->id}}
                                                     </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="#">{{ isset($dentist[$i]->name) ? $dentist[$i]->name : '' }}
                                                            <span></span></a>
                                                    </h2>
                                                </td>
                                                <td>{{ $dayName }} {{ $day }} {{ $month }} <span
                                                        class="d-block text-info">{{ $start_time }}
                                                        {{ $am }}</span>
                                                </td>
                                                </td>
                                                <td>{{ isset($user[$i]->name) ? $user[$i]->name : '' }}
                                                    
                                                </td>
                                                <td>{{ $treatments[$i]->service_name_ar }}</td>
                                                <td>
                                                    @if ($event->status == 0)
                                                        <span
                                                            class="badge badge-pill bg-warning-light">@lang('resrv.satus1')</span>

                                                    @elseif($event->status == 1)
                                                        <span
                                                            class="badge badge-pill bg-success-light">@lang('resrv.satus2')</span>

                                                    @elseif($event->status == 2)
                                                        <span
                                                            class="badge badge-pill bg-danger-light">@lang('resrv.satus4')</span>

                                                    @elseif($event->status == 3)
                                                        <span
                                                            class="badge badge-pill bg-danger-light">@lang('resrv.satus3')</span>

                                                    @elseif($event->status == 4)
                                                        <span
                                                            class="badge badge-pill bg-danger-light">@lang('resrv.satus7')</span>

                                                    @elseif($event->status == 5)
                                                        <span
                                                            class="badge badge-pill bg-danger-light">@lang('resrv.satus6')</span>

                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action row">
                                                        <a href={{ url('/details/' . $event->id) }}
                                                            class="btn btn-sm bg-info-light">
                                                            <i class="far fa-eye"></i> @lang('resrv.view')
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                <div style="text-align: -webkit-center; text-align: center;">
                                                    <h2 style="color: red;">@lang('resrv.NotFound')</h2>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
