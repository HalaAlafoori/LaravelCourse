@extends('layout')
@section('content')
<div class="container-fluid">
<h1>Roles</h1>
<a class="btn btn-success float-right" href="{{route('roles.create')}} ">Create</a>
<table class="table table-striped">
   <thead>
     <tr>
       <th>Id</th>
       <th>Name</th>


       <th>Actions</th>
     </tr>
   </thead>
   <tbody>
       @forelse ($roles as $role )
       <tr>
        <td>{{$role->id}}</td>
           <td>{{$role->name}}</td>


           <td>

               <a href="{{route('roles.edit',$role)}}">
                   <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                       <span class="fas fa-wrench "></span> Edit
                   </span>
               </a>

               <form method="post" action="{{route('roles.destroy',$role)}}">
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
