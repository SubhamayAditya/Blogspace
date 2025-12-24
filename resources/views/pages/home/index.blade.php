@extends('layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Hero Section -->
    @include('components.sections.hero')

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row">

                <!-- Main Content -->
                @include('components.cards.blogcard')

                <!-- Sidebar -->
                @include('components.sidebar.sidebar')

                <!-- Values Section -->
                @include('components.sections.values')

                <!-- Stats Section -->
                @include('components.sections.stats')
                
                <!-- FAQ Section -->
                @include('components.sections.faq')



            </div>
        </div>
    </section>
@endsection
