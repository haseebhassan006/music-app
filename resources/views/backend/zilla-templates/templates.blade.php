@extends('backend.zilla-landingpages.core.layouts.app')
@extends('backend.index')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
		<li class="breadcrumb-item active">
            <span>All Templates</span>

        </li>
    </ol>

    <div class="row row_blog_responsive pt-4 clearfix mt-4">
    @foreach($data as $index => $item)
      <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12 itembb mt-4 mb-4">
          <div class="clearfix blog-bottom blog blogitemlarge border border-white rounded p-2 mr-2">
              <a href="#" title="{{$item->name}}" class="image-blog date clearfix">
                  <img src="/storage/thumb_templates/{{ $item->thumb }}" alt="{{$item->name}}" data-was-processed="true" class="img-fluid" />
                  @if($item->is_premium)
                        <span class="post-date badge badge-danger"><i class="fas fa-star"></i>Premium</span>
                  @else
                        <span class="post-date badge badge-success"><i class="fas fa-star"></i> Free</span>
                  @endif
                  
              </a>
              <div class="content_blog clearfixflex flex-column flex-lg-row">
                  <div class="p-1">
                    {{ $item->name }}
                  </div>
                  <div class="d-flex pt-1">
                      <a href="#" class="btn btn-primary mr-2 btn_builder_template" data-id="{{$item->id}}" data-toggle="modal" data-target="#createModal">Builder</a>
                      <a href="{{ url('admin/zilla-landingpages/preview-template/' . $item->id) }}" class="btn btn-primary ">Preview</a>
                  </div>
              </div>
          </div>
      </div>
    @endforeach
</div>

    
@endsection