
{{-- <form action="" method="post">
  <select name="language">
    <option value="en">English</option>
    <option value="de">German</option>
  
    <input type="submit" value="Choose lang">
  </select>
</form> --}}

{{-- {{ trans('greetings.hello') }} --}}
{{-- @lang('greetings.hello') --}}
{{-- {{__('greetings.hello')}} --}}

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>{{ __('home.home') }}</title>
  @yield('styles')
</head>
<body>

  <form action="{{ route('set') }}" method="get">
    <select name="language">
      <option value="en">English</option>
      <option value="ar">Arabic</option>
    
      <input type="submit" value="{{__('home.choose')}}" style="margin-left: 20px;">
    </select>
  </form>
  
  <br>
  <hr>

  @yield('content')
</body>
</html>

