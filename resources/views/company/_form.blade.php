<div class="form-group {!! $errors->has('name_company') ? 'has-error' : '' !!}">
    <div class="col-md-6">
    {!! Form::label('name_company', 'Nama Perusahaan') !!}
    {!! Form::text('name_company', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name_company', '<p class="help-block">:message</p>') !!}
</div>  
</div>
<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
  <div class="col-md-12">
    {!! Form::label('photo', 'Product photo (jpeg, png)') !!}
    {!! Form::file('photo') !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
  </div>
    @if (isset($model) && $model->photo !== '')
    <div class="row">
      <div class="col-md-6">
        <p>Current photo:</p>
        <div class="thumbnail">
          <img src="{{ url('/img/' . $model->photo) }}" class="img-rounded">
        </div>
      </div>
    </div>
    @endif
  </div>
  
  <div class="form-group {!! $errors->has('content_company') ? 'has-error' : '' !!}">
    <div class="col-md-6">
    {!! Form::label('content_company', 'Content') !!}
    {!! Form::textarea('content_company', null, ['id'=>'content_company', 'rows' => 4, 'cols' => 54]) !!}
    {!! $errors->first('content_company', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
  
  
  {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'content_company' );
</script>