@extends('layouts.shop')
@section('content')
    <section class="wrapper bg-gray image-wrapper bg-image bg-cover" data-image-src="{{ asset('/assets/img/brand.jpg') }}">
        <div class="container py-12 py-md-16 text-center">
            <div class="row">
                <div class="col-lg-10 col-xxl-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">Brand</h1>
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
                    <h2 class="display-6">Brand untukmu</h2>
                    <nav class="d-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            {{-- <li class="breadcrumb-item" aria-current="page">Shop</li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Brand</li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">

                    @foreach ($brand as $b)
                        <div class="project item col-md-6 col-xl-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/assets/img/brands/'.$b->image.'') }}" class="card-img-top" alt="2x">
                                <div class="card-body">
                                  <h5 class="card-title">{{$b->name}}</h5>
                                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                  <a href="#" class="btn btn-primary">Lihat Produk</a>
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
