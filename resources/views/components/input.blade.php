@extends('layout.app')
@section('main')
  
  @if ($message = Session::get('update'))
  <div class="alert alert-dark alert-dismissible fade show" role="alert">
   <strong class="font-monospace text-center">{{ $message }}</strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
      
  @endif
  @if ($message = Session::get('delete'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong class="font-monospace text-center">{{ $message }}</strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
      
  @endif
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong class="font-monospace text-center">{{ $message }}</strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
  
@endif
   <div class="container">
      <div class="text-right">
         <a href="{{ route('data/store')}}" class="btn btn-outline-secondary float-end  mt-2">New Data Added</a>
      </div>
   <table class="table table-striped table-hover mt-2">
      <thead>
         <tr>
           <th>Index</th>
          <th>Name </th>
          <th>Email </th>
          <th>Phone </th>
          <th>Address </th>
          <th>Edit</th>
          <th>Delete</th>

         </tr>
      </thead>    
      <tbody>
       
         @foreach ($Employees as $employee )
         <tr>
            <td> {{$loop->index+1}}</td>
            <td>{{ $employee->name}}</td>
            <td>{{ $employee->email}}</td>
            <td>{{ $employee->phone}}</td>
            <td>{{ $employee->address}}</td>
            <td><a href="employee/{{ $employee->id}}/edit" class="btn btn-dark btn-sm">Edit</a></td>
            <form action="employee/{{ $employee->id}}/delete" method="POST" class="d-inline">
               @csrf
               @method('DELETE')
               <td><a href="employee/{{ $employee->id }}/delete" class="btn btn-danger btn-sm">Delete</a></td>
           </form>
         </tr>
      </tbody>
      @endforeach
    </table>
   </div>
   @endsection

