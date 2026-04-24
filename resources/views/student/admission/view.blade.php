@extends('student.layout.app')
@section('title', 'Student Detail')
@push('header_script')
    <link href="{{ asset('theme2/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            @if (is_null($student))
                <div class="alert alert-warning">
                    <h4>Please fill in your profile details</h4>
                    <p>Your profile is incomplete. Kindly update your information to proceed with the admission process.</p>
                </div>
            @elseif ($student->status == 'new')
                <div class="alert alert-info">
                    <h4>Your profile is currently under review</h4>
                    <p>Please check back later once your profile has been processed. You'll be able to view all admission
                        details once your status changes to "In Process" or "Admission".</p>
                </div>
            @else
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-white text-white text-start py-3">
                                <h4 class="mb-0 fw-bold">Student Details</h4>
                            </div>

                            <div class="card-body">
                                <p><strong>Name :</strong> {{ $student->name }}</p>
                                <p><strong>Email :</strong> {{ $student->user->email }}</p>
                                <p><strong>City :</strong> {{ $student->city }}</p>
                                <p><strong> Gender :</strong> {{ $student->gender }}</p>
                                <p><strong>Course Preference :</strong> {{ $student->course_preference }}</p>
                                <p><strong>Course Price: ₹{{ $course->course_price ?? 'Not Available' }}</strong></p>
                                <p><strong> Final Offer Price: ₹{{ $student->final_price ?? 'Not Available' }}</strong></p>

                                <p><strong>Country :</strong> {{ $student->countryName->name ?? '' }}</p>
                                @php
                                    $statusColors = [
                                        'in process' => 'warning',
                                        'admission' => 'success',
                                    ];
                                    $color = $statusColors[$student->status] ?? 'secondary';
                                @endphp

                                <p>
                                    <strong>Status :</strong>
                                    <span class="badge badge-soft-{{ $color }} font-size-12">
                                        {{ ucfirst($student->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#payment" role="tab">
                                                <span class="d-block d-sm-none"><i class=" dripicons-wallet"></i></span>
                                                <span class="d-none d-sm-block">Payment</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#passportdetail" role="tab">
                                                <span class="d-block d-sm-none"><i class=" dripicons-user-id"></i></span>
                                                <span class="d-none d-sm-block">Passport detail</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#document" role="tab">
                                                <span class="d-block d-sm-none"><i class="dripicons-copy"></i></span>
                                                <span class="d-none d-sm-block">Document</span>
                                            </a>
                                        </li>
                                    </ul>


                                    <div class="tab-content p-3 text-muted">

                                        <div class="tab-pane" id="payment" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th> Mode</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Remark</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($student->studentPayments as $index => $payment)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $payment->payment_method }}</td>
                                                                <td>{{ $payment->amount }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y') }}
                                                                </td>
                                                                <td>{{ $payment->remarks ?? '-' }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="text-center">No payment records
                                                                    found.
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                        <div class="tab-pane" id="passportdetail" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Passport Number</th>
                                                            <td>{{ $passport->passport_number ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Place of Issue</th>
                                                            <td>{{ $passport->place_of_issue ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Issue Date</th>
                                                            <td>{{ \Carbon\Carbon::parse($passport->issue_date)->format('d-m-Y') ?? 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Valid Till</th>
                                                            <td>{{ \Carbon\Carbon::parse($passport->valid_till)->format('d-m-Y') ?? 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name on Passport</th>
                                                            <td>{{ $passport->name_on_passport ?? 'N/A' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="document" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>10th Marksheet</th>
                                                            <td>
                                                                @if (!empty($documents['marksheet_10th']))
                                                                    <a href="{{ asset('storage/documents/' . $documents['marksheet_10th']) }}"
                                                                        target="_blank">View File</a>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Resume</th>
                                                            <td>
                                                                @if (!empty($documents['resume']))
                                                                    <a href="{{ asset('storage/documents/' . $documents['resume']) }}"
                                                                        target="_blank">View File</a>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Photo</th>
                                                            <td>
                                                                @if (!empty($documents['photo']))
                                                                    <a href="{{ asset('storage/documents/' . $documents['photo']) }}"
                                                                        target="_blank">View File</a>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Passport</th>
                                                            <td>
                                                                @if (!empty($documents['passport']))
                                                                    <a href="{{ asset('storage/documents/' . $documents['passport']) }}"
                                                                        target="_blank">View File</a>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
    @endif
@endsection

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush
