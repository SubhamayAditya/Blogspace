@extends('layouts.master')

@section('content')

<style>
    .edit-card {
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        background: #fff;
    }
    .image-preview {
        height: 220px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
    }
</style>

<section class="py-5 bg-light border-bottom">
    <div class="container">
        <h2 class="fw-bold">Edit Blog</h2>
        <p class="text-muted">Update your blog content and image</p>
    </div>
</section>

  {{-- @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif --}}

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card edit-card shadow-sm p-4">

                <form method="POST" action="{{ route('user.blog.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- TITLE --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Blog Title</label>
                        <input type="text"
                               name="title"
                               class="form-control form-control-lg"
                               value="{{ old('title', $blog->title) }}"
                               required>
                    </div>

                    {{-- IMAGE --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Current Image</label>
                        <div class="mb-3">
                            <img src="{{ asset('uploads/'.$blog->image) }}"
                                 class="img-fluid image-preview w-100">
                        </div>

                        <label class="form-label fw-semibold">Change Image</label>
                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">
                        <small class="text-muted">
                            Leave empty to keep current image
                        </small>
                    </div>

                    {{-- CONTENT --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Blog Content</label>
                        <textarea name="description"
                                  id="editor"
                                  class="form-control"
                                  rows="8">{!! old('description', $blog->description) !!}</textarea>
                    </div>

                    {{-- ACTIONS --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('user.blog.show', $blog->id) }}"
                           class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Cancel
                        </a>

                        <button class="btn btn-primary px-4">
                            <i class="fa-solid fa-floppy-disk"></i> Update Blog
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>


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