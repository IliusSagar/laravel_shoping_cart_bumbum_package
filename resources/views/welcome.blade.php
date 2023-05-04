<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>




   <div class="container">
    <div class="cart  " >
        <a href="{{ route('show.cart')}}">Cart</a>
        <p>qty: {{ Cart::count()}}
            total: ${{ Cart::subtotal()}}
         </p>

    </div>
    <h1>Shopping</h1>

    @php
    $products = App\Models\Product::latest()->get();
@endphp






        @foreach($products as $product)
        <form action="{{ url('cart/product/add/'.$product->id)}}" method="post">
            @csrf

            <div class="row">
        <div class="col-md-4">



            <img src="{{asset('product/'.$product->image)}}" alt="" style="width: 200px; height: 200px;">
            <h3 >{{ $product->product_name }}</h3>
            <p >{{ $product->price }}</p>

            {{-- <button class="btn btn-dark addcart" data-id="{{ $product->id }}">Add to Cart</button> --}}
            <button class="btn btn-dark " type="submit">Buy Now</button>

        </div>



    </div>
    </form>

        @endforeach






   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function(){
          $('.addcart').on('click', function(){
             var id = $(this).data('id');
            // alert(id)
             if (id) {
                 $.ajax({
                     url: " {{ url('/add/to/cart/') }}/"+id,
                     type:"GET",
                     datType:"json",
                     success:function(data){
                  const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-end',
                       showConfirmButton: false,
                       timer: 3000,
                       timerProgressBar: true,
                       onOpen: (toast) => {
                         toast.addEventListener('mouseenter', Swal.stopTimer)
                         toast.addEventListener('mouseleave', Swal.resumeTimer)
                       }
                     })

                  if ($.isEmptyObject(data.error)) {

                     Toast.fire({
                       icon: 'success',
                       title: data.success
                     })
                  }else{
                      Toast.fire({
                       icon: 'error',
                       title: data.error
                     })
                  }


                     },
                 });

             }else{
                 alert('danger');
             }
          });

        });


     </script>
  </body>
</html>
