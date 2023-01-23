@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')
  <div class="container-xxl">
    @livewire('author-login-form')
  </div>
@endsection