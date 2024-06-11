<x-app-layout>

    @section('content')
                <div class="container">
                        <h5>Update Product</h5>
                        <form action="{{ route('products.update',$product->id ) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="col-form-label" for="name">Name</label>
                                <input class="form-control" name="product_name" id="name" type="text"
                                    value="{{ $product->product_name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="product_code">Product code</label>
                                <input class="form-control" name="product_code" id="product_code" type="number"
                                value="{{ $product->product_code }}" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="buying_price">Buying price</label>
                                <input class="form-control" name="buying_price" id="buying_price" type="number" value="{{ $product->buying_price }}" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="selling_price">Selling price</label>
                                <input class="form-control" name="selling_price" id="selling_price" type="number" value="{{ $product->selling_price }}" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="stock">Stock</label>
                                <input class="form-control" name="stock" id="stock" type="number"
                                    value="{{ $product->stock }}" />
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="product_image">Product image</label>
                                <input class="form-control" name="product_image" id="product_image" type="file" />
                            </div>
                            <select name="categorie_id">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->categorie_name }}</option>
                                @endforeach
                            </select>
                            <select name="werhouse_id">
                                @foreach ($werhouses as $werhouse)
                                    <option value="{{ $werhouse->id }}">{{ $werhouse->werhouse_name }}</option>
                                @endforeach
                            </select>
                            <select name="brand_id">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                            <select name="unite_id">
                                @foreach ($unites as $unite)
                                    <option value="{{ $unite->id }}">{{ $unite->unit_name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                </div>
    @endsection

    </x-app-layout>
    