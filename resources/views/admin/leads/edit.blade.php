@extends('admin.layout.app')
@section('title', 'Edit Lead')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Lead</h4>
                        <a href="{{ route('lead.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('lead.update', $lead->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $lead->name }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ $lead->email }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="contact_number" value="{{ $lead->contact_number }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label>Whatsapp Number</label>
                                        <input type="text" name="whatsapp_number" value="{{ $lead->whatsapp_number }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Subject</label>
                                        <input type="text" name="subject" value="{{ $lead->subject }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" rows="4">{{ $lead->message }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Update Lead</button>
                               
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
