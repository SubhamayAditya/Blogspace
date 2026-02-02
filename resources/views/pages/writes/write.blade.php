@extends('layouts.master')


@section('content')
    <!-- Hero Section -->
    <section class="write-page-hero">
        {{-- <div class="container">
            <h1 class="mt-3"><i class="fas fa-pen-fancy"></i> Create Your Story</h1>
            <p>Share your thoughts, ideas, and experiences with the world</p>
        </div> --}}
    </section>

    <!-- Write Container -->
    <div class="container" style="margin-top: -20px;">
        <div class="write-container">
            <a href="/" class="back-link text-dark"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <!-- Header -->
            <div class="write-header">
                <h2>New Blog Post</h2>
                <p class="text-muted mb-0">Fill in the details below to create an engaging blog post</p>
            </div>

            <!-- Writing Tips -->
            <div class="tips-section">
                <h5><i class="fas fa-lightbulb"></i> Writing Tips</h5>
                <ul>
                    <li>Start with an engaging title that captures attention</li>
                    <li>Use high-quality images to make your post visually appealing</li>
                    <li>Break content into short paragraphs for better readability</li>
                    <li>Add relevant tags to help readers discover your content</li>
                </ul>
            </div>


            {{-- ----------------------------------- Form ----------------------------------- --}}
            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Cover Image Upload -->
                <div class="cover-image-upload" onclick="document.getElementById('coverImageInput').click()">
                    <i class="fas fa-cloud-upload-alt fa-4x"></i>
                    <h4 class="mt-3">Upload Cover Image</h4>
                    <p class="text-muted mb-0">Click to upload or drag and drop (JPG, PNG, GIF up to 10MB)</p>
                    <input type="file" id="coverImageInput" accept="image/*" style="display: none;"
                        onchange="previewImage(event)" name="image">
                    <img id="coverPreview" class="cover-image-preview" alt="Cover preview">

                    @error('image')
                        <span style="color: red">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Blog Title -->
                <input type="text" class="title-input" placeholder="Enter an engaging title..." id="blogTitle"
                    maxlength="150" name="title" value="{{ old('title') }}">

                @error('title')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Category -->

                {{-- <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label"><i class="fas fa-folder"></i> Category</label>
                        <select class="form-select" id="blogCategory" name="category">
                            <option selected disabled>Select a category</option>
                            <option value="technology">Technology</option>
                            <option value="travel">Travel</option>
                            <option value="design">Design</option>
                            <option value="business">Business</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="food">Food & Cooking</option>
                            <option value="health">Health & Wellness</option>
                            <option value="education">Education</option>
                            <option value="entertainment">Entertainment</option>
                            <option value="sports">Sports</option>
                        </select>
                    </div>

                    @error('category')
                        <span style="color: red">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}


                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="fas fa-folder"></i> Category
                        </label>

                        <select class="form-select" name="category" required>
                            <option value="" disabled selected>Select a category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}"
                                    {{ old('category') == $category->name ? 'selected' : '' }}>
                                    {{ ucfirst($category->name) }}
                                </option>
                            @endforeach
                        </select>

                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <!-- Blog Content -->
                <label class="form-label"><i class="fas fa-edit"></i> Content Editor</label>
                {{-- <textarea class="form-control content-textarea" id="blogContent" name="description"
                    placeholder="Start writing your story..." >{{old('description')}}</textarea> --}}

                <textarea id="blogContent" name="description" class="form-control content-textarea">
                    {{ old('description') }}
                </textarea>



                @error('description')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Publish Buttons -->
                <div class="publish-section mt-3">
                    <button type="reset" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i> Clear All
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Publish Post
                    </button>
                </div>

            </form>

            {{-- ----------------------------------- Form ----------------------------------- --}}

        </div>
    </div>

    <!-- Success Message -->
    <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i> <strong>Success!</strong> Your action was completed.
    </div>
@endsection



<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#blogContent'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline',
                    'link', 'bulletedList', 'numberedList',
                    'blockQuote', 'undo', 'redo'
                ]
            })
            .catch(error => console.error(error));
    });
</script>
