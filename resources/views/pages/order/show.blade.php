@extends('layouts.app')

@section('title', 'Detail Order')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">


        <!-- Alert -->
        @include('layouts.alert')

        <!-- Header -->
        @include('components.card-header', [
            'title' => 'Orders',
            'breadcrumbs' => [
                ['text' => 'Home', 'link' => route('home'), 'active' => false],
                ['text' => 'Order', 'link' => route('order.index'), 'active' => false],
                ['text' => 'Detail', 'link' => '#', 'active' => true],
            ],
        ])

        <div class="card card-body">
            {{-- Create --}}
            <div class="d-flex justify-content-between align-items-center mb-9">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
                @if ($order->status == 'pending')
                    <button
                    class="btn bg-danger-subtle text-danger d-flex align-items-center">{{ strtoupper($order->status) }}</button>
                @else
                    <button
                    class="btn bg-success-subtle text-success d-flex align-items-center">{{ strtoupper($order->status) }}</button>
                @endif
            </div>

            {{-- Table --}}
            <div class="table-responsive border rounded">
                <table class="table align-middle text-nowrap mb-0">
                    <thead class="text-dark fs-4">
                        <tr class="fw-semibold">
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img src="{{ $item->product->galleries->first()->image_url ?? asset('assets/images/logos/place.png') }}" class="rounded-2" width="48"
                                                height="48" alt="" />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">{{ $item->product->name }}</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                {{ $item->product->category->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ 'Rp ' . number_format($item->product->price, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ $item->quantity }} pcs</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">
                                        {{ 'Rp ' . number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Tambahkan baris shipping dan total di sini -->
                        {{-- <tr>
                            <td colspan="3" class="text-end fs-4 fw-semibold">Address</td>
                            <td class="fs-4 fw-semibold">
                                {{ $order->address->full_address }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fs-4 fw-semibold">Payment</td>
                            <td class="fs-4 fw-semibold">
                                {{ strtoupper($order->payment_va_name) }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" class="text-end fs-4 fw-semibold">VA Number</td>
                            <td class="fs-4 fw-semibold">
                                {{ $order->payment_va_number }}
                            </td>
                        </tr> --}}
                        <tr>
                            <td colspan="3" class="text-end fs-4 fw-semibold">Total Price</td>
                            <td class="fs-4 fw-semibold">
                                {{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fs-4 fw-semibold">Shipping Cost</td>
                            <td class="fs-4 fw-semibold">
                                {{ 'Rp ' . number_format($order->shipping_cost, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fs-4 fw-semibold">Grand Total</td>
                            <td class="fs-4 fw-semibold">
                                {{ 'Rp ' . number_format($order->grand_total, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
