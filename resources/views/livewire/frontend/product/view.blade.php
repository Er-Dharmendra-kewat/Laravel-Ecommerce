<div>
    <div class="py-3 py-md-5">
        <div class="container">

            @if (@session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            {{-- @if (@session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                            No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home /{{ $product->category->name }} /{{ $product->category->name }}
                        <div>
                            <span class="selling-price">Rs{{ $product->selliing_price }}</span>
                            <span class="original-price">Rs{{ $product->original_price }}</span>
                        </div>
                        @if ($product->productColors->count() > 0)
                            @if ($product->productColors)
                                @foreach ($product->productColors as $colorItem)
                                    {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}">
                                    {{ $colorItem->color->name }} --}}
                                    <label class="colorSelection"
                                        style="background-color:{{ $colorItem->color->code }} "
                                        wire:click="colorSelected({{ $colorItem->id }})">
                                        {{ $colorItem->color->name }}
                                    </label>
                                @endforeach
                            @endif
                        @else
                            @if ($product->quantity)
                                <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                            @else
                                <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                            @endif
                        @endif


                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>

                            <button type="button" wire:click="addToWishlist({{ $product->id }})"
                                class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
