@extends('layouts.app')

@section('title','Dentists')

@section('content')


    @if(isset($objects))

        <div class="container">

            <div class="row">


                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">

                              <a href="{{route('adddentist')}}" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>



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

                                            <th>Name</th>



                                         <!--   <th>Email</th> -->
                                            <th>Code</th>

                                            <th>Mobile</th>
                                            <th>Hospital</th>
                                            <th>Card?</th>


                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                          @if(count($objects))

                                          @foreach($objects as $object)

                                              @if($object->admin != 2)

                                                  <tr>

                                                  <td>{{$object->id}}</td>

                                                  <td>{{$object->name . " " . $object->last_name}}</td>



                                          <!-- <td>{{$object->email}}</td>-->
                                                  <td>{{$object->code}}</td>
                                                  <td>{{$object->mobile}}</td>
                                                
                                                      <td>{{$object->related_hospital['hospital_name_ar']}}</td>
                                                      <td>{{$object->related_hospital['hospital_name_ar']}}</td>
                                                <td> 
                                                 @if($object->photo=="" || $object->photo=="default.png")
                                                <span style="color:red" ><b>No              </b></span>
                                                @else
                                                <span >Yes</span>
                                                @endif
                                                </td>

                                                  <td><div class="container">

                                                      <div class="row">



                                                              @foreach(Auth::user()->permission as $per)



                                                              @if($per->per_name == 'edituser')



                                                          <a href="{{route('editdentist', $object->id)}}" class="btn btn-icon btn-pure info">تعديل</a>

                                                          @endif @endforeach

                                                          @foreach(Auth::user()->permission as $per)



                                                          @if($per->per_name == 'deletedentist')



                                                                <form action="{{route('deletedentist', $object->id)}}" method="post">

                                                                    {{csrf_field()}}

                                                                    {{method_field('DELETE')}}



                                                                    <button class="btn btn-icon btn-pure danger" type="submit"  onclick="return confirm('انت على وشك الحذف');"><i class="ft-trash-2"></i>حذف</button>





                                                                </form>

                                                                @endif @endforeach

                                                          </div>



                                                  </div></td>

                                              </tr>

                                              @endif


                                          @endforeach

                                      @else

                                          <tr>

                                              <td colspan="7">لا يوجد اعضاء</td>

                                          </tr>

                                      @endif

                                    </tbody>



                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

















        </div>



    @endif



@endsection
