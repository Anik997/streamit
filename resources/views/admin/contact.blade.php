 @extends('layouts.backend.app')
@section('title','Streamit | Contact List')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Contact Lists</h4>
	            </div>
	           
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th >No</th>
	                        <th >Name</th>
	                        <th >E-email</th>
	                        <th width="80%">Message</th>
	                       
	                    
	                  </thead>
	                  <tbody>
	                    @foreach ($contacts as $contact)
	                     <tr class="hide_item">
	                        <td>{{$loop->index+1}}</td>
	                        <td>{{$contact->name}}</td>
	                        <td>{{$contact->email}}</td>
	                        <td>
	                        	<span style="text-align: justify;">{!! $contact->message !!}</span>
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