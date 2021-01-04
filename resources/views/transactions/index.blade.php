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
                                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="/payslips/create" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> Pay</a>
                    </div>
                </div>
                {{-- @include('partials.dashboard-stats') --}}
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Income</h5>
                                <span class="h2 font-weight-bold mb-0">
                                    MVR {{number_format($this_month_income/100, 2)}}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="{{($percentage_income > 0) ? 'text-success' : 'text-danger' }} mr-2">
                                <i class="fa {{($percentage_income > 0) ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                {{number_format($percentage_income, 2)}}%
                            </span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>                    
                </div>
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Expenses</h5>
                                <span class="h2 font-weight-bold mb-0">
                                    MVR {{number_format($this_month_expense/100, 2)}}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="{{($percentage_expense > 0) ? 'text-danger' : 'text-success' }} mr-2">
                                <i class="fa {{($percentage_expense > 0) ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                {{ number_format($percentage_expense, 2) }}%
                            </span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>                    
                </div>
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Balance</h5>
                                <span class="h2 font-weight-bold mb-0">
                                    MVR {{number_format(( $running_balance )/100, 2)}}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="{{($percentage_profit > 0) ? 'text-success' : 'text-danger' }} mr-2">
                                <i class="fa {{($percentage_profit > 0) ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                {{ number_format($percentage_profit, 2)}}%
                            </span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>                    
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Financial Management</h6>
                                <h5 class="h3 text-primary mb-0"><i class="ni ni-money-coins"></i> Transaction History</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Date</th>
                                    <th scope="col" class="sort" data-sort="status">Title</th>
                                    <th scope="col" class="sort" data-sort="status">Amount</th>
                                    <th scope="col" class="sort" data-sort="status">Balance</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @if (count($transactions))
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                {{ date('d-m-Y', strtotime($transaction->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $transaction->title }}
                                            </td>
                                            <td class="{{($transaction->income) ? 'text-success' : 'text-danger'}}">
                                                MVR {!! number_format($transaction->amount / 100, 2) !!}
                                            </td>
                                            <td class="budget">
                                                <i class="{{($transaction->income) ? 'text-success fa fa-caret-up' : 'text-danger fa fa-caret-down'}} mr-1"></i> 
                                               MVR {!! number_format($transaction->balance / 100, 2) !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr colspan="7">No Payslips to display</tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 d-flex justify-content-end">
                        {{ $transactions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
