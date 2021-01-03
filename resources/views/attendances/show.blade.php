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
                                <li class="breadcrumb-item"><a href="/attendances">Attendance</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{date('d F Y',strtotime($attendance->date))}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" data-target="#edit-attendance" data-toggle="modal" class="btn btn-sm btn-neutral">
                            <i class="fa fa-plus"></i> Edit
                        </a>
                    </div>
                    @include('attendances.edit-attendance')
                </div>
                {{-- @include('partials.dashboard-stats') --}}
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center pt-3 pb-0">
                        <h5 class="card-title text-white"><?php echo date('F'); ?></h5>
                        <h5 class="card-title text-white"><?php echo date('Y'); ?></h5>
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
                                        @if (in_array($key, $holidays) && $day == date('d', strtotime($attendance->date)))
                                            <a class='day text-white bg-danger mt-3 px-1' href="{{ route('attendances.show', date('Y-m-' . $day)) }}">
                                               {{ $day }}
                                            </a>
                                        @elseif ($day == date('d', strtotime($attendance->date)))
                                            <a class='day text-white bg-primary text-center mt-3 px-1' href="{{ route('attendances.show', date('Y-m-' . $day)) }}">
                                                {{ $day }}
                                            </a>
                                        @elseif (in_array($key, $holidays))
                                            <a class='day text-danger text-center mt-3 px-1'  href="{{ route('attendances.show', date('Y-m-' . $day)) }}">
                                                {{ $day }}
                                            </a>
                                        @else
                                            <a class='day text-center mt-3 px-1' href="{{ route('attendances.show', date('Y-m-' . $day)) }}">
                                                {{ $day }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <hr class="my-0">
                            @endforeach
                        </div>
                        <div class="text-muted pt-3">
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
                                    Attendance of {{date('d F Y',strtotime($attendance->date))}}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="name">Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @if ($attendances)
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('users.show', $attendance->user->id_card) }}">
                                                    <div class="media align-items-center">
                                                        <div class="avatar rounded-circle bg-default mr-3">
                                                            <img alt="{{ $attendance->user->name }}"
                                                                src="{{ $attendance->user->image }}">
                                                        </div>
                                                        <div class="media-body">
                                                            <span
                                                                class="name mb-0 text-sm d-block">{{ $attendance->user->name }}</span>
                                                            <small class="text-muted">
                                                                {{ $attendance->user->title }}
                                                                {{ $attendance->user->level ? 'Level ' . $attendance->user->level : '' }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </th>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="{{ $attendance->LED }}"></i>
                                                    <span class="status">{{ $attendance->status }}</span>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr colspan="3">
                                        <td></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
