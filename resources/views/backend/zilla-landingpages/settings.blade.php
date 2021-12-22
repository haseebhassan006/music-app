@extends('backend.zilla-templates.core.layouts.app')
@extends('backend.index')
@section('title', __('Settings'))
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
		<li class="breadcrumb-item active">
            <span>Setting</span>

        </li>
    </ol>

        @if($errors->any())
            <div class="alert alert-danger">
              <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                <li> <i class="fas fa-times text-danger mr-2"></i> {{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if (session('success'))
                  <div class="alert alert-success">
                      <i class="fas fa-check-circle text-success mr-2"></i> {!! session('success') !!}
                  </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-times text-danger mr-2"></i> {!! session('error') !!}
                </div>
            @endif
            

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$item->name}}</h1>
    <div class="my-3 my-lg-0 navbar-search">
        <div class="input-group">
            <div class="p-1 ">
                <a href="{{ route('backend.zilla-landingpages.builder', $item->code) }}" class="btn btn-sm btn-primary"><i class="far fa-window-maximize"></i>Builder</a>
            </div>
        </div>
    </div>
</div>


<form role="form" method="post" action="{{ route('backend.zilla-landingpages.settings.update',$item) }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 setting-tabs">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="general" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                    <a class="nav-item nav-link" id="domains" data-toggle="tab" href="#nav-domains" role="tab" aria-controls="nav-domains" aria-selected="true">Domain</a>
                    <a class="nav-item nav-link" id="seo" data-toggle="tab" href="#nav-seo" role="tab" aria-controls="nav-seo" aria-selected="true">SEO</a>
                    <a class="nav-item nav-link" id="nav-forms-tab" data-toggle="tab" href="#nav-forms" role="tab" aria-controls="nav-profile" aria-selected="false">Form</a>
                    <a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="false">Payment</a>
                    <a class="nav-item nav-link" id="custom-code" data-toggle="tab" href="#nav-custom-code" role="tab" aria-controls="nav-contact" aria-selected="false">Custom Code</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

            {{-- General --}}
                <div class="tab-pane fade show active mt-3" id="nav-general" role="tabpanel" aria-labelledby="nav-general">
                    <h4 class="title-tab-content">General Settings</h4>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{$item->name}}" class="form-control">
                    </div>
                    <div class="form-group mb-4 mt-4">
                        <label class="custom-switch pl-0">
                            <input type="checkbox" name="is_publish" value="1" class="custom-switch-input" {{ $item->is_publish ? 'checked' : '' }}>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Publish</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Favicon</label>
                        <input name="favicon" type="file" accept="image/*"><br>
                        <small>Image will be displayed in browser tabs (best size 32 x 32)</small>
                        @if($item->favicon)
                        <p><img src="{{ URL::to('/') }}/storage/pages/{{ $item->id }}/{{ $item->favicon }}" data-value="" class="img-thumbnail" /></p>
                        @endif

                    </div>
                </div>

                {{-- Domains --}}
                <div class="tab-pane fade mt-3" id="nav-domains" role="tabpanel" aria-labelledby="nav-domains-tab">
                    <h4 class="title-tab-content">Domain Settings</h4>
                    <p class="title-break"><strong>Current domain:</strong>
                        @if($item->domain_type == 0)
                        <a href="http://{{$item->sub_domain}}" target="_blank">{{$item->sub_domain}}</a>
                        @elseif($item->domain_type == 1)
                        <a href="http://{{$item->custom_domain}}">{{$item->custom_domain}}</a>
                        @endif

                    </p>
                    <div class="form-group">
                        <label class="form-label">Domain Type</label>
                        <select name="domain_type" id="domain_type_select" class="form-control">
                            <option value="0" {{ !$item->domain_type ? 'selected' : '' }}>Sub domain</option>
                            <option value="1" {{ $item->domain_type ? 'selected' : '' }}>Custom your domain</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form_customdomain">
                                <label class="form-label">Sub domain</label>
                                <input type="text" name="sub_domain" value="{{$item->sub_domain}}" class="form-control" {{ $item->domain_type ? 'disabled' : '' }} id="input_sub_domain">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group form_subdomain">
                                <label class="form-label">Custom your domain</label>
                                <input type="text" name="custom_domain" value="{{$item->custom_domain}}" class="form-control" {{ !$item->domain_type ? 'disabled' : '' }} placeholder="Enter your custom domain" id="input_custom_domain">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p class="{{ $item->domain_type ? 'd-none' : '' }}" id="sub_domain_note">You can customize subdomain</p>
                            <div id="custom_domain_note" class="{{ !$item->domain_type ? 'd-none' : '' }}">
                                <table class="table card-table table-vcenter text-nowrap">
                                    <p>Add records below in your domain provider's DNS settings</p>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>TYPE</th>
                                            <th>HOST</th>
                                            <th>VALUE</th>
                                            <th>TTL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A</td>
                                            <td>@</td>
                                            <td>{{ config('app.SERVER_IP') }}</td>
                                            <td>Automatic</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>


                {{-- SEO --}}
                <div class="tab-pane fade mt-3" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
                    <h4 class="title-tab-content">SEO Settings</h4>
                    <p class="title-break">Specify here necessary information about your page. It will help search engines find your content.</p>
                    <div class="form-group">
                        <label class="form-label">SEO Title</label>
                        <input type="text" name="seo_title" value="{{$item->seo_title}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">SEO Description</label>
                        <textarea name="seo_description" rows="3" class="form-control">{{$item->seo_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">SEO Keywords</label>
                        <textarea name="seo_keywords" rows="3" class="form-control">{{$item->seo_keywords}}</textarea>
                    </div>
                    <p class="title-break">Customize how your page is viewed when it is shared on social networks.</p>
                    <div class="form-group">
                        <label class="form-label">Social Title</label>
                        <input type="text" name="social_title" value="{{$item->social_title}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Social Image</label>
                        <input name="social_image" type="file" accept="image/*"><br>
                        <small>Upload an image that will be automatically displayed on your posts, on social media platforms like Facebook and Twitter... To display the photo seamlessly on all platforms, the ideal dimension is 1200x630, with a file size smaller than 300KB</small>
                        @if($item->social_image)
                        <p><img src="{{ URL::to('/') }}/storage/pages/{{ $item->id }}/{{ $item->social_image }}" data-value="" class="img-thumbnail" /></p>
                        @endif

                    </div>
                    <div class="form-group">
                        <label class="form-label">Social Description</label>
                        <textarea name="social_description" rows="3" class="form-control">{{$item->social_description}}</textarea>
                    </div>
                </div>


                {{-- Forms --}}
                <div class="tab-pane fade mt-3" id="nav-forms" role="tabpanel" aria-labelledby="nav-forms-tab">

                    <ul class="nav nav-pills mb-3" id="" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="next-action-tab" data-toggle="pill" href="#next-action-nav" role="tab" aria-controls="next-action-tab" aria-selected="true">Next Action</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="intergrations-tab" data-toggle="pill" href="#intergrations-nav" role="tab" aria-controls="intergrations-tab" aria-selected="false">Intergrations</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="next-action-nav" role="tabpanel" aria-labelledby="next-action-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <h4 class="title-tab-content pb-0">Action after form submission</h4>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="form-label">All the form in main pages when submit will...</label>
                                            <select name="type_form_submit" id="type_form_submit" class="form-control">
                                                <option value="thank_you_page" {{ $item->type_form_submit == 'thank_you_page' ? 'selected' : '' }}>Go to default Thank You Page</option>
                                                <option value="url" {{ $item->type_form_submit == 'url' ? 'selected' : '' }}>Redirect to any URL</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row @if($item->type_form_submit == 'thank_you_page') d-none @endif" id="form_redirect_url">
                                                <div class="col-md-12">
                                                    <label class="form-label">Redirect to:</label>
                                                    <input type="text" name="redirect_url" value="{{$item->redirect_url}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="intergrations-nav" role="tabpanel" aria-labelledby="intergrations-tab">

                            {{-- Intergration --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Intergrations</h4>
                                     <label class="form-label">All the form in main pages when submit will...</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row intergration_row">
                                                <div class="col-md-4">
                                                    <div class="card text-center p-3" id="card_none" data-type="none" data-name="None">
                                                        <div class="card-block">
                                                            <h4 class="text-danger"><i class="fas fa-times fa-2x"></i></h4>
                                                        </div>
                                                        <div class="mt-3 no-gutters">
                                                            <h6 class="card-title">None</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card text-center p-3" id="card_mailchimp" data-type="mailchimp" data-name="Mailchimp">
                                                        <div class="card-block">
                                                            <img src="{{ asset('img/mailchimp.png') }}" class="img-fluid">
                                                        </div>
                                                        <div class="mt-3 no-gutters">
                                                            <h6 class="card-title">Mailchimp</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="input_intergration_type" hidden="" name="intergration_type" value="{{$item_intergration['type']}}" class="form-control">
                                            <div class="alert d-none" id="alert-intergration" role="alert">
        
                                            </div>
                                            <div class="d-none" id="spinner-loading">
                                                 <div class="d-flex align-items-center" >
                                                  <strong>Loading...</strong>
                                                  <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                                                </div>
                                            </div>
                                            @include('backend.zilla-landingpages.intergrations.mailchimp')

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                {{-- Form payment --}}
                <div class="tab-pane fade mt-3" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <h4 class="title-tab-content pb-0">Action after payment success</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-label">All the button payment in main pages when success will...</label>
                                    <select name="type_payment_submit" id="type_payment_submit" class="form-control">
                                        <option value="thank_you_page" {{ $item->type_payment_submit == 'thank_you_page' ? 'selected' : '' }}>Go to default Thank You Page</option>
                                        <option value="url" {{ $item->type_payment_submit == 'url' ? 'selected' : '' }}>Redirect to any URL</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row @if($item->type_payment_submit == 'thank_you_page') d-none @endif" id="form_redirect_url_payment">
                                        <div class="col-md-12">
                                            <label class="form-label">Redirect to:</label>
                                            <input type="text" name="redirect_url_payment" value="{{$item->redirect_url_payment}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Custom Code --}}
                <div class="tab-pane fade mt-3" id="nav-custom-code" role="tabpanel" aria-labelledby="nav-custom-code">
                    <h4 class="title-tab-content">Insert Headers and Footers</h4>
                    <p>Insert Headers and Footers lets you insert code like Google Analytics, custom CSS, Facebook Pixel, Chat, and more to your LandingPage site header and footer</p>
                    <div class="form-group">
                        <label class="form-label">Header</label>
                        <textarea name="custom_header" rows="3" class="form-control">{{$item->custom_header}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Footer</label>
                        <textarea name="custom_footer" rows="3" class="form-control">{{$item->custom_footer}}</textarea>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <button class="btn btn-primary ml-auto">Save</button>
            </div>
        </div>
    </div>
</form>

@endsection