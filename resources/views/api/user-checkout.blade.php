<x-apilayout>
    <form class="row" action="{{ route('order.create') }}" method="POST">
        @csrf
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    User data Form
                </div>
                <div class="card-body">
                    <div class="form-floating  mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name" required
                            name="name">
                        <label for="floatingInput" class="ms-2">Name</label>
                    </div>
                    <div class="form-floating  mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name" required
                            name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating  mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name" required
                            name="address">
                        <label for="floatingInput">Address</label>
                    </div>
                </div>
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
                        <button type="submit" class="btn btn-success">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-apilayout>
