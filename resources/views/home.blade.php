@extends('layouts.app')

@section('content')
<div>
    @include('landingPage.hero')
    @include('landingPage.benefits')
    @include('landingPage.pricing')
    @include('landingPage.faq')
</div>
@endsection