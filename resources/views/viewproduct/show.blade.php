@extends('layouts.app')
@section('content')
<div class="col-md-3">
    @include('catalogs._search-panel', [
      'q' => isset($q) ? $q : null,
      'cat' => isset($cat) ? $cat : ''
    ])

    @include('catalogs._category-panel')

    @if (isset($category) && $category->hasChild())
      @include('catalogs._sub-category-panel', ['current_category' => $category])
    @endif

    @if (isset($category) && $category->hasParent())
      @include('catalogs._sub-category-panel', [
        'current_category' => $category->parent
      ])
    @endif

  </div>
<div class="container">
  <div class="col-lg-6">
    @foreach ($products as $product)
    <h3>{{$product->name}}</h3>
    <div class="thumbnail">
        <img src="{{ $product->photo_path }}" class="img-rounded" width="50%" height="50%">
          <p>Model: {{ $product->model }}</p>
          <p>Harga: <strong>Rp{{ number_format($product->price, 2) }}</strong></p>
          <p>Category:
            @foreach ($product->categories as $category)
              <span class="label label-primary">
              <i class="fa fa-btn fa-tags"></i>
              {{ $category->title }}</span>
            @endforeach
          </p>
          <p>Deskripsi : {{$product->description}}</p>
          @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-product-form', 'data' => compact('product')])
      </div>
    @endforeach
  </div>
  
</div>

@endsection