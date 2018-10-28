@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Company <small><a href="{{ route('company.create') }}" class="btn btn-warning btn-sm">New Company</a></small></h3>
        {!! Form::open(['url' => 'company', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('com') ? 'has-error' : '' !!}">
              {!! Form::text('com', isset($com) ? $com : null, ['class'=>'form-control', 'placeholder' => 'Type name / model...']) !!}
              {!! $errors->first('com', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <table class="table datatable-basic">
          <thead>
            <tr>
              <td>Name Company</td>
              <td>Content Company</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($company as $companys)
            <tr>
              <td>{{ $companys->name_company }}</td>
              <td>{{ $companys->content_company}}</td>
              
              <td>
                {!! Form::model($companys, ['route' => ['company.destroy', $companys], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                 <a href="{{ route('company.edit', $companys->id)}}">Edit</a> |
                  {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $company->appends(compact('com'))->links() !!}
      </div>
    </div>
  </div>
@endsection
