<x-apilayout >
    <x-api.filter/>
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
                        <h2>
                            $ {{ $product['price'] }}
                        </h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-apilayout >
