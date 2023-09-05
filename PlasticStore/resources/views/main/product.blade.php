@extends('layouts.shop')

@section('title')
    {{$product->name}} | Plastic Store
@endsection

@section('content')
<section class="wrapper bg-gray">
    <section class="wrapper bg-gray">
        <div class="container py-3 py-md-5">
          <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active text-muted" aria-current="page">{{$product->name}}</li>
            </ol>
          </nav>
          <!-- /nav -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
          <div class="row gx-md-8 gx-xl-12 gy-8">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                      <section class="wrapper image-wrapper bg-image bg-cover text-white" data-image-src="{{asset("/assets/img/products/".$product->image)}}">
                      {{-- <section class="wrapper image-wrapper bg-image bg-cover text-white" data-image-src=""> --}}
                        <div class="container py-14 py-md-21">
                        </div>
                        <!-- /.container -->
                      </section>
                      <!-- /section -->
                    </div>
                    <!--/.card-body -->

                    <!--/.card-footer -->
                  </div>
              <!-- /.swiper-container -->
            </div>
            <!-- /column -->
            <div class="col-lg-6">
              <div class="post-header mb-5">
                <h2 class="post-title display-5">{{Str::ucfirst($product->name)}}</h2>
                <h4 class="post-title display-6"><span class="amount">Rp. {{$product->price}}</span></h4>
                <h4 class="post-title display-8">{{$product->category->name}}</h4>
                <h4 class="post-title display-8">{{$product->subCategory->name}}</h4>
                <h4 class="post-title display-8">{{$product->subProcess->name}}</h4>
              </div>
              <!-- /.post-header -->
              <p class="mb-6">{{$product->description}}</p>
              <p class="mb-6">{{$product->brand->name}}</p>
              <p class="mb-6">{{$product->manufacturer}}</p>
                <div class="row">
                  <div class="col-lg-9 d-flex flex-row pt-2">
                    <div>
                      <div class="form-floating">
                        <input id="txtQty" type="number" class="form-control" placeholder="Text Input" name="qty" min="1">
                        <label for="textInputExample">Quantity</label>
                      </div>
                      <!--/.form-select-wrapper -->
                    </div>
                    <div class="flex-grow-1 mx-2">
                      <button class="btn btn-primary btn-icon btn-icon-start rounded w-100 flex-grow-1" id="btn-addcart" data-id="{{$product->id}}"><i class="uil uil-shopping-bag"></i> Add to Cart</button>
                    </div>
                  </div>
                  <!-- /column -->
                </div>
                <!-- /.row -->
              <!-- /form -->
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->

    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
      $(document).ready(function () {
            $("#btn-addcart").on("click", function(){
                let id = $(this).attr("data-id");
                let quantity = $("#txtQty").val();
                $.post(
                    "{{url('product/addcart')}}" + "/" + id,
                    {
                        _token: "{{ csrf_token() }}",
                        qty: quantity,
                    },
                    function(data){
                        if(data.status == "oke"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil tambah item'
                            }
                            )
                            //alert(data.message);
                        }
                    }
                )
            });
        });
    </script>
@endsection
