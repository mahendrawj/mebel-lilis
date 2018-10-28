@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>New Company</h3>
        {!! Form::open(['route' => 'company.store', 'files' => true])!!}
          @include('company._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
