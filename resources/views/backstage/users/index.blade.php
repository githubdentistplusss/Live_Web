@extends('layouts.app')

@section('title','Users')

@section('content')

   
    @if(isset($objects))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">

                              <a href="{{route('adduser')}}" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>



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

                                            

                                            <th>Email</th>

                                            <th>Mobile</th>

                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                          @if(count($objects))



                                          <?php

                                          $_page = (!empty($_GET['page']))?$_GET['page']:1;

                                          $counter = intval($_per_page * intval($_page - 1)) + 1;

                                          ?>



                                          @foreach($objects as $object)

                                              @if($object->admin != 2)

                                                  <tr>

                                                  <td>{{$counter}}</td>

                                                  <td>{{$object->name . " " . $object->last_name}}</td>

                                                  

                                                  <td>{{$object->email}}</td>

                                                  <td>{{$object->mobile}}</td>

                                                  <td><div class="container">

                                                      <div class="row">



                                                              @foreach(Auth::user()->permission as $per)



                                                              @if($per->per_name == 'edituser')



                                                          <a href="{{route('edituser', $object->id)}}" class="btn btn-icon btn-pure info">Edit</a>

                                                          @endif @endforeach

                                                          @foreach(Auth::user()->permission as $per)



                                                          @if($per->per_name == 'deleteuser')



                                                                <form action="{{route('deleteuser', $object->id)}}" method="post">

                                                                    {{csrf_field()}}

                                                                    {{method_field('DELETE')}}

                                                                    @if($object->admin == 1)

                                                                    <button class="btn btn-icon btn-pure danger" type="submit"  onclick=" alert('لا يمكن حذف مدير'); return false;"><i class="ft-trash-2"></i>delete</button>

                                                                    @else

                                                                    <button class="btn btn-icon btn-pure danger" type="submit"  onclick="return confirm('انت على وشك الحذف');"><i class="ft-trash-2"></i>delete</button>



                                                                    @endif

                                                                </form>

                                                                @endif @endforeach

                                                          </div>



                                                  </div></td>

                                              </tr>

                                              @endif

                                                    <?php $counter++; ?>

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

                              
                                </div-->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

















        </div>



    @endif



@endsection