@extends('layouts.shop')
@section('content')
    <section class="wrapper bg-gray image-wrapper bg-image bg-cover" data-image-src="{{ asset('/assets/img/kategori.jpg') }}">
        <div class="container py-12 py-md-16 text-center">
            <div class="row">
                <div class="col-lg-10 col-xxl-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">Category</h1>
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
                    <h2 class="display-6">Kategori untukmu</h2>
                    <nav class="d-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            {{-- <li class="breadcrumb-item" aria-current="page">Shop</li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">

                    @foreach ($categories as $c)
                        <div class="project item col-md-6 col-xl-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $c->name }}</h5>
                                    @if (isset($subcategories[$c->id]))
                                        @foreach ($subcategories[$c->id] as $sc)
                                            <ul>
                                                <li><a href="{{ route('categories.show', ['category' => $c, 'subCategory' => $sc]) }}"
                                                        class="card-link">{{ $sc->name }}</a></li>
                                                {{-- <li><a href="{{ route('sub_categories',$sc->id)}}"
                                                        class="card-link">{{ $sc->name }}</a></li> --}}
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <figure class="rounded mb-6">
                    <a href="{{route('products.show',$c->id)}}">
                        <img src="{{asset("/assets/img/products/".$p->img_url)}}" alt="" class="img-fluid" />
                    </a>
                </figure> --}}
                        {{-- <div class="post-header">
                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                    <div class="post-category text-ash mb-0">{{$c->name}}</div>
                </div> --}}
                        {{-- <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                    <div class="post-category text-ash mb-0">{{$p->type->name}}</div>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                    <div class="post-category text-ash mb-0">Dimensi {{$p->dimension}}</div>
                </div>
                <h2 class="post-title h3 fs-22"><a href="{{route('products.show',$p->id)}}" class="link-dark">{{Str::ucfirst($p->name)}}</a></h2>
                <p class="price"><span class="amount">@currency($p->price)</span></p>
                </div> --}}
                        <!-- /.post-header -->
                        {{-- </div> --}}
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
