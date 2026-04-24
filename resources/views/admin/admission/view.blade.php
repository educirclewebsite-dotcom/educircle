@extends('admin.layout.app')
@section('title', 'Admission-Detail')
@push('header_script')
    <link href="{{ asset('theme2/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <style>
        .datepicker {
            z-index: 1055 !important;
        }
    </style>
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">
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
                            <p><strong>Country :</strong> {{ $student->countryName->name ?? '' }}</p>
                            <p><strong>Course Preference :</strong> {{ $student->course_preference }}</p>
                            {{-- <p><strong>Course Price: ₹{{ $course->course_price ?? 'Not Available' }}</strong></p> --}}

                            <form action="{{ route('admission.storeCoursePricing') }}" method="POST">
                                @csrf


                                <input type="hidden" name="student_id" value="{{ $student->id }}">

                                <p style="color: red;"><strong>Course Price:</strong> ₹{{ $course->course_price ?? 0 }}</p>
                                <input type="hidden" name="course_price" id="course_price"
                                    value="{{ $course->course_price ?? 0 }}">



                                <div class="form-group">
                                    <label for="offer_price">Discount Price (₹)</label>
                                    <input type="number" class="form-control" name="offer_price" id="offer_price" required>
                                </div>


                                <div class="form-group">
                                    <label for="final_price">Final Offer Price (₹)</label>
                                    <input type="number" class="form-control" id="final_price" name="final_price" readonly>

                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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
                                        <a class="nav-link active" data-toggle="tab" href="#createpayment" role="tab">
                                            <span class="d-block d-sm-none"><i class="fab fa-cc-amazon-pay"></i></span>
                                            <span class="d-none d-sm-block">Create Payment</span>
                                        </a>
                                    </li>
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
                                    <div class="tab-pane active" id="createpayment" role="tabpanel">
                                        <div class="row">
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="basicpill-payment_method-input">Mode*</label>
                                                    <select class="form-control" name="payment_method"
                                                        id="basicpill-payment_method-input" required>
                                                        <option value="">Select Payment Mode</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="UPI">UPI</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="payment_date">Date*</label>
                                                    <div class="input-group">
                                                        <input type="text" name="payment_date" class="form-control"
                                                            data-provide="datepicker" data-date-format="dd-mm-yyyy"
                                                            data-date-autoclose="true" autocomplete="off" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    @error('payment_date')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="basicpill-amount-input">Amount*</label>
                                                    <input type="number" class="form-control" name="amount"
                                                        id="basicpill-amount-input" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="basicpill-remarks-input">Remarks</label>
                                                    <textarea class="form-control" name="remarks" id="basicpill-remark-input" rows="3"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-4 text-right">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
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
                                                        <th>Action</th>
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
                                                            <td>
                                                                <a href="{{ route('payments.edit', $payment->id) }}"
                                                                    class="btn btn-primary btn-sm" title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                               

                                                            </td>
                                                            
                                                            
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
@endsection

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const coursePrice = parseFloat(document.getElementById('course_price').value);
            const offerInput = document.getElementById('offer_price');
            const finalPriceInput = document.getElementById('final_price');
               finalPriceInput.value = coursePrice.toFixed(2);
            offerInput.addEventListener('input', function() {
                const offer = parseFloat(offerInput.value) || 0;
                const final = Math.max(coursePrice - offer, 0);
                finalPriceInput.value = final.toFixed(2);
            });
        });
    </script>
@endpush
