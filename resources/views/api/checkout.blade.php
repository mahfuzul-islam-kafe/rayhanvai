<x-apilayout>

    @csrf
    <div class="row">


        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    User data Form
                </div>


                <form action="{{ route('checkout.cart') }}" method="GET">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="" required
                                name="phone" value="{{ request()->phone }}">
                            <label for="floatingInput" class="ms-2">Number</label>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('checkout.cart') }}" class="btn btn-primary">Reset</a>
                            <button type="submit" class="btn btn-info">Check User</button>
                        </div>
                    </div>
                </form>


                @if (request()->phone)
                    @if ($customer->email)
                        <div class="alert alert-success" role="alert">
                            You are a Customer complete Order
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Fill the required form to complete Order
                        </div>
                    @endif

                    <form action="{{ route('order.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="customerId" value="{{ $customer->id }}">
                        <input type="hidden" name="number" value="{{ request()->phone }}">
                        <div class="card-body">
                            <div class="form-floating  mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name"
                                    required name="name" value="{{ $customer->name }}">
                                <label for="floatingInput" class="ms-2">Name</label>
                            </div>
                            <div class="form-floating  mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name"
                                    required name="email" value="{{ $customer->email }}">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating  mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name"
                                    required name="address" value="{{ $customer->address }}">
                                <label for="floatingInput">Address</label>
                            </div>
                            <button type="submit" class="btn btn-success">Place Order</button>
                        </div>
                    </form>
                @else
                    <div class="alert alert-primary" role="alert">
                        Give your phone number first
                    </div>

                @endif
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Order details
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Product</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::limit($product['product']['title'], 20) }}</td>

                                        <td class="text-center">X {{ $product['quantity'] }}</td>
                                        <td class="text-center">{{ number_format($product['product']['price'], 2) }} $
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <th>Total Price :</th>
                                    <td class="text-center">{{ $totalPrice }} $</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-apilayout>
