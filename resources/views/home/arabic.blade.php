@extends('hello')

@section('styles')
<style>
    container {
    width: 980px;
    margin: 0 auto;
  }

  #sidebar {
    float: right;
    width: 200px;
    font-weight: bold;
    background: #ccc;
    margin-left: 35px;
  }

  #content {
    overflow: hidden;
    font-weight: bold;
    background: #987;
  }
</style>
@endsection

@section('content')
  <div id="container">
    <div id="sidebar">{{__('home.sidebar')}}</div>
    <div id="content">{{__('home.content')}}</div>
  </div>
@endsection