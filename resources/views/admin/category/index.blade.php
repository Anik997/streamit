@extends('layouts.backend.app')
@section('title','Streamit | Category List')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Category Lists</h4>
	            </div>
	            <div class="iq-card-header-toolbar d-flex align-items-center">
	               <a href="{{ route('category.add') }}" class="btn btn-primary">Add Category</a>
	            </div>
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th style="width:10%;">No</th>
	                        <th style="width:20%;">Name</th>
	                        <th style="width:40%;">Description</th>
	                        <th style="width:10%;">Videos</th>
	                        <th style="width:20%;">Action</th>
	                     </tr>
	                  </thead>
	                  <tbody>
	                    @foreach ($categories as $category)
	                     <tr class="hide_item{{$category->id}}">
	                        <td>{{$loop->index+1}}</td>
	                        <td>{{$category->category_name}}</td>
	                        <td>
	                           <p>{{$category->description}}</p>
	                        </td>
	                        <td>{{count($category->video)}}</td>
	                        <td >
	                           <div class="flex align-items-center list-user-action">
	                              
	                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Edit" href="{{ route('category.edit',$category->id) }}"><i class="ri-pencil-line"></i></a>
	                              <a class="iq-bg-primary delete_item" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Delete" href="javascript:;" data-action="{{ route('category.delete') }}"  category_id="{{$category->id}}"><i
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
				let category_id=$(this).attr('category_id');
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
				          data:{category_id:category_id},
				          success:function(response){
				            var data=JSON.parse(response);
				             toastr.success(data.message);
				           	$('.hide_item'+category_id).hide();
				          }

				       });
				
				  } 
				});
			})

		});
	</script>
</script>

@endsection