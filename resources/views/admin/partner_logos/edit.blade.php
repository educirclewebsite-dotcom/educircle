@extends('admin.layout.app')
@section('title', 'Edit Partner Logo')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Partner Logo</h4>
                        <a href="{{ route('partner-logos.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line mr-1"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('partner-logos.update', $partnerLogo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Partner Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name', $partnerLogo->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Current Logo</label>
                                    <div class="mb-3">
                                        <img src="{{ asset($partnerLogo->logo_path) }}" alt="{{ $partnerLogo->alt_text }}"
                                            class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="logo">Replace Logo (Optional)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                                            id="logo" name="logo" accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose file</label>
                                    </div>
                                    @error('logo')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Leave blank to keep current logo. Recommended: PNG, JPG, JPEG, SVG. Max size: 2MB
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="alt_text">Alt Text</label>
                                    <input type="text" class="form-control @error('alt_text') is-invalid @enderror"
                                        id="alt_text" name="alt_text" value="{{ old('alt_text', $partnerLogo->alt_text) }}"
                                        placeholder="Leave blank to use partner name">
                                    @error('alt_text')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Alt text for accessibility (optional)
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="display_order">Display Order <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                                        id="display_order" name="display_order"
                                        value="{{ old('display_order', $partnerLogo->display_order) }}" min="0" required>
                                    @error('display_order')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Lower numbers appear first
                                    </small>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                            {{ old('is_active', $partnerLogo->is_active) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                    <small class="form-text text-muted">
                                        Only active logos will be displayed on the website
                                    </small>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line mr-1"></i> Update Partner Logo
                                    </button>
                                    <a href="{{ route('partner-logos.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('footer_script')
    <script>
        // Update file input label with selected filename
        $('.custom-file-input').on('change', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
@endpush