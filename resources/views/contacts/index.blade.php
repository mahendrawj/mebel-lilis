@extends('layouts.app')

@section('content')
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="{{asset('css/frontend_css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/frontend_css/jquery.dataTables.min.css')}}" rel="stylesheet">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Contact <small><a href="{{ route('contacts.create') }}" class="btn btn-warning btn-sm">New Contacts</a></small></h3>
        {!! Form::open(['url' => 'contacts', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('c', isset($c) ? $c : null, ['class'=>'form-control', 'placeholder' => 'Data Contacts..']) !!}
              {!! $errors->first('c', '<p class="help-block">:message</p>') !!}
            </div>

          {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <div class="table-responsive">
        <table class="table datatable-basic" style="width:100%">
          <thead>
            <tr>
              <td>Nama</td>
              <td>Email</td>
              <td>Comment</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $contact)
            <tr>
              <td>{{ $contact->nama }}</td>
              <td>{{ $contact->email}}</td>
              <td>{{ $contact->comment}}</td>
              <td>
                {!! Form::model($contact, ['route' => ['contacts.destroy', $contact], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                 <a href="{{ route('contacts.edit', $contact->id)}}" class="btn btn-xs btn-success">Edit</a> |
                  {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                {!! Form::close()!!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        {{ $contacts->appends(compact('c'))->links() }}
      </div>
    </div>
  </div>
  <script src="{{asset('js/frontend_js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/dataTables.bootstrap.min.js')}}"></script>

  <script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable( {
        "dom": '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search &nbsp;</span> _INPUT_',
            lengthMenu: '<span>Show &nbsp;</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }

    } );
    $('.datatable-basic').DataTable({
        stateSave: true,
        "order": [[ 0, "desc" ]]
    });

    // External table additions
    // ------------------------------
    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Keyword...');

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    }); 

    //$(".datepicker").datepicker({ 
    
} );
</script>
@endsection
