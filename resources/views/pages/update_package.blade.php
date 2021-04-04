@extends('layouts.frontend.app')
@section('title','Streamit | Update Packages')
@section('slider_section')
@endsection
@section('main')
   <section class="m-profile">
       <div class="container">
           <h4 class="main-title mb-4">Update Package</h4>
           <div class="row justify-content-center">
               <div class="col-lg-12">
                   <div class="sign-user_card">
                       <div class="table-responsive pricing pt-2">
                           <table id="my-table" class="table">
                               <thead>
                                  @php
                                     $current_package=App\Models\PurchasePackage::where('user_id',Auth::user()->id)->first();
                                  @endphp
                                  
                                   <tr>
                                        @foreach ($packages as $package)
                                       <th class="text-center prc-wrap">
                                           <div class="prc-box">
                                               <div class="h3 pt-4 text-white">৳ {{$package->price}}<small> for {{$package->duration}} days</small></div>
                                               <span class="type">{{$package->name}}</span>
                                               <p>{{$package->title}}</p>
                                           </div>
                                           <p style="text-align: justify;">{{$package->description}}</p>
                                       </th>

                                         @endforeach
                                   </tr>
                               </thead>
                               <tbody>
                                 
                                   <tr>
                                        @foreach ($packages as $pack)
                                       <td class="text-center">
                                           <a href="#" class="btn btn-hover mt-3" role="button" data-toggle="modal" data-target="#exampleModalCenter{{$pack->id}}">Update Package</a>
                                           {{-- @if ($current_package->user_id ===Auth::user()->id)
                                             <p><span class="badge badge-success">fvdfgdgfhfghj</span></p>
                                           @endif --}}
                                          
                                       </td>

                                       @endforeach
                                     
                                   </tr>
                               </tbody>

                             
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>


       @foreach ($packages as $p)
          <div class="modal fade "  id="exampleModalCenter{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" >
              <div class="modal-content" style="background: black">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Update Pachage</h5>
                 
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <div class="alert_section"></div>
                  <p>Hello {{Auth::user()->name}}</p>
                  <p>Your current package is name {{$current_package->package->name}} you can switch from this package or buy it again.</p>

                  <form class="mt-4 update_package_form" data-action="{{ route('update.package.store') }}" method="post">
                     @csrf
                     <div class="form-group">                                 
                        <input type="hidden" class="form-control mb-0 " name="package_id" value="{{$p->id}}">
                        <input type="hidden" class="form-control mb-0 " name="package_duration" value="{{$p->duration}}">
                        <input type="hidden" class="form-control mb-0 " name="package_price" value="{{$p->price}}">
                        <input type="hidden" class="form-control mb-0 " name="package_name" value="{{$p->name}}">


                        <div class="woocommerce-checkout-payment" id="payment">
                            <ul class="wc_payment_methods payment_methods methods">
                              
                                 <li class="wc_payment_method payment_method_cod">
                                    <input type="radio" value="Bkash" name="payment_name" class="input-radio getpayment" pay_name="bkash" pack_id="{{$p->id}}">
                                    <label for="payment_method_cod">Bkash</label>
                                    
                                </li>

                                 <li class="wc_payment_method payment_method_cod">
                                    <input type="radio" value="Rocket" name="payment_name" class="input-radio getpayment" pay_name="rocket" pack_id="{{$p->id}}">
                                    <label for="payment_method_cod">Rocket</label>
                                    
                                </li>

                            </ul>

                            <div class="form-row place-order" id="payment_area{{$p->id}}" style="display: none">
                                <p style="display: none" id="bkask_area{{$p->id}}"><strong> BKash Number: 014575225541</strong></p>
                                <p style="display: none" id="rocket_area{{$p->id}}"><strong> Rocket Number: 56415745487</strong></p>

                                <p  class="form-row-last validate-required validate-phone"><label class="" for="billing_phone">Customer Number</label>
                                    <input type="text" value="" id="customer_number{{$p->id}}" name="customer_number" class="input-text ">
                                </p>

                                <p  class="form-row-last validate-required validate-phone"><label class="" for="billing_phone">Transaction Number</label>
                                    <input type="text" value="" id="transaction_number{{$p->id}}" name="transaction_number" class="input-text ">
                                </p>
                               
                            </div>
                        </div>
                        
                     </div>
                        <div class="sign-info">
                           <button type="submit" class="btn btn-hover purchase_button">Update</button>                           
                        </div>                                    
                     
                  </form>
                </div>
               
              </div>
            </div>
          </div>
       @endforeach


   </section>
@endsection
@section('js')
   <script>
         $(document).ready(function(){
             $('body').on('click','.getpayment',function(){
                  //alert("ok");
                 let payment_type=$(this).val();
                 let paynumber=$(this).attr('pay_name');
                 let pack_id=$(this).attr('pack_id');
             
                     if (paynumber==='bkash') {
                           $('#bkask_area'+pack_id).show();
                           $('#rocket_area'+pack_id).hide();
                            $('#payment_area'+pack_id).show();
                           $('#transaction_number'+pack_id).attr('required', 'true');
                           $('#customer_number'+pack_id).attr('required', 'true');
                         }
                         if (paynumber==='rocket') {
                            $('#bkask_area'+pack_id).hide();
                           $('#rocket_area'+pack_id).show();
                            $('#payment_area'+pack_id).show();
                           $('#transaction_number'+pack_id).attr('required', 'true');
                           $('#customer_number'+pack_id).attr('required', 'true');
                         }
             });


             $('body').on('submit','.update_package_form',function(e){
                     e.preventDefault();
                       let formDta = new FormData(this);
                       console.log(formDta)
                     $('.purchase_button').text('Updating...').attr('disabled',true);
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
                             $('.alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
                           }else{
                             $('.alert_section').html('<div class="alert alert-danger"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
                           }
                           $(".purchase_package_form")[0].reset();
                           $('.purchase_button').text('Updatate').attr('disabled',false);
                          
                          
                         },
                         error:function(response){
                           console.log(response);

                             $('.alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['name'][0]+'</div>').show();
                         }
                       });
               });

           
         });
     </script>
   </script>
@endsection