@extends('layouts.app')

@section('title', 'Edit Category')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">
        <!-- Header -->
        @include('components.card-header', [
            'title' => 'Edit User',
            'breadcrumbs' => [
                ['text' => 'Home', 'link' => route('home'), 'active' => false],
                ['text' => 'Order', 'link' => route('order.index'), 'active' => false],
                ['text' => 'Edit', 'link' => '#', 'active' => true],
            ],
        ])
        <div class="card w-100 position-relative overflow-hidden">
            <!-- Title -->
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0 lh-sm">Edit Status Order</h5>
            </div>

            {{-- Form --}}
            <div class="card-body">
                <form action="{{ route('order.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="trx_number" class="form-label">Order ID</label>
                            <input type="text" class="form-control id="trx_number" name="trx_number" placeholder="trx_number"
                                value="{{ $order->trx_number}}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Order Status</label>
                            <select class="form-control form-select" id="status" name="status">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>PAID</option>
                                <option value="on_delivery" {{ $order->status == 'on_delivery' ? 'selected' : '' }}>ON DELIVERY</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>DELIVERED</option>
                                <option value="expired" {{ $order->status == 'expired' ? 'selected' : '' }}>EXPIRED</option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>CANCELED</option>
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary rounded px-4 mt-2">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
