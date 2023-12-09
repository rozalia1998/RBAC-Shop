<div>
	<div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Category</h4></div>
                <div class="card-body">
                    <div class="col-auto">
                        <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                        <select wire:model="selectedCategory" class="form-select" id="autoSizingSelect">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <!-- here -->
            <div class="card mt-3">
    <div class="card-header"><h4>Price</h4></div>
    <div class="card-body">
        <div class="col-auto">
            <label for="minPrice">Min Price:</label>
            <input type="number" wire:model="minPrice" id="minPrice" class="form-control">
        </div>
        <div class="col-auto">
            <label for="maxPrice">Max Price:</label>
            <input type="number" wire:model="maxPrice" id="maxPrice" class="form-control">
        </div>
        <div class="col-auto">
            <button wire:click="applyPriceFilter" class="btn btn-primary">Apply</button>
        </div>
    </div>
</div>

            <!-- End Here -->
        </div>
        <div class="col-md-9">
            <div class="row">
               @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if(is_object($product) && isset($product->image))
                                    <img src="{{ asset('uploads/product/'.$product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('placeholder-image.jpg') }}" alt="Placeholder Image">
                                @endif
                            </div>
                            <div class="product-card-body">
                                @if(is_object($product))
                                    <p class="product-category">{{ $product->category->name }}</p>
                                    <h5 class="product-name">
                                        <a href="">{{ $product->name }}</a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">{{ $product->price }}</span>
                                    </div>
                                    <div>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"><i class="fa fa-heart"></i></a>
                                        <a href="" class="btn btn1">View</a>
                                    </div>
                                @else
                                    <p>Invalid product data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Available Products</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
	</div>
</div>
