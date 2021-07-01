@extends('layouts.app')



    @section('title','Send Notification')

@section('title','Edit Dentist')

@section('content')

     
        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">


                            <div class="card-body">

                                <form enctype="multipart/form-data" id="page_forme" action="{{route('notifyAction')}}"
                                      class="form ls_form validate_form" method="post">

                                    {{ csrf_field() }}


                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Send Notifications</h4>

                                
                                        <div class="form-group col-md-8">

                                            <label for="title">

                                                title 

                                            </label>
                                            <input type="text" id="title" class="form-control"
                                                   name="title" required value="">

                                        </div>
                                    <div class="form-group col-md-8">

                                            <label for="message">

                                                message

                                            </label>

                                            <textarea  id="message" class="form-control"
                                                   name="message" required value="" autofocus></textarea>

                                        </div>
                                        
                                        <div class="form-group col-md-8 row text-center">
                                            <div class="col-md-3">
                                                   <input class="form-check-input " type="radio" name="notify" id="exampleRadios1" value="0" checked>
                                                         <label class="form-check-label" for="exampleRadios1">
                                                                   Patient
                                                          </label>
                                              </div>
                                                   <div class="col-md-3">
                                                   <input class="form-check-input " type="radio" name="notify" id="exampleRadios2" value="1">
                                                         <label class="form-check-label" for="exampleRadios2">
                                                                   Dentist
                                                          </label>
                                                    </div>

                                        </div>
                                    
                                    </div>


                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1"><i
                                                    class="la la-check-square-o"></i>

                                            Send
                                        </button>

                                       </div>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

           

        </div>











@endsection