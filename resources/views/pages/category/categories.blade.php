<<<<<<< HEAD
=======

>>>>>>> 0bd373c53cca39c0ea4a4d40ddb035e1b6e7ad00
@extends('layouts.master')


@section('content')
<<<<<<< HEAD
    <style>
        /* Values Section */
=======
<style>
    /* Values Section */
>>>>>>> 0bd373c53cca39c0ea4a4d40ddb035e1b6e7ad00
        .values-section {
            padding: 80px 0;
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .section-title p {
            color: #64748b;
            font-size: 1.2rem;
        }

        .value-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
            transition: all 0.4s ease;
        }

        .value-card:hover .value-icon {
            transform: rotateY(360deg);
        }

        .value-card h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .value-card p {
            color: #64748b;
            line-height: 1.7;
        }
<<<<<<< HEAD
    </style>

    <section class="values-section">
=======

</style>

<section class="values-section">
>>>>>>> 0bd373c53cca39c0ea4a4d40ddb035e1b6e7ad00
        <div class="container">
            <div class="section-title">
                <h2>Categories</h2>
                <p>The principles that guide everything we do</p>
            </div>
            {{-- <div class="row g-4">
                <div class="col-md-4">
                    <h4>Technology</h4>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4>Travel</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Design</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Business</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4>Lifestyle</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Food & Cooking</h4>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Health & Wellness</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Education</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Entertainment</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Sports</h4>
                    </div>
                </div>
            </div> --}}

<<<<<<< HEAD
            <div class="category-tags">
                @foreach (['Technology', 'Travel', 'Design', 'Business', 'Lifestyle', 'Food & Cooking', 'Health & Wellness', 'Education', 'Entertainment', 'Sports'] as $cat)
                    <a href="{{ route('category.search', ['query' => $cat]) }}" class="tag" style="text-decoration: none">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>


        {{-- card section filter--}}
<?php /* ?>
        <div class="col-lg-8">

            <div class="row">
                <!-- Blog Card  -->
                {{-- @foreach ($blogs as $blog) --}}
                    <div class="col-md-6">

                        <div class="blog-card">
                            {{-- <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog"> --}}
                            <img src="" alt="Blog">

                            <div class="blog-card-body">
                                {{-- <span class="blog-category">{{ $blog->category }}</span> --}}
                                <span class="blog-category">Category</span>

                                {{-- <i class="fa-solid fa-eye"></i> <small class="text-muted">{{ $blog->views }} Views</small> . <i class="fa-regular fa-user"></i> --}}
                                <i class="fa-solid fa-eye"></i> <small class="text-muted">10 Views</small> . <i class="fa-regular fa-user"></i>

                                    {{-- {{ $blog->user->name ?? 'Unknown User' }} <small class="text-muted"></small> --}}


                                    {{-- <a href="{{ route('blog.details', $blog->id) }}" style="text-decoration: none"> --}}
                                    <a href="#" style="text-decoration: none">
                                        {{-- <h3 class="blog-title">{{ $blog->title }}</h3> --}}
                                        <h3 class="blog-title">Title</h3>
                                    </a>


                                    {{-- <p class="text-muted">{!! $blog->description !!}</p> --}}
                                    <p class="text-muted">
                                        {{-- {!! Str::limit(strip_tags($blog->description, '<p><br><strong><em>'), 150) !!} --}}
                                    </p>


                                    {{-- <a href="{{ route('blog.details', $blog->id) }}"> --}}
                                    <a href="#">
                                        <button class="nav-item btn btn-primary ms-3 text-white">Read More</button>
                                    </a>


                            </div>
                        </div>

                    </div>
                {{-- @endforeach --}}
                {{-- {{ $blogs->links() }} --}}
                {{-- Pagination --}}
                <div class="col-12 mt-4 d-flex justify-content-center">
                    {{-- {{ $blogs->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
        <?php */ ?>
        {{-- card section filter end --}}

    </section>
@endsection
=======

<div class="category-tags">
    @foreach (['Technology', 'Travel', 'Design', 'Business', 'Lifestyle', 'Food & Cooking', 'Health & Wellness', 'Education', 'Entertainment', 'Sports'] as $cat)
    <a href="{{ route('category.search', ['query' => $cat]) }}" class="tag" >
        {{ $cat }}
        </a>
        @endforeach
        </div>
        </div>
        </section>
        
        
        @endsection
        >>>>>>> 0bd373c53cca39c0ea4a4d40ddb035e1b6e7ad00
        