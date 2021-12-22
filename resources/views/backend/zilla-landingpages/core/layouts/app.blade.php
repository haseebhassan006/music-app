<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="{{ app()->getLocale() }}" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ Storage::url(config('system.favicon'))}}" type="image/png">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="{{ config('app.SITE_DESCRIPTION') }}">
    <meta name="keywords" content="{{ config('app.SITE_KEYWORDS')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900" rel="stylesheet">

    @includeWhen(config('app.GOOGLE_ANALYTICS'), 'core::partials.google-analytics')
    
    @yield('head')
    <script type="text/javascript">
      var BASE_URL = '{{ url('/') }}';
    </script>
  </head>
  <body id="page-top" class="sidebar-toggled">
    <!-- Page Wrapper -->

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Landing Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
               <form id="" action="{{route('backend.zilla-landingpages.save')}}" method="post" enctype='multipart/form-data'>
                  @csrf
              <div class="modal-body">
                  <div class="form-group">
                    <input type="number" class="form-control" name="template_id" hidden="" required="" id="template_id_builder">
                    <label for="name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" name="name" required="" id="page-name">
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveandbuilder">Save & Builder</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

   
    <script src="{{ asset('backend/js/core.js') }}" ></script>
    <script src="{{ asset('backend/js/tinymce.min.js') }}" ></script>
    <script src="{{ asset('backend/js/app.js') }}" ></script>
    
    @yield('scripts')
  </body>
</html>