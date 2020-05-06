<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="/css/all.min.css">

</head>
<body>
<div id="app">
<p>
    <router-link to="/">home</router-link>
    <router-link to="/test">test</router-link>
    <router-link to="/login">login</router-link>
</p>
 <router-view></router-view>
</div>
<script src="/js/app.js"></script>
</body>
</html>
