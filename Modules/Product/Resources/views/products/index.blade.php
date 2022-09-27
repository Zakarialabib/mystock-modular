@extends('layouts.app')

@section('title', 'Products')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <a href="{{ route('products.create') }}" class="btn btn-primary">
                            create
                        </a> --}}
                        <button type="button" wire:click="$emit('showModal', 'auth.profile-update')" class="btn btn-primary">
                            Add Product <i class="bi bi-plus"></i>
                        </button>
                        <hr>
                        
                        <livewire:product::products.product-page />
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')

@endpush
