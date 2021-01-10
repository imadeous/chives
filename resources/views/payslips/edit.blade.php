@extends('layouts.dashboard')

@section('content')
    <div class="header bg-success pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/payslips">Payslips</a></li>
                                <li class="breadcrumb-item">Edit Payslip</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-neutral"><i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
                {{-- @include('partials.dashboard-stats') --}}
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 offset-lg-2">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Human Resource Mnagement</h6>
                                <h5 class="h3 text-primary mb-0">
                                    <i class="ni ni-money-coins"></i>
                                    Payslip
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payslips.update', $payslip) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Employee ID Card Number</label>
                                <select name="user_id" id="" class="custom-select">
                                    <option value="{{ $payslip->user->id }}">
                                        {{ $payslip->user->title . ' Level ' . $payslip->user->level . ' ' . $payslip->user->name }}
                                    </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->title . ' Level ' . $user->level . ' ' . $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Payment Type</label>
                                <select name="type" id="" class="custom-select">
                                    <option value="{{ $payslip->type }}">{{ $payslip->type }}</option>
                                    <option value="Salary">Salary</option>
                                    <option value="Salary">Bonus</option>
                                    <option value="Salary">Compensation</option>
                                    <option value="Salary">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Amount Due</label>
                                <input type="text" class="form-control" name="amount" value="{{ $payslip->amount }}">
                            </div>
                            <div class="form-group">
                                <label for="">Service Charge</label>
                                <input type="text" class="form-control" name="service_charge"
                                    value="{{ $payslip->service_charge }}">
                            </div>
                            <div class="form-group">
                                <label for="">Date of Payment
                                    <small class="d-block text-muted">Please leave blank if filling the form on the date of
                                        payment</small>
                                </label>
                                <input type="date" class="form-control" max='{{ date('Y-m-d') }}' name="paid_on"
                                    value="{{ $payslip->paid_on }}">
                            </div>
                            <div class="form-group">
                                <label for="">Remarks</label>
                                <textarea class="form-control" name="remarks" rows="6"
                                    placeholder="Write a short note about the payment for future reference">{{ $payslip->remarks }}</textarea>
                            </div>
                            <hr class="my-4" />
                            <div class="pl-lg-4 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
