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
        <br><br><br>
        <h2>Shopping Cart</h2>
        <br><br>





        <table class="table">
            <thead>
                <th>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Total</td>
                    <td>Action</td>

                </th>
            </thead>
            @foreach ($cart as $row)
            <tbody>
                <th>
                    <td><img src="{{ asset('product/'.$row->options->image)}}" alt="" style="height: 60px;"></td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>${{ $row->price }}</td>
                    <td>${{ $row->price*$row->qty }}</td>
                    <td>
                        <br>
                        <a href="{{ url('remove/cart/'.$row->rowId)}}" class="btn btn-sm btn-danger">x</a>
                    </td>
                </th>
            </tbody>

            @endforeach
        </table>



        <br>

        <table class="table">
            <thead class="justify-content-end d-flex">
                <th>

                    <td>Order Total: ${{ Cart::subtotal()}}</td>

                </th>
            </thead>

        </table>



        <div class="justify-content-end d-flex">
        <a href="{{ url('/login')}}" class="btn btn-info " >Checkout</a>
        </div>


    </div>




  </body>
</html>

