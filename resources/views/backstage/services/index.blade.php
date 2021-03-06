@extends('layouts.app')

@section('title','services')

@section('content')

    

    @if(isset($objects))

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">

                              <a href="{{route('addservice')}}" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add new</a>



                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table class="table table-bordered table-striped">

                                        <thead>

                                        <tr>

                                            <th>#</th>

                                           

                                            <th>Service Name arabic</th>
                                            <th>Service Name English</th>

                                          
                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                          @if(($objects))



                                         



                                          @foreach($objects as $object)
 
                                          <tr>

                                          <td>{{$object->sort}}</td>

                                         

                                          <td>{{$object->service_name_ar}}</td>

                                          <td>{{$object->service_name_en}}</td>

                                          <td><div class="container">

                                              <div class="row">

                                                      @foreach(Auth::user()->permission as $per)

                                                      @if($per->per_name == 'editservice')



                                          <a href="{{route('editservice', $object->id)}}" class="btn btn-icon btn-pure info"><i class="ft-settings"></i>Edit</a>

                                                  @endif @endforeach

                                                  @foreach(Auth::user()->permission as $per)



                                                  @if($per->per_name == 'deleteservice')



                                                        <form action="{{route('deleteservice', $object->id)}}" method="post">

                                                            {{csrf_field()}}

                                                            {{method_field('DELETE')}}

                                                            <button class="btn btn-icon btn-pure danger" type="submit" onclick="return confirm('?????? ?????? ?????? ?????? ????????. ???? ?????? ?????????? ??!');"><i class="ft-trash-2"></i>Delete</button>

                                                        </form>

                                                        @endif @endforeach

                                                  </div>



                                          </div></td>

                                      </tr>



                                     

                                      @endforeach

                                      @else

                                          <tr>

                                              <td colspan="7">No service found</td>

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