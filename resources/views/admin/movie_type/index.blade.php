@extends('layouts.backend.app')
@section('title','Steamit | Vedio List')
@section('content')

	<div class="row">
	   <div class="col-sm-12">
	      <div class="iq-card">
	         <div class="iq-card-header d-flex justify-content-between">
	            <div class="iq-header-title">

	               <h4 class="card-title">Vedio Type Lists</h4>
	            </div>
	            <div class="iq-card-header-toolbar d-flex align-items-center">
	               <a href="{{ route('type.add') }}" class="btn btn-primary">Add Type</a>
	            </div>
	         </div>
	         <div class="iq-card-body">
	            <div class="table-view">
	               <table class="data-tables table movie_table " style="width:100%" >
	                  <thead>
	                     <tr>
	                        <th style="width:10%;">No</th>
	                        <th style="width:20%;">Name</th>
	                        <th style="width:20%;">Description</th>
	                        <th style="width:20%;">Movie</th>
	                        <th style="width:20%;">Action</th>
	                     </tr>
	                  </thead>
	                  <tbody>
	                    @foreach ($movieTypes as $type)
	                     <tr>
	                        <td>{{$loop->index+1}}</td>
	                        <td>{{$type->type_name}}</td>
	                        <td>{{$type->description}}</td>
	                     
	                        <td>65</td>
	                        <td>
	                           <div class="flex align-items-center list-user-action">
	                           
	                              <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
	                              <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
	                                 data-original-title="Delete" href="#"><i
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

@endsection