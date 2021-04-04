@extends('layouts.frontend.app')
@section('title','Streamit | Home Page')
@section('slider_section') 
 {{-- @include('layouts.frontend.inc.slider') --}}
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
                           <div class="col-lg-5 col-sm-8 col-md-12 align-self-center">
                              <div class="sign-user_card ">                    
                                 <div class="sign-in-page-data">
                                     @include('pages.helper.error_success_message')
                                    <div class="sign-in-from w-100 m-auto">
                                       <h3 class="mb-3 text-center">Sign in</h3>
                                       <form class="mt-4" action="{{ route('login') }}" method="post">
                                          @csrf
                                          <div class="form-group">                                 
                                             <input type="text" class="form-control mb-0 @error('username') is-invalid @enderror" placeholder="username or email" name="username" value="{{old('username')}}">
                                             @error('username')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                          </div>
                                          <div class="form-group">                                 
                                             <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                             @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                          </div>
                                          
                                             <div class="sign-info">
                                                <button type="submit" class="btn btn-hover">Sign in</button>
                                                                               
                                             </div>                                    
                                       </form>
                                    </div>
                                 </div>
                                 <div class="mt-3">
                                    <div class="d-flex justify-content-center links">
                                       Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-2">Sing Up</a>
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