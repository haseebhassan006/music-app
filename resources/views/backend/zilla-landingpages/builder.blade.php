<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/builder.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/customize.css') }}">
    <script src="{{ asset('backend/js/builder.js') }}"></script>
   
    <script type="text/javascript">
      var config = {
        enable_edit_code: false,
        enable_slider: true,
        enable_countdown: true,
        enable_custom_code_block: true,
        url_get_products:  "{{ route('backend.zilla-products.getProducts') }}",
        all_icons: @json($all_icons)
      };
    </script>
    <script src="{{ asset('backend/js/grapeweb.js') }}"></script>

</head>

 <body>
    <div id="mobileAlert">
      <div class="message">
        <h3>Builder not work on mobile</h3>
        <a href ="{{ route('backend.zilla-landingpages') }}">Back</a>
      </div>
    </div>
   
    <input type="text" name="code" value="{{$pages->code}}" hidden class="form-control">
    
    <div id="loadingMessage">
      <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
    <div class="btn-page-group">
        <a href="{{ URL::to('admin/zilla-landingpages/builder/'.$pages->code)}}" class="btn btn-light @if(request()->route('type') != 'thank-you-page') active @endif" id="btn-main-page">Main Page</a>
        <a href="{{ URL::to('admin/zilla-landingpages/builder/'.$pages->code.'/thank-you-page') }}" class="btn btn-light @if(request()->route('type') == 'thank-you-page') active @endif" id="btn-thank-you-page">Thank You Page</a>
    </div>
    <div id="gjs">
    </div>


    @php
      $arr_blocks = [];
      foreach ($blocks as $item) {
           $arr_temp = [];
           $arr_temp['id'] = $item->id;
           $arr_temp['thumb'] = URL::to('/').'/storage/thumb_blocks/'.$item->thumb;
           $arr_temp['name'] = $item->name;
           $arr_temp['category'] = $item->category->name;
           $arr_temp['content'] = $item->getReplaceVarBlockContent();
           array_push($arr_blocks, $arr_temp);
      }
    @endphp

    <script type="text/javascript">
      const type_page ='{{request()->route('type')}}';
      var urlStore = '{{ URL::to('admin/zilla-landingpages/update-builder/'.$pages->code.'/'.request()->route('type')) }}';
      var urlLoad = '{{ URL::to('admin/zilla-landingpages/load-builder/'.$pages->code.'/'.request()->route('type')) }}';
      var upload_Image = '{{ URL::to('uploadimage') }}';
      var url_default_css_template = '{{ asset('backend/css/template.css')}}';
      var back_button_url = "{{ URL::to('zilla-landingpages') }}";
      var publish_button_url = '{{ URL::to('admin/zilla-landingpages/setting/'.$pages->code) }}';
      var url_delete_image = '{{ URL::to('/deleteimage') }}';
      var url_search_icon = '{{ URL::to('/searchIcon') }}';

      var _token = '{{ csrf_token() }}';
      var images_url = @json($images_url);
      var blockscss = @json($blockscss);
      var blocks = @json($arr_blocks);
      
    </script>
    <script src="{{ asset('backend/js/customize-builder.js') }}" ></script>
    

    
  </body>


</html>