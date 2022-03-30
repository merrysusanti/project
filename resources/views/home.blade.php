@extends('layouts.admin')
@section('content')

<div class="main-card">
    <div class="header">
        Dashboard
    </div>

    <div class="body">
        @if(session('status'))
            <div class="alert success">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Admin</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/user.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Buku</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/book.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Anggota</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/group.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Peminjaman</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/loap.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Pengembalian</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/return.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Pengunjung</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/invite.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Riwayat</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/refresh.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top">
                                <h4 class="font-weight-bold">Laporan</h4>
                                <div class="row mt-3">
                                    <div class="col-6 my-auto">
                                        <img src="{{ asset('img/icon/report.png') }}" alt="" class="img-fluid" style="width: 30px; height: 30px;">
                                    </div>
                                    <div class="col-6 my-auto">
                                        <h1 class="font-weight bold">10</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="font-weight-bold">Grafik Peminjaman</h4>

                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="font-weight-bold">Grafik Pengunjung</h4>

                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
