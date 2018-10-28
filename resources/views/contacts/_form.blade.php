<div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
        {!! Form::label('nama', 'Nama') !!}
        {!! Form::text('nama', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
      </div>
<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>
<div class="form-group {!! $errors->has('comment') ? 'has-error' : '' !!}">
        {!! Form::label('comment', 'Message') !!}
        {!! Form::textarea('comment', null, ['class'=>'form-control', 'rows' => 10, 'cols' => 30]) !!}
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
      </div>
      {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
      