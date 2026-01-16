@extends('layouts.master')

@section('content')
    {{-- @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif --}}

    

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

                {{-- <!-- Contact Form Section -->
                @include('components.forms.contactform') --}}

                <!-- FAQ Section -->
                @include('components.sections.faq')



            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            // Swal.fire({
            //     toast: true,
            //     position: 'top-end',
            //     icon: 'success',
            //     title: "{{ session('success') }}",
            //     showConfirmButton: false,
            //     timer: 2500
            // });


            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                draggable: true,
                   timer: 2500
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    });
</script>