@extends('layouts.backend.app')
@section('title','Steamit | Language List')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Language Lists</h4>
	            </div>
	            <div class="iq-card-header-toolbar d-flex align-items-center">
	               <a href="{{ route('language.add') }}" class="btn btn-primary">Add Language</a>
	            </div>
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th style="width:10%;">No</th>
	                        <th style="width:20%;">Name</th>
	                        <th style="width:20%;">Video</th>
	                        <th style="width:20%;">Action</th>
	                     </tr>
	                  </thead>
	                  <tbody>
	                    @foreach ($languagees as $Language)
	                     <tr class="hide_item{{$Language->id}}">
	                        <td>{{$loop->index+1}}</td>
	                        <td>{{$Language->language_name}}</td>
	                     
	                        <td>{{count($Language->video)}}</td>
	                        <td>
	                           <div class="flex align-items-center list-user-action">
	                           
	                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Edit" href="{{ route('language.edit',$Language->id) }}"><i class="ri-pencil-line"></i></a>
	                              <a class="iq-bg-primary delete_item" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Delete" href="javascript:;" data-action="{{ route('language.delete') }}" language_id="{{$Language->id}}"><i
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
				let language_id=$(this).attr('language_id');
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
				          data:{language_id:language_id},
				          success:function(response){
				            var data=JSON.parse(response);
				             toastr.success(data.message);
				           	$('.hide_item'+language_id).hide();
				          }

				       });
				
				  } 
				});
			})

		});
	</script>
</script>

@endsection