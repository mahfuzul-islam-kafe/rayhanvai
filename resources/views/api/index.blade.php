<x-apilayout>
    <x-api.filter />
    <div class="row row-cols-3 g-4 ">
        @foreach ($products as $product)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" style="height: 300px;object-fit:contain;width:100%"
                            src="{{ $product['image'] }}" alt="">
                        <a href="{{ route('api.product', [Str::slug($product['title']), $product['id']]) }}">
                            <h4>
                                {{ Str::limit($product['title'], 30) }}
                            </h4>
                        </a>
                        <div class="d-flex justify-content-between">
                            <h2>
                                $ {{ $product['price'] }}
                            </h2>
                            <form action="{{route('add.cart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product['id']}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-apilayout>
