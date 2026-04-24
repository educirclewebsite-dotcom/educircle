@extends('admin.layout.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Payment</h4>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="student_id" value="{{ $payment->student_id }}">

                                <div class="mb-3">
                                    <label for="basicpill-payment_method-input" class="form-label">Mode *</label>
                                    <select class="form-control" name="payment_method" id="basicpill-payment_method-input" required>
                                        <option value="">Select Payment Mode</option>
                                        <option value="Cash" {{ $payment->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="UPI" {{ $payment->payment_method == 'UPI' ? 'selected' : '' }}>UPI</option>
                                    </select>
                                    @error('payment_method')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="payment_date" class="form-label">Date *</label>
                                    <div class="input-group">
                                        <input type="text" name="payment_date" class="form-control"
                                            data-provide="datepicker" data-date-format="dd-mm-yyyy"
                                            data-date-autoclose="true" autocomplete="off"
                                            value="{{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y') }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                    @error('payment_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="basicpill-amount-input" class="form-label">Amount *</label>
                                    <input type="number" class="form-control" name="amount"
                                        id="basicpill-amount-input" value="{{ $payment->amount }}" required>
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="basicpill-remarks-input" class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="basicpill-remark-input" rows="3">{{ $payment->remarks }}</textarea>
                                    @error('remarks')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Update Payment</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
