@extends('layouts.frontend.app')
@section('title','Streamit | Contact Us Page')
@section('slider_section') 
 @include('layouts.frontend.inc.slider')
@endsection
@section('main')
<div style="padding-top: 50px">
      <section id="iq-favorites">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                 
                  <div class="favorites-contens">
                     <div class="container">
                        <div class="row justify-content-center align-items-center height-self-center">
                           <div class="col-lg-8 col-md-12 col-sm-12 align-self-center">
                              <div class="sign-user_card ">                    
                                 <div class="sign-in-page-data">
                                    @include('pages.helper.error_success_message')
                                    <div class="sign-in-from w-100 m-auto">
                                       <h3 class="mb-3 text-center">Contact Us</h3>
                                       <form class="mt-4" action="{{ route('contact.store') }}" method="post">
                                          @csrf
                                        
                                          <div class="form-group">                                 
                                             <input type="text" class="form-control mb-0 @error('name') is-invalid @enderror"  placeholder="Name" name="name" value="{{old('name')}}">
                                             @error('name')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                          </div>

                                           <div class="form-group">                                 
                                             <input type="text" class="form-control mb-0 @error('email') is-invalid @enderror"  placeholder="E-mail" name="email" value="{{old('email')}}">
                                             @error('email')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                          </div>

                                          <div class="form-group">                                 
                                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" cols="20" rows="2" placeholder="Message"></textarea>
                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                          </div>

                                             <div class="sign-info">
                                                <button type="submit" class="btn btn-hover">Submit</button>                              
                                             </div>                                       
                                       </form>
                                    </div>
                                 </div>
                                
                              </div>
                              <br><br>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
    </div>
@endsection