@extends('layouts.shop')

@section('title', 'Home | Plastic Store')

@section('content')

    <section class="wrapper bg-gradient-primary">
        <div class="container pt-10 pt-md-14">
            <div class="row gx-2 gy-10 align-items-center">
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start order-2 order-lg-0"
                    data-cues="slideInDown" data-group="page-title" data-delay="600">
                    <h1 class="display-1 mb-5 mx-md-10 mx-lg-0">Selamat datang di Plastic Store, tempat Anda menemukan
                        produk biji plastik atau palet plastik sesuai dengan kebutuhan Anda <br> <span class="typer text-primary text-nowrap" data-delay="100"
                            data-words="PE - Polyethylene.,PP - Polypropylene.,PS - Polystyrene.,PET - Polyethylene Terephthalate.,
                            PC - Polycarbonate.,NYLON.,ABS - Acrylonitrile Butadiene Styrene.,EVA.,PVC.,Film."></span><span class="cursor text-primary"
                            data-owner="typer"></span></h1>
                    {{-- <p class="lead fs-23 mb-7">Jadikan penampilan Anda tak terlupakan dengan pilihan fashion eksklusif yang
                        akan meningkatkan gaya Anda ke level berikutnya.</p> --}}
                    <div class="d-flex justify-content-center justify-content-lg-start mb-4" data-cues="slideInDown"
                        data-group="page-title-buttons" data-delay="900">
                        <span><a class="btn btn-lg btn-primary rounded-pill me-2 scroll"
                                href="#demos">Lihat Semua Product</a></span>
                    </div>
                </div>
                <!-- /column -->
                <div class="col-lg-6 ms-auto position-relative">
                    <div class="row g-4">
                        <div class="col-4 d-flex flex-column ms-auto" data-cues="fadeIn" data-group="col-start"
                            data-delay="900">
                            <div class="ms-auto mt-6"><img class="img-fluid rounded shadow-lg"
                                    src="{{ asset('assets/img/home1.jpg') }}"
                                    srcset="{{ asset('assets/img/home1.jpg') }} 2x" alt="" /></div>
                            <div class="ms-auto mt-4"><img class="img-fluid rounded shadow-lg"
                                    src="{{ asset('assets/img/home9.jpg') }}"
                                    srcset="{{ asset('assets/img/home9.jpg') }} 2x" alt="" /></div>
                            <div class="ms-auto mt-4"><img class="img-fluid rounded shadow-lg"
                                    src="{{ asset('assets/img/home10.jpg') }}"
                                    srcset="{{ asset('assets/img/home10.jpg') }} 2x" alt="" /></div>
                        </div>
                        <!-- /column -->
                        <div class="col-4" data-cues="fadeIn" data-group="col-middle">
                            <div><img class="w-100 img-fluid rounded shadow-lg" src="{{ asset('assets/img/home4.jpg') }}"
                                    srcset="{{ asset('assets/img/home4.jpg') }} 2x" alt="" /></div>
                            <div><img class="w-100 img-fluid rounded shadow-lg mt-4"
                                    src="{{ asset('assets/img/home7.jpg') }}"
                                    srcset="{{ asset('assets/img/home7.jpg') }} 2x" alt="" /></div>
                            <div><img class="img-fluid rounded shadow-lg mt-4" src="{{ asset('assets/img/home5.jpg') }}"
                                    srcset="{{ asset('assets/img/home5.jpg') }} 2x" alt="" /></div>
                        </div>
                        <!-- /column -->
                        <div class="col-4 d-flex flex-column" data-cues="fadeIn" data-group="col-end" data-delay="900">
                            <div class="mt-8"><img class="img-fluid rounded shadow-lg"
                                    src="{{ asset('assets/img/home6.jpg') }}"
                                    srcset="{{ asset('assets/img/home6.jpg') }} 2x" alt="" /></div>
                            <div class="mt-4"><img class="img-fluid rounded shadow-lg"
                                    src="{{ asset('assets/img/home8.jpg') }}"
                                    srcset="{{ asset('assets/img/home8.jpg') }} 2x" alt="" /></div>
                            <div class="mt-4 mb-10"><img class="img-fluid rounded shadow-lg"
                                    src="{{ asset('assets/img/home2.jpg') }}"
                                    srcset="{{ asset('assets/img/home2.jpg') }} 2x" alt="" /></div>
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="wrapper bg-soft-primary">
        <div class="container pt-5 pb-15 py-lg-17 py-xl-19 pb-xl-20 position-relative">
            <img class="position-lg-absolute  rounded"
                src="{{ asset('assets/img/pria.jpg') }}"
                srcset="{{ asset('assets/img/pria.jpg') }} 2x" data-cue="fadeIn" alt=""
                style="top: -1%; left: -21%;" />
            <div class="row gx-0 align-items-center">
                <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-10 offset-xxl-7 ps-xxl-12 mt-md-n9 text-center text-lg-start"
                    data-cues="slideInDown" data-group="page-title" data-delay="600">
                    <h1 class="display-2 mb-4 mx-sm-n2 mx-md-0">Categories.</h1>
                    <p class="lead fs-lg mb-7 px-md-10 px-lg-0">Menyediakan berbagai macam kategori biji plastik atau palet plastik yang Anda butuhkan, seperti PE - Polyethylene ,PP - Polypropylene ,PS - Polystyrene, dan sebagainya. </p>
                    <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown"
                        data-group="page-title-buttons" data-delay="900">
                        <span><a class="btn btn-primary btn-icon btn-icon-start rounded-pill me-2"
                                href="{{ url('categories') }}">
                                Categories</a></span>
                    </div>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="wrapper bg-light">
        <div class="container pt-8 pt-md-14">
            <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-1 position-relative order-lg-2" data-cue="zoomIn">
                    <div class="shape bg-dot primary rellax w-17 h-19" data-rellax-speed="1"
                        style="top: -1.7rem; left: -1.5rem;"></div>
                    <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0"
                        style="bottom: -1.8rem; right: -0.8rem; width: 85%; height: 90%;"></div>
                    <figure class="rounded"><img src="{{ asset('assets/img/wanita.jpg') }}"
                            srcset="{{ asset('assets/img/photos/about7@2x.jpg') }} 2x" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="col-lg-5 mt-lg-n10 text-center text-lg-start" data-cues="slideInDown" data-group="page-title"
                    data-delay="600">
                    <h1 class="display-1 mb-5">Brands.</h1>
                    <p class="lead fs-25 lh-sm mb-7 px-md-10 px-lg-0">Menyediakan berbagai macam produk biji plastik atau palet plastik dari berbagai macam brand pilihan, seperti BM, Innoplus, dan sebagainya.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown"
                        data-group="page-title-buttons" data-delay="900">
                        <span><a href="{{ url('brands') }}"
                                class="btn btn-lg btn-primary rounded-pill me-2">Brands</a></span>
                    </div>
                </div>
                <!--/column -->
            </div>
            <!-- /.row -->
    </section>

    <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset("/assets/img/anak.jpg")}}">
    <section class="wrapper bg-gradient-primary">
        <div class="container py-14 pt-md-15 pb-md-18">
            <div class="row text-center">
                <div class="col-lg-9 col-xxl-7 mx-auto" data-cues="zoomIn" data-group="welcome" data-interval="-200">
                    <h2 class="display-1 mb-4">Process.</h2>
                    <p class="lead fs-24 lh-sm px-md-5 px-xl-15 px-xxl-10 mb-7 ">Menyediakan berbagai macam produk biji plastik atau palet plastik berdasarkan jenis pengolahannya, seperti Lamination, Blow, Injection, dan sebagainya.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->

                <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="join" data-delay="900">
                    <span><a class="btn btn-lg btn-primary rounded-pill mx-1" href="{{url('process')}}">Process</a></span>
                </div>
            <!-- /div -->
            {{-- <div class="row mt-12" data-cue="fadeIn" data-delay="1600">
                <div class="col-lg-8 mx-auto">
                    <figure><img class="img-fluid" src="{{ asset('/assets/fe/img/illustrations/i12.png') }}"
                            srcset="{{ asset('/assets/fe/img/illustrations/i12@2x.png') }} 2x" alt=""></figure>
                </div>
                <!-- /column -->
            </div> --}}
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</section>
@endsection
