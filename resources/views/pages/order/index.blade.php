@extends('layouts.app')

@section('title', 'Order')

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
                ['text' => 'Order', 'link' => '#', 'active' => true],
            ],
        ])

        <div class="card card-body">
            {{-- Create --}}
            <div class="d-flex justify-content-between align-items-center mb-9">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>

            {{-- Table --}}
            <div class="table-responsive border rounded">
                <table class="table align-middle text-nowrap mb-0">
                    <thead class="text-dark fs-4">
                        <tr class="fw-semibold">
                            <th>ID Order</th>
                            <th>Name</th>
                            <th>Total Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @forelse($orders as $order)
                            <tr>
                                <td>
                                    <p class="mb-0 fs-3">{{ $order->trx_number }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ $order->user->name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ 'Rp ' . number_format($order->grand_total, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ $order->created_at }}</p>
                                </td>
                                <td>
                                    @if ($order->status == 'paid')
                                        <span
                                            class="badge fw-semibold py-1 w-50 bg-success-subtle text-success">{{ strtoupper($order->status) }}</span>
                                    @elseif ($order->status == 'pending')
                                        <span
                                            class="badge fw-semibold py-1 bg-warning-subtle text-warning">{{ strtoupper($order->status) }}</span>
                                    @elseif ($order->status == 'expired')
                                        <span
                                            class="badge fw-semibold py-1 bg-danger-subtle text-danger">{{ strtoupper($order->status) }}</span>
                                    @else
                                        <span
                                            class="badge fw-semibold py-1 bg-primary-subtle text-primary">{{ strtoupper($order->status) }}</span>
                                    @endif

                                </td>
                                <td class="text-center">
                                    <div class="dropdown dropstart">
                                        <a href="#" class="text-muted" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots fs-6"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="{{ route('order.show', $order->id) }}"
                                                    class="dropdown-item d-flex align-items-center gap-3">
                                                    <i class="fs-4 ti ti-eye"></i>
                                                    Show
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('order.edit', $order->id) }}"
                                                    class="dropdown-item d-flex align-items-center gap-3">
                                                    <i class="fs-4 ti ti-edit"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('order.destroy', $order->id) }}" method="POST">
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
                        @empty
                            <tr>
                                <td colspan="5" class="text-center mb-0 fs-4 fw-semibold">
                                    Order Data is Empty
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginate --}}
            <div class="float-right mt-8">
                {{ $orders->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
