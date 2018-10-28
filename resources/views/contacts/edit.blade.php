@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Edit Nama  {{ $contacts->nama }}</h3>
        <h3>Edit Email {{ $contacts->email }}</h3>
        <h3>Edit Messages {{ $contacts->comment }}</h3>
        {!! Form::model($contacts, ['route' => ['contacts.update', $contacts], 'method' =>'PATCH'])!!}
          @include('contacts._form', ['model' => $contacts])
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
