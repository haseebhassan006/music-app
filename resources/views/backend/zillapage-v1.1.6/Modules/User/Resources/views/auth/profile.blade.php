@extends('core::layouts.app')
@section('title', __('Account Settings'))
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Setting Account')</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <form role="form" method="post" action="{{ route('accountsettings.update') }}" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab_profile" data-toggle="tab">
                                @lang('Profile')
                            </a>
                        </li>
                        @php
                            $views_render = accountSettingPayments(['user' => $user]);
                        @endphp

                        @if(!empty($views_render))
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_payment_setting" data-toggle="tab">
                                    @lang('Payment Settings')
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_profile">
                            <div class="d-flex align-items-center justify-content-between">
                                <div><h4>&nbsp;</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Name')</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="@lang('Full name')">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" value="{{ $user->email }}" class="form-control disabled" placeholder="E-mail" disabled>
                                        <small class="help-block">@lang("E-mail can't be changed")</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Password')</label>
                                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="@lang('Password')">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('Confirm password')</label>
                                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="@lang('Confirm password')">
                                    </div>
                                    <div class="alert alert-info">
                                        @lang('Type new password if you would like to change current password.')
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="tab-pane" id="tab_payment_setting">
                            @if(!empty($views_render))
                                {!! $views_render !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-block">
                    <i class="fe fe-save mr-2"></i> @lang('Save settings')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop