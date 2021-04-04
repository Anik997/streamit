@extends('layouts.backend.app')
@section('title','Steamit | Manage Slider')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Slider Lists</h4>
	            </div>
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th style="width:10%;">No</th>
	                        <th style="width:20%;">Image</th>
	                        <th style="width:20%;">Type</th>
	                        <th style="width:20%;">Action</th>
	                     </tr>
	                  </thead>
	                  <tbody>
	                    @foreach ($sliders as $slider)
	                     <tr class="hide_item{{$slider->id}}">
	                        <td>{{$loop->index+1}}</td>
	                        <td><img src="{{ asset('assets/backend/slider/'.$slider->slider_image) }}" style="width: 400px;height: 100px"></td>
	                        <td>
	                        	@if ($slider->type==1)
	                        		<span>For Home Page</span>
	                        	@else
	                        	<span>For Movie Or TV Show Page</span>
	                        	@endif
	                        </td>
	               
	                        <td>
	                           <div class="flex align-items-center list-user-action">
	                           
	                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Edit" href="{{ route('slider.edit',$slider->id) }}"><i class="ri-pencil-line"></i></a>
	                              <a class="iq-bg-primary delete_item" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Delete" href="javascript:;" data-action="{{ route('slider.delete') }}" slider_id="{{$slider->id}}"><i
	                                    class="ri-delete-bin-line"></i></a>
	                           </div>
	                        </td>
	                     </tr>
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
			$('body').on('click','.delete_item',function(){
				let slider_id=$(this).attr('slider_id');
				swal({
				  title: "Do you want to delete?",
				  icon: "info",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	  
				       $.ajax({
				          url:$(this).attr('data-action'),
				          method:'post',
				          data:{slider_id:slider_id},
				          success:function(response){
				            var data=JSON.parse(response);
				             toastr.success(data.message);
				           	$('.hide_item'+slider_id).hide();
				          }

				       });
				
				  } 
				});
			})

		});
	</script>
</script>

@endsection