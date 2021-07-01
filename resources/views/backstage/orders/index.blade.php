@extends('layouts.app')

@section('title','Orders')

@section('content')



<?php 



if(isset($_GET['from']))
{
  $from=$_GET['from'];  
}
else
{
    $from="yyyy/mm/dd";  
}

if(isset($_GET['to']))
{
  $to=$_GET['to'];  
}
else
{
    $to="yyyy/mm/dd";  
}

?>






    @if(isset($objects))
    
    

        <div class="container">

            <div class="row">
                
                

                <div class="col-md-12">
 
                    <div class="card">
                        
                        

                        <div class="card-header">

                            <div class="heading-elements">
                              
                                 <div>Reservations</div>
                                   
                            </div>
                            <br>
                            
                            

                        </div>

                        <div class="card-content collapse show">
                            
                              <form action="{{url('home/orders/search/')}}" method="get">
                                  
                                  
                                        
                                        <div style="margin-left:25%;margin-top:2%">
                                        <span>From:  <input type="date"  id="from" value="{{$from}}" name="from" required></span>
                            
                          
                                
                     <span>To:  <input type="date" id="to" value="{{$to}}"  name="to" required></span>
                                            
                                            
                                            <button type="submit">Search</button></div>
                                            
                               
                                    </form>

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">
                                    
                                    

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">
                                        
                                             
                                   
                                          
                                        <thead>

                                        <tr>

<th>#</th>
<th>Hospital ID</th>
<th>Patient</th>
<th>Mobile</th>
<!--  <th>Follower Mobile</th>-->
<th> Dentist </th>
<th>Treatment</th>
<th>Treatment Plan</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Photo?</th>
<th> Created </th>
<th>Details</th>                                        </tr>

                                        </thead>

<tbody>
    
   

@if(($objects))


    @foreach($objects as $i=>$object)
         
        <tr>

            <td>{{$object->id}}</td>
            <td> #{{ $object->hospital_id }}#</td>
            <td>
                @if(!empty($user[$i]->name))
                  {{ $user[$i]->name }}
                @endif
                @if($object->follower_id !="")
                <b color="red">
                     (تابع) </b>
                @endif
                </td>
                <td>
                @if(!empty($user[$i]->mobile))
                  {{ $user[$i]->mobile }}
                @endif
                 
                @if(!empty($user[$i]->user_id))
                  {{ $user[$i]->user->mobile }}
                @endif
                </td>

                <td> @if(!empty($dentist[$i]->name))
                  {{ $dentist[$i]->name }}
                @endif</td>

                <td>{{ $treatments[$i]->service_name_ar }}</td>
                
                 <td>{{$object->treatment}}</td>

            <td>
                {{$object->event_date}}
            </td>

            <td>
                {{date("g:ia", strtotime($object->start_time))}}
              
            </td>
            <td>
            @if($object->status=="0")
                @lang('resrv.satus0')
            @elseif($object->status=="1")
                @lang('resrv.satus1')
            @elseif($object->status=="2")
                @lang('resrv.satus2')
            @elseif($object->status=="3")
                @lang('resrv.satus3')
            @elseif($object->status=="4")
                @lang('resrv.satus4')
            @elseif($object->status=="5")
                @lang('resrv.satus5')
           @elseif($object->status=="6")
                @lang('resrv.satus6')
           @elseif($object->status=="7")
                @lang('resrv.satus7')
           @elseif($object->status=="8")
                @lang('resrv.satus8')
                 
            @endif
            </td>
            
            <td>
        @if($object->photo=="")
        <span style="color:red" ><b>No </b></span>
        @else
        <span >Yes</span>
        @endif
                
            </td>
            <td>
            {{ $object->created_at }}
            </td>
             
            <td>
               
                
             <a href="{{url('home/orders/edit/'.$object->id )}}">Edit</a> 
            </td>
            
           

        </tr>


    @endforeach

@else

    <tr>

        <td colspan="7">لا يوجد مواعيد محجوزة</td>

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



    @endif



@endsection
