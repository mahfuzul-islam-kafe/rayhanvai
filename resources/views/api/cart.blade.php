<x-apilayout>
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Count</th>
                    <th scope="col">Product Delet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['product']['title'] }}</td>
                        <td>{{ $product['product']['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>
                            <form action="{{ route('remove.cart', $product['product']['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   <div class="container total-price ">
    <div class="text-light d-flex justify-content-between ">
        <div class=""></div>
        <h3>Total Price : {{$totalPrice}} $</h3>
        <div class="btn btn-info">Check Out</div>
    </div>
   </div>

</x-apilayout>
