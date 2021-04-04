@extends('layouts.backend.app')
@section('title','Streamit | Video List')
@section('content')
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
               <h4 class="card-title">Movie and TV Show Lists</h4>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
               <a href="{{ route('video.add') }}" class="btn btn-primary">Add movie</a>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="table-view">
               <table class="data-tables table movie_table " style="width:100%">
                  <thead>
                     <tr>
                        <th>Movie</th>
                        <th>Quality</th>
                        <th>Category</th>
                        <th>Release Year</th>
                        <th>Language</th>
                        
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach ($videos as $item)

                     <tr class="hide_item{{$item->id}}">
                        <td>
                           <div class="media align-items-center">
                              <div class="iq-movie">
                                 <a href="{{ route('video.detail.show',$item->id) }}">
                                  <img src="{{ asset('assets/backend/video/store/thumbnail/small/'.$item->thumbnail) }}"
                                       class="img-border-radius avatar-40 img-fluid" alt=""></a>
                              </div>
                              <div class="media-body text-white text-left ml-3">
                                 <p class="mb-0">{{$item->name}}</p>
                                 <small>{{$item->duration}}</small>
                              </div>
                           </div>
                        </td>
                        <td>{{$item->quality}}</td>
                        <td>{{$item->category->category_name}}</td>
                        <td>{{$item->release_year}}</td>
                        <td>{{$item->language->language_name}}</td>
                        
                        <td >
                           <div class="flex align-items-center list-user-action">
                              <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="View" href="{{ route('video.detail.show',$item->id) }}"><i class="lar la-eye"></i></a>
                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="Edit Media Info" href="{{ route('video.media_edit',$item->id) }}"><i class="ri-pencil-line"></i></a>
                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="Edit Basic Info" href="{{ route('video.basic_edit',$item->id) }}"><i class="ri-pencil-line"></i></a>
                              <a class="iq-bg-primary delete_item" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="Delete" href="javascript:;" video_id="{{$item->id}}" data-action="{{ route('video.delete') }}"><i
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
@section('admin_css')
<style>
   

</style>
@endsection

@section('admin_js')

<script>
      $(document).ready(function(){
         $('body').on('click','.delete_item',function(){
            let video_id=$(this).attr('video_id');
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
                      data:{video_id:video_id},
                      success:function(response){
                        var data=JSON.parse(response);
                         toastr.success(data.message);
                        $('.hide_item'+video_id).hide();
                      }

                   });
            
              } 
            });
         })

      });
   </script>


@endsection
