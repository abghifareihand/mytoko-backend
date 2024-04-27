@extends('layouts.app')

@section('title', 'User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">


        <!-- Alert -->
        @include('layouts.alert')

        <!-- Header -->
        @include('components.card-header', [
            'title' => 'Users',
            'breadcrumbs' => [
                ['text' => 'Home', 'link' => route('home'), 'active' => false],
                ['text' => 'User', 'link' => '#', 'active' => true],
            ],
        ])
        <div class="card card-body">
            {{-- Create --}}
            <div class="d-flex justify-content-between align-items-center mb-9">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search"
                        placeholder="Search...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
                <a href="{{ route('user.create') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-plus text-white me-1 fs-5"></i>
                    Create User
                </a>
            </div>

            {{-- Table --}}
            <div class="table-responsive border rounded">
                <table class="table align-middle text-nowrap mb-0">
                    <thead class="text-dark fs-4">
                        <tr class="fw-semibold">
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                class="rounded-circle" width="48" height="48" alt="" />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                                            <p class="fs-2 mb-0 text-muted">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ $user->phone }}</p>
                                </td>
                                <td>
                                    @if ($user->role == 'ADMIN')
                                        <span
                                            class="badge fw-semibold py-1 w-50 bg-primary-subtle text-primary">{{ $user->role }}</span>
                                    @else
                                        <span
                                            class="badge fw-semibold py-1 w-50 bg-danger-subtle text-danger">{{ $user->role }}</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($user->role != 'ADMIN')
                                        <div class="dropdown dropstart">
                                            <a href="#" class="text-muted" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots fs-6"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="dropdown-item d-flex align-items-center gap-3">
                                                        <i class="fs-4 ti ti-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('user.destroy', $user->id) }}"
                                                        method="POST">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                                        <button class="dropdown-item d-flex align-items-center gap-3">
                                                            <i class="fs-4 ti ti-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="text-muted">
                                            <i class="ti ti-eye fs-6"></i>
                                        </div>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginate --}}
            <div class="float-right mt-8">
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
