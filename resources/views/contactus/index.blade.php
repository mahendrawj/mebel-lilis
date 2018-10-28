@extends('layouts.app')
@section('content')
<div id="contact-page" class="container">
  <div class="bg">   	
    <div class="row">  	
      <div class="col-sm-8">
        <div class="contact-form">
          <h2 class="title text-center">Contact Us</h2>
          <div class="status alert alert-success" style="display: none"></div>
          {!! Form::open(['route'=>'contactus.store']) !!}
          <div class="form-group col-md-6 {!! $errors->has('nama') ? 'has-error' : '' !!}">
            {!! Form::label('nama', 'Nama') !!}
            {!! Form::text('nama', null, ['class'=>'form-control']) !!}
            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group col-md-6 {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group col-md-12 {!! $errors->has('comment') ? 'has-error' : '' !!}">
            {!! Form::label('comment', 'Message') !!}
            {!! Form::textarea('comment', null, ['class'=>'form-control', 'id'=>'comment']) !!}
            {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group col-md-12">
            {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}
         
        </div>
      </div>
      <div class="col-sm-4">
        <div class="contact-info">
          <h2 class="title text-center">Contact Info</h2>
          <address>
            <p>Toko Mebel Lilis.</p>
          <p>Jalan Raya Patemon No 96, Patemon, Gunung Pati, Patemon, Gn. Pati, Kota Semarang, Jawa Tengah 50228</p>
          <p>WhatsApp:<img src="{{asset('img/whatsapp.png')}}" width="32px" height="32px"> <a href="https://api.whatsapp.com/send?phone=628122801035&text=Saya%20tertarik%20untuk%20membeli%20Barang%20barangmebel%20Anda">+628122801035</a></p>
          <p>Email: <a href="#">tokomebellilis@shopmebel.com</a></p>
          </address>
          <img width="350" height="250" src="https://maps.googleapis.com/maps/api/staticmap?scale=1&amp;size=520x410&amp;style=feature:poi.business|visibility:off&amp;style=feature:water|visibility:simplified&amp;style=feature:road|element:labels.icon|visibility:off&amp;style=feature:road.highway|element:labels|saturation:-90|lightness:25&amp;format=jpg&amp;language=id&amp;region=ID&amp;markers=color:0xddaa44|-7.065329,110.39616&amp;zoom=16&amp;client=google-presto&amp;signature=RwcHRB3tt9EmeqW13BV1Cbkd7rg" alt="Peta yang menampilkan lokasi bisnis.">
          <br>
          <address>
              <a class="map-info__link site-cta-link" href="https://www.google.com/maps/dir//Mebel+Lilis/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e7089642ba3fc4b:0xd9d15cec1b799a51!2m2!1d110.39616!2d-7.065328999999999" target="_blank" data-tracking-element-type="6">Dapatkan petunjuk arah</a>
          </address>
        </div>
      </div>    			
    </div>  
  </div>	
</div><!--/#contact-page-->
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'comment' );
</script>
@endsection