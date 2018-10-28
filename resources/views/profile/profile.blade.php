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
          <div class="col-md-6">
              <div class="blog-post-area">
                  @foreach ($profile as $profiles)
                  <h2 class="title text-center">{{$profiles->name_company}}</h2>
                  <div class="single-blog-post">
                      <div class="thumbnail col-xs-12">
                          <div class="col-md-12">
                          <a href="#">
                              <img src="{{ $profiles->photo_path }}" class="img-rounded" width="250px" height="350px"></a>
                          </div>
                            </div>
                            {{$profiles->content_company}}
                        </div>
                    </div>
                </div>
                @endforeach
                </div><!--/blog-post-area-->
                @endsection
