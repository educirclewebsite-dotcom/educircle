@extends('admin.layout.app')
@section('title', 'Partner Logos')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Partner Logos</h4>
                        <a href="{{ route('partner-logos.create') }}" class="btn btn-primary">
                            <i class="ri-add-line mr-1"></i> Add New Partner Logo
                        </a>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="80">Order</th>
                                            <th width="100">Logo</th>
                                            <th>Name</th>
                                            <th>Alt Text</th>
                                            <th width="100">Status</th>
                                            <th width="150">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($partnerLogos as $logo)
                                            <tr>
                                                <td class="text-center">{{ $logo->display_order }}</td>
                                                <td>
                                                    <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->alt_text }}" 
                                                         class="img-thumbnail" style="max-height: 50px;">
                                                </td>
                                                <td>{{ $logo->name }}</td>
                                                <td>{{ $logo->alt_text }}</td>
                                                <td>
                                                    @if($logo->is_active)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-secondary">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('partner-logos.edit', $logo->id) }}" 
                                                       class="btn btn-sm btn-primary" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    <form action="{{ route('partner-logos.destroy', $logo->id) }}" 
                                                          method="POST" class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this partner logo?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No partner logos found. 
                                                    <a href="{{ route('partner-logos.create') }}">Add your first partner logo</a>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
