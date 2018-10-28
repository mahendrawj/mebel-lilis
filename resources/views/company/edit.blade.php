@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Edit {{ $company->name_company }}</h3>
        {!! Form::model($company, ['route' => ['company.update', $company], 'method' =>'PATCH', 'files' => true])!!}
        <div class="form-group">
          <div class="col-md-12"> 
        @include('company._form', ['model' => $company])
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
