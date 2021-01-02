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
                                <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{-- url()->previous() --}}"
                            class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i>
                            Add</a>
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
                    <div class="card-header bg-primary d-flex justify-content-between pt-2 pb-0">
                        <h4 class="card-title text-white"><?php echo date('F'); ?></h4>
                        <h4 class="card-title text-white"><?php echo date('Y'); ?></h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-between px-2">
                            <span>S</span>
                            <span>M</span>
                            <span>T</span>
                            <span>W</span>
                            <span>T</span>
                            <span class="text-danger">F</span>
                            <span class="text-danger">S</span>
                        </div>
                        <hr class="my-0">
                        <div>
                            @foreach ($weeks as $week => $days)
                                <div class="d-flex justify-content-between px-2">
                                    @foreach ($days as $key => $day)
                                        @if (in_array($key, $holidays) && $day == date('d'))
                                            <span class='day text-white bg-danger mt-3 px-1'>{{ $day }}</span>
                                        @elseif ($day == date('d'))
                                            <span class='day text-white bg-primary text-center mt-3 px-1'>{{ $day }}</span>
                                        @elseif (in_array($key, $holidays))
                                            <span class='day text-danger text-center mt-3 px-1'>{{ $day }}</span>
                                        @else
                                            <span class='day text-center mt-3 px-1'>{{ $day }}</span>
                                        @endif
                                    @endforeach
                                </div>
                                <hr class="my-0">
                            @endforeach
                        </div>
                        <div class="text-muted">
                            <h6><?php echo date('l, d F Y'); ?> </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1" id="printable">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Human Resource Management</h6>
                                <h5 class="h3 text-primary mb-0">
                                    <i class="ni ni-money-coins"></i>
                                    Attendance
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
