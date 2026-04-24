@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Admin Dashboard</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="row">

                        <div class="col-md-3">
                            <a href="{{ route('student.index') }}" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">New Students</p>
                                                <h4 class="mb-0">{{ $newStudents }}</h4>
                                            </div>
                                            <div class="text-primary">
                                                <i class="ri-user-add-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="badge badge-soft-success font-size-11">This Year</span>
                                            <span class="text-muted ml-2"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                     
                        <div class="col-md-3">
                            <a href="{{ route('application.index', ['status' => 'pending']) }}"
                                class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Pending Applications</p>
                                                <h4 class="mb-0">{{ $inprocessStudents }}</h4>
                                            </div>
                                            <div class="text-warning">
                                                <i class="ri-time-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="badge badge-soft-warning font-size-11">This Year</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                     
                        <div class="col-md-3">
                            <a href="{{ route('application.index', ['status' => 'completed']) }}"
                                class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Completed Applications</p>
                                                <h4 class="mb-0">{{ $completedApplications }}</h4>
                                            </div>
                                            <div class="text-success">
                                                <i class="ri-check-double-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="badge badge-soft-success font-size-11">This Year</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-3">
                            <a href="{{ route('lead.index') }}" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Leads</p>
                                                <h4 class="mb-0">{{ $leadsCount ?? 0 }}</h4>
                                            </div>
                                            <div class="text-primary">
                                                <i class="ri-lightbulb-flash-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="badge badge-soft-info font-size-11">This Year</span>
                                            <span class="text-muted ml-2"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Leads</h4>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Subject</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leads as $index => $lead)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>

                                                <td>
                                                    <a href="{{ route('lead.edit', $lead->id) }}">
                                                        {{ $lead->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $lead->email ?? '-' }}</td>
                                                <td>{{ $lead->contact_number ?? '-' }}</td>
                                                <td>{{ $lead->subject ?? '-' }}</td>
                                                <td>{{ $lead->created_at->format('d-m-y') }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- {{ $leads->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
