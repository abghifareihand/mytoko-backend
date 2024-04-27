@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">


        <!-- Alert -->
        @include('layouts.alert')

        <!-- Header -->
        @include('components.card-header', [
            'title' => 'Products',
            'breadcrumbs' => [
                ['text' => 'Home', 'link' => route('home'), 'active' => false],
                ['text' => 'Product', 'link' => '#', 'active' => true],
            ],
        ])
        <div class="card card-body">
            {{-- Create --}}
            <div class="d-flex justify-content-between align-items-center mb-9">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
                <a href="{{ route('product.create') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-plus text-white me-1 fs-5"></i>
                    Create Product
                </a>
            </div>

            {{-- Table --}}
            <div class="table-responsive border rounded">
                <table class="table align-middle text-nowrap mb-0">
                    <thead class="text-dark fs-4">
                        <tr class="fw-semibold">
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img src="{{ $product->galleries->first()->image_url ?? asset('assets/images/logos/place.png') }}"
                                                class="rounded-2" width="48" height="48" alt="" />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">{{ $product->name }}</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                {{ $product->category->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ $product->stock }} pcs</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
                                </td>



                                <td class="text-center">
                                    <div class="dropdown dropstart">
                                        <a href="#" class="text-muted" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots fs-6"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="" class="dropdown-item d-flex align-items-center gap-3">
                                                    <i class="fs-4 ti ti-eye"></i>
                                                    Show
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="dropdown-item d-flex align-items-center gap-3">
                                                    <i class="fs-4 ti ti-edit"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="dropdown-item d-flex align-items-center gap-3">
                                                        <i class="fs-4 ti ti-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginate --}}
            <div class="float-right mt-8">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
