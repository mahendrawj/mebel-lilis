<h3>
  <a href="{{ url('/') }}/catalogs/viewproduct?id={{$product->id}}">{{ $product->name }}</a></h3>
  <div class="col-md-12">
  <div class="thumbnail">
  <img src="{{ $product->photo_path }}" class="img-rounded" width="250px" width="100px">
    <p>Model: {{ $product->model }}</p>
    <p>Harga: <strong>Rp{{ number_format($product->price, 2) }}</strong></p>
    <p>Category:
      @foreach ($product->categories as $category)
        <span class="label label-primary">
        <i class="fa fa-btn fa-tags"></i>
        {{ $category->title }}</span>
      @endforeach
    </p>
        @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-product-form', 'data' => compact('product')])
</div>
  </div>
