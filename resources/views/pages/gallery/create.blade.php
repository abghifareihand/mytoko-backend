@extends('layouts.app')

@section('title', 'Create Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">
        <!-- Header -->
        @include('components.card-header', [
            'title' => 'Create Product',
            'breadcrumbs' => [
                ['text' => 'Home', 'link' => route('home'), 'active' => false],
                ['text' => 'Product', 'link' => route('product.index'), 'active' => false],
                ['text' => 'Gallery', 'link' => route('product.gallery.index', $product->id), 'active' => false],
                ['text' => 'Create', 'link' => '#', 'active' => true],
            ],
        ])
        <div class="card w-100 position-relative overflow-hidden">
            <!-- Title -->
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0 lh-sm">Create Product</h5>
            </div>

            {{-- Form --}}
            <div class="card-body">
                <form action="{{ route('product.gallery.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image Product</label>
                        <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url"
                            name="files[]" accept="image/png, image/jpeg" required>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary rounded px-4 mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

@endpush
