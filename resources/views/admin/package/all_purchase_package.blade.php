@extends('layouts.backend.app')
@section('title','Streamit | Purchase Package')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Package Lists</h4>
	            </div>
	           
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th >No</th>
	                        <th>Start Date</th>
	                        <th >Expire Date</th>
	                        <th>Remain Time</th>
	                        <th>Extra Time</th>
	                        <th >Status</th>
	                        <th >Action</th>
	                    
	                  </thead>
	                  <tbody>
	                    @foreach ($purchases as $purchase)

	                     <tr>
	                        <td>{{$loop->index+1}}</td>
	                        <td>
	                        	@if (!is_null($purchase->start_date))
	                        		<span>{{$purchase->start_date}}</span>
	                        		@else
	                        		<span>Not Available</span>
	                        	@endif
	                        </td>
	                        <td>
	                        	@if (!is_null($purchase->expire_date))
	                        		<span>{{$purchase->expire_date}}</span>
	                        		@else
	                        		<span>Not Available</span>
	                        	@endif
	                        </td>
	                        <td>
	                        	@if (!is_null($purchase->start_date) && !is_null($purchase->expire_date))
	                        		
		                    	@php
		                    		 $expire_date=strtotime($purchase->expire_date);
		                    		 $start_date=strtotime($purchase->start_date);

		                    		 $difference = $expire_date - time();
		                    		 $remain_time=date('m : d : H : i : s',$difference);

	                        	@endphp
	                        	@if (time() > $expire_date)
	                        		<span>Time is expired</span>
	                        		@else
	                        		<span>{{$remain_time}}</span>
	                        	@endif
	                        	@else
	                        	<span>Not Available</span>
	                        @endif
	                        	
	                        </td>
	                        <td>{{$purchase->remain_time !=null  ? $purchase->remain_time : '0'}} days</td>
	                        
	                        <td>
	                        	<select class="form-control change_purchase_package" purchase_id="{{$purchase->id}}" data-action="{{route('change.package.status') }}">
	                        		<option value="{{$purchase->id}}" {{($purchase->package_active)==1 ?'selected' : ''}}>Not Started</option>
	                        		<option value="{{$purchase->id}}" {{($purchase->package_active)==2 ?'selected' : ''}}>Started</option>
	                        	</select>
	                        	<div id="status_wait{{$purchase->id}}"></div>
	                        </td>
	                        <td>
	                           <div class="flex align-items-center list-user-action">
	                              <a class="iq-bg-warning" type="button" data-toggle="modal" data-placement="top" title=""
	                                 data-original-title="View Detail" href="#" data-target="#exampleModalScrollable{{$purchase->id}}"><i class="lar la-eye"></i></a>
	                             
	                              <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Delete" href="#"><i
	                                    class="ri-delete-bin-line"></i></a>
	                           </div>
	                        </td>
	                     </tr>
	                    
	                    <div class="iq-card-body">
	                       <div class="modal fade" id="exampleModalScrollable{{$purchase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	                          <div class="modal-dialog modal-dialog-scrollable" role="document">
	                             <div class="modal-content">
	                                <div class="modal-header">
	                                   <h5 class="modal-title" id="exampleModalScrollableTitle">Details Of Purchase</h5>
	                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                      <span aria-hidden="true">&times;</span>
	                                   </button>
	                                </div>
	                                <div class="modal-body">
	                                  <div class="iq-card">
	                                     <div class="iq-card-body">
	                                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
	                                           <li class="nav-item">
	                                              <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill" href="#pills-home-fill{{$purchase->id}}" role="tab" aria-controls="pills-home" aria-selected="true">Package Details</a>
	                                           </li>
	                                           <li class="nav-item">
	                                              <a class="nav-link" id="pills-profile-tab-fill" data-toggle="pill" href="#pills-profile-fill{{$purchase->id}}" role="tab" aria-controls="pills-profile" aria-selected="false">Customer Details</a>
	                                           </li>
	                                        </ul>
	                                        <div class="tab-content" id="pills-tabContent-1">
	                                           <div class="tab-pane fade show active" id="pills-home-fill{{$purchase->id}}" role="tabpanel" aria-labelledby="pills-home-tab-fill">
	                                              <div class="iq-card">
	                                                 <div class="iq-card-body">
	                                                    <ul class="list-group">
	                                                       <li class="list-group-item"><span>Package Name</span> <span style="float: right;">{{$purchase->package->name}}</span></li>
	                                                       <li class="list-group-item">
	                                                       	   <span>Package title</span> <span style="float: right;">{{$purchase->package->title}}</span>
	                                                       </li>
	                                                       <li class="list-group-item">
	                                                       	   <span>Package price</span> <span style="float: right;">{{$purchase->package->price}} ৳</span>
	                                                       </li>
	                                                       <li class="list-group-item">
	                                                       	   <span>Package duration</span> <span style="float: right;">{{$purchase->package->duration}} Days</span>
	                                                       </li>

	                                                          <li class="list-group-item">
	                                                          	  <p style="text-align: justify;">{!!$purchase->package->description!!}</p>
	                                                          </li>
	                                                       </ul>
	                                                    </ul>
	                                                 </div>
	                                              </div>
	                                           </div>
	                                           <div class="tab-pane fade" id="pills-profile-fill{{$purchase->id}}" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
	                                             <div class="iq-card">
	                                                <div class="iq-card-body">
	                                                   <ul class="list-group">
	                                                      <li class="list-group-item">
	                                                       	   <span>User Name</span> <span style="float: right;">{{$purchase->user->name}}</span>
	                                                       </li>
	                                                        <li class="list-group-item">
	                                                       	   <span>User Phone</span> <span style="float: right;">{{$purchase->user->phone}}</span>
	                                                       </li>
	                                                        <li class="list-group-item">
	                                                       	   <span>User Address</span> <span style="float: right;">{{$purchase->user->address}}</span>
	                                                       </li>

	                                                        <li class="list-group-item">
	                                                       	   <span>Payment Name</span> <span style="float: right;">{{$purchase->payment_name}}</span>
	                                                       </li>
	                                                        <li class="list-group-item">
	                                                       	   <span>Amount</span> <span style="float: right;">{{$purchase->package->price}} ৳</span>
	                                                       </li>


	                                                        <li class="list-group-item">
	                                                       	   <span>Transaction Number</span> <span style="float: right;">{{$purchase->transaction_number}}</span>
	                                                       </li>

	                                                        <li class="list-group-item">
	                                                       	   <span>Payment From</span> <span style="float: right;">{{$purchase->payment_from}}</span>
	                                                       </li>
	                                                   </ul>
	                                                </div>
	                                             </div>
	                                           </div>
	                                        </div>
	                                     </div>
	                                  </div>
	                                </div>
	                                <div class="modal-footer">
	                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                                </div>
	                             </div>
	                          </div>
	                       </div>
	                    </div>
	                   @endforeach
	                  </tbody>
	               </table>
	            </div>
	         </div>
	      </div>
	   </div>
	</div>
	
@endsection

@section('admin_js')

<script>
	$(document).ready(function(){
		$('body').on('change','.change_purchase_package',function(){
			let purchase_id=$(this).attr('purchase_id');
			swal({
			  title: "Do you change package status?",
			  icon: "info",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	  $('#status_wait'+purchase_id).append('Please Wait...');
			       $.ajax({
			          url:$(this).attr('data-action'),
			          method:'post',
			          data:{purchase_id:purchase_id},
			          success:function(response){
			            var data=JSON.parse(response);
			             toastr.success(data.message);
			            $(".movie_table").load(location.href + " .movie_table");
			          }

			       });
			        $('#status_wait'+purchase_id).append('');
			  } 
			});
		})

	});
</script>

@endsection