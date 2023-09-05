@extends('layouts.shop')
@section('content')
    <section class="wrapper bg-gray image-wrapper bg-image bg-cover" data-image-src="{{ asset('/assets/img/brand.jpg') }}">
        <div class="container py-12 py-md-16 text-center">
            <div class="row">
                <div class="col-lg-10 col-xxl-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">Process</h1>
                    {{-- <p class="lead mb-1 text-white">{{$subtitle}}</p> --}}
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row align-items-center mb-10 position-relative zindex-1">
                <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
                    <h2 class="display-6">Process untukmu</h2>
                    <nav class="d-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            {{-- <li class="breadcrumb-item" aria-current="page">Shop</li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Process</li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">

                    @foreach ($process as $p)
                        <div class="project item col-md-6 col-xl-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                  <h5 class="card-title">{{$p->name}}</h5>
                                  <a href="{{ route('sub_processes.show', $p->id) }}" class="btn btn-primary">Lihat Proses Pengolahan</a>
                                </div>
                              </div>
                            <!-- /.post-header -->
                        </div>
                        <!-- /.item -->
                    @endforeach
                </div>
                <!-- /.row -->
            </div>
            <!-- /.grid -->
            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
@endsection
