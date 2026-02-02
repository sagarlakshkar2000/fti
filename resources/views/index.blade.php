@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div class="space-y-12">
    <x-hero-slider />
    <x-taxi-service :taxiServices="$taxiServices" :serviceIcons="$serviceIcons" />
    <x-fleet />
    <x-two-side-section />
    <x-tour-packages />
    <x-latest-offers :latestOffers="$latestOffers" />
</div>
@endsection
