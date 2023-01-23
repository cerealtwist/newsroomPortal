@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Password')
@section('content')
  <div class="container-xxl">
    @livewire('author-reset-form')
  </div>
@endsection