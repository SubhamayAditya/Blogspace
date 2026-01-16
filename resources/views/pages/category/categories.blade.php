
@extends('layouts.master')


@section('content')
<style>
    /* Values Section */
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

</style>

<section class="values-section">
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