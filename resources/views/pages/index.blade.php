@extends('layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Hero Section -->
    @include('components.hero')

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row">

                <!-- Main Content -->
                @include('components.blogcard')

                <!-- Sidebar -->
                @include('components.sidebar')

            </div>
        </div>
    </section>
@endsection
