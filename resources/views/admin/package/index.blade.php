 @extends('layouts.backend.app')
@section('title','Streamit | Package List')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Package Lists</h4>
	            </div>
	            <div class="iq-card-header-toolbar d-flex align-items-center">
	               <a href="{{ route('package.add') }}" class="btn btn-primary">Add Package</a>
	            </div>
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th >No</th>
	                        <th >Name</th>
	                        <th >Title</th>
	                        <th >price</th>
	                        <th >Duration</th>
	                        <th width="20%">Description</th>
	                        <th >Action</th>
	                    
	                  </thead>
	                  <tbody>
	                    @foreach ($packages as $package)
	                     <tr class="hide_item{{$package->id}}">
	                        <td>{{$loop->index+1}}</td>
	                        <td>{{$package->name}}</td>
	                        <td>{{$package->title}}</td>
	                        <td>{{$package->price}} ৳</td>
	                        <td>{{$package->duration}} days</td>
	                        <td><p class="texy-justify">{!!$package->description!!}<p></td>
	                        <td>
	                           <div class="flex align-items-center list-user-action">
	                             
	                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Edit" href="{{ route('package.edit',$package->id) }}"><i class="ri-pencil-line"></i></a>
	                              <a class="iq-bg-primary delete_item" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Delete" href="javascript:;" package_id="{{$package->id}}" data-action="{{ route('package.delete') }}"><i
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
				let package_id=$(this).attr('package_id');
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
				          data:{package_id:package_id},
				          success:function(response){
				            var data=JSON.parse(response);
				             toastr.success(data.message);
				           	$('.hide_item'+package_id).hide();
				          }

				       });
				
				  } 
				});
			})

		});
	</script>


@endsection