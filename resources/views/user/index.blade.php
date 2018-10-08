@extends('layouts.app')

@section('content')
  <div class="container">
    
        <table class="table table-hover">
          <thead>
            <tr>
              <td>Name</td>
              <td>Email</td>
              
            </tr>
          </thead>
          <tbody>
                
           @foreach($users as $user )
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
             
              <td>
               
              </td>
            </tr>
            @endforeach
         
          </tbody>
        </table>
        
    
@endsection
