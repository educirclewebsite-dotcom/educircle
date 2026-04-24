@extends('admin.layout.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h4>Edit Lead</h4>

        <form action="{{ route('leads.update', $lead->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $lead->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (optional)</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $lead->email) }}">
            </div>

            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number (optional)</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $lead->contact_number) }}">
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject (optional)</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject', $lead->subject) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Lead</button>
            <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
