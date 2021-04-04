@extends('layouts.backend.app')
@section('title','Streamit | Edit Basic Info')
@section('content')
<div style="display: none" id="alert_section"> 
 
</div>
<div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Edit Basic Info</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form data-action="{{ route('update.basic_info') }}" id="basic_info_update" method="post">
                          <input type="hidden" name="id" value="{{$item->id}}">
                          @csrf
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="row">
                                    <div class="col-12 form-group">
                                       <input type="text" class="form-control"  value="{{$item->title}}" name="title" required>
                                      
                                    </div>

                                    <div class="col-12 form-group">
                                       <input type="text" class="form-control"  value="{{$item->name}}" name="name" required>
                                      
                                    </div>

                                    <div class="col-md-6 form-group">
                                       <select class="form-control" id="" name="category_id" required>
                                          <option value="">Video Category</option>
                                          @php
                                             $categories=App\Models\admin\Category::latest()->get();
                                          @endphp
                                          @foreach ($categories as $category)
                                             <option {{($item->category_id==$category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                          @endforeach
                                         
                                       </select>
                                      
                                    </div>
                                   <div class="col-md-6 form-group">
                                       <select class="form-control " name="type" required>
                                          <option value="">Market Type</option>
                                          <option {{($item->type=="Regular") ? 'selected' : ''}} value="Regular">Regular</option>
                                          <option  {{($item->type=="Trending") ? 'selected' : ''}} value="Trending">Trending</option>
                                          <option {{($item->type=="Upcoming") ? 'selected' : ''}} value="Upcoming">Upcoming</option>
                                        
                                       </select>
                                      
                                    </div>

                                       <div class="col-md-6 form-group">
                                       <select class="form-control" id="" name="vedio_type" required>
                                          <option value="">Video Type</option>
                                          <option {{($item->vedio_type=="Movies") ? 'selected' : ''}} value="Movies">Movies </option>
                                          <option {{($item->vedio_type=="TV Shows") ? 'selected' : ''}} value="TV Shows">TV Shows</option>
                                        
                                       </select>
                                       
                                    </div>
                                    <div class="col-sm-6 form-group">
                                       <select class="form-control" name="quality" required>
                                          <option value="">Choose quality</option>
                                           <option {{($item->quality=="Standard") ? 'selected' : ''}} value="Standard">Standard </option>
                                          <option {{($item->quality=="Full HD") ? 'selected' : ''}} value="Full HD">FULL HD</option>
                                          <option {{($item->quality=="HD") ? 'selected' : ''}} value="HD">HD</option>
                                          <option {{($item->quality=="Quad HD") ? 'selected' : ''}} value="Quad HD">Quad HD</option>
                                       </select>
                                      
                                    </div>
                                    <div class="col-sm-6 form-group">
                                       <input type="text" class="form-control" value="{{$item->release_year}}" name="release_year" required>
                                     
                                    </div>
                                    <div class="col-sm-6 form-group">
                                       <select class="form-control" name="language_id" required>
                                          <option value="">Choose Language</option>
                                          @php 
                                             $languages=App\Models\admin\Language::latest()->get();
                                          @endphp
                                          @foreach ($languages as $language)
                                          <option {{($item->language_id==$language->id) ? 'selected' : ''}} value="{{$language->id}}">{{$language->language_name}}</option>
                                            @endforeach
                                       </select>
                                     
                                    </div>
                                    <div class="col-12 form-group">
                                       <textarea id="text" name="description" rows="5" class="form-control"
                                           required="">{!!$item->description!!}</textarea>
                                         
                                    </div>
                                 </div>
                              </div>

                           
                           </div>
                           <div class="row">

                              <div class="col-sm-12 form-group">
                                 <input type="text" class="form-control" value="{{$item->video_link}}" name="video_link">
                              </div>
                              <div class="col-12 form-group ">
                                 <button type="submit" class="btn btn-primary" id="upload_video_button">Update</button>

                                <a href="javascript:history.back();" class="btn btn-danger">Back</a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
        
	
@endsection

@section('admin_js')

   <script>
     

     $(document).on('submit', '#basic_info_update', function(e){

        e.preventDefault();

      let formDta = new FormData(this);
      $('#upload_video_button').text("Updating...").prop('disabled',true);
      $.ajax({
        url: $(this).attr('data-action'),
       
        method: "POST",
        data: formDta,
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
          let data=JSON.parse(response);
          if (data.status===200) {
            $('#alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
          }else{
            $('#alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
          }
        
         
          $('#upload_video_button').text("Upload").prop('disabled',false);
         
        },
        error:function(response){
          console.log(response);

          $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['name'][0]+'</div>').show();
          $('#upload_video_button').text("Upload").prop('disabled',false);
          
        }
      });
     });

   </script>
@endsection
