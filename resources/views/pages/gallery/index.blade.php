@extends('layouts.app')

@section('title', 'Gallery')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">


        <!-- Alert -->
        @include('layouts.alert')

        <!-- Header -->
        @include('components.card-header', [
            'title' => $product->name,
            'breadcrumbs' => [
                ['text' => 'Home', 'link' => route('home'), 'active' => false],
                ['text' => 'Product', 'link' => route('product.index'), 'active' => false],
                ['text' => 'Gallery', 'link' => '#', 'active' => true],
            ],
        ])
        <div class="card card-body">
            {{-- Create --}}
            <div class="d-flex justify-content-end align-items-center mb-9">
                <a href="{{ route('product.gallery.create', $product->id) }}" class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-plus text-white me-1 fs-5"></i>
                    Upload Image
                </a>
            </div>

            {{-- Gallery --}}
            <div class="row">
                @foreach ($gallery as $item)
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <img src="{{ $item->image_url }}" class="rounded-2" height="200" alt="" />
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Table --}}
            {{-- <div class="table-responsive border rounded">
                <table class="table align-middle text-nowrap mb-0">
                    <thead class="text-dark fs-4">
                        <tr class="fw-semibold">
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @foreach ($gallery as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img src="{{ $item->image_url }}" class="rounded-2" width="140"
                                                height="140" alt="" />
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
