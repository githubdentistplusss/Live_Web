@extends('layouts.app')

@section('title','Orders')

@section('content')

    

    @if(isset($objects))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">
<!--
                              <a href="{{route('addoffer')}}" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>
-->Upcoming  Orders


                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">

                                        <thead>

                                        <tr>

                                            <th>#</th>

                                           

                                            <th>Date</th>
                                            <!--<th>Time</th>-->
                                            <th>Status</th>
                                            <th>Treatment</th>
                                            <th>User</th>
                                            <th>Details</th>

                                          

                                          <!--  <th class="text-center">Actions</th>
-->
                                        </tr>

                                        </thead>

                                        <tbody>

                                          @if(($objects))



                                         



                                          @foreach($objects as $i=>$object)
 
                                          <tr>

                                          <td>{{$object->id}}</td>

                                         

                                          <td>
										{{$object->event_date}}

										  </td>
 <!--<td>-->
										<!--{{$object->start_time}} -{{$object->end_time}}-->


										  <!--</td>-->
										  <td>
                                       @if($object->status == 0)
									        Pending
									    @elseif($object->status == 1)
									    	Accepted
										 @elseif($object->status == 3)
										    Canceled
										 @elseif($object->status == 5)
                                            
									   @endif
									   </td>
<td>{{ $treatments[$i]->service_name_ar }}</td>
<td>
    @if(!empty($user[$i]->name))
                                                          {{ $user[$i]->name }}
                                                        @endif  
    </td>
<td><a href="{{url('home/orders/Showdetails/'.$object->id )}}">Details</a> </td>
                                          <!--<td><div class="container">-->

                                            <!--  <div class="row">

                                          <!--            @foreach(Auth::user()->permission as $per)-->

                                          <!--            @if($per->per_name == 'editoffer')-->



                                          <!--<a href="{{route('editoffer', $object->id)}}" class="btn btn-icon btn-pure info"><i class="ft-settings"></i>??????????</a>-->

                                          <!--        @endif @endforeach-->

                                          <!--        @foreach(Auth::user()->permission as $per)-->



                                          <!--        @if($per->per_name == 'deleteoffer')-->



                                          <!--              <form action="{{route('deleteoffer', $object->id)}}" method="post">-->

                                          <!--                  {{csrf_field()}}-->

                                          <!--                  {{method_field('DELETE')}}-->

                                          <!--                  <button class="btn btn-icon btn-pure danger" type="submit" onclick="return confirm('?????? ?????? ?????? ?????? ????????. ???? ?????? ?????????? ??!');"><i class="ft-trash-2"></i>??????</button>-->

                                          <!--              </form>-->

                                          <!--              @endif @endforeach-->

                                          <!--        </div>-->-->



                                          <!--</div></td>-->

                                      </tr>



                                     

                                      @endforeach

                                      @else

                                          <tr>

                                              <td colspan="7">???? ???????? ????????????????</td>

                                          </tr>

                                      @endif

                                    </tbody>



                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->

                                 {{ $objects->links() }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>



    @endif



@endsection