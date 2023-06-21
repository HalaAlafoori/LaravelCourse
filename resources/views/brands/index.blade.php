@extends('layout')
@section('content')
<div class="container-fluid">
<h1>brands</h1>
<a class="btn btn-success float-right" href="{{route('brands.create')}} ">Create</a>
<table class="table table-striped">
   <thead>
     <tr>
       <th>Name</th>
       <th>Image</th>

       <th>Actions</th>
     </tr>
   </thead>
   <tbody>
       @forelse ($brands as $brand )
       <tr>
           <td>{{$brand->name}}</td>
           <td><img width='100' src="{{url('/storage/'.$brand->image)}}" alt=""></td>

           <td>

               <a href="{{route('brands.edit',$brand)}}">
                   <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                       <span class="fas fa-wrench "></span> Edit
                   </span>
               </a>

               <form method="post" action="{{route('brands.destroy',$brand)}}">
                   @csrf
                   @method('DELETE')
                   <button onclick="var result=confirm('R U sure?'); if(result){} else{event.preventDefault()}" class="btn btn-danger">Delete</button>

               </form>

           </td>
         </tr>
       @empty
       <h1>No data found</h1>

       @endforelse


   </tbody>
 </table>

</div>
 @endsection
