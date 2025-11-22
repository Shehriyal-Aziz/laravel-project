@extends('admin.sidebar')

@section('admin')
<div id="layoutSidenav_content">

    <main>
        <div class="container-fluid px-4">
            <!-- add start  -->
            <h1 class="fs-2 fw-bold mb-2">Add Product</h1>
            <p class="text-secondary mb-4">Card will be added to product page</p>

            <button class="btn btn-primary fw-semibold px-4 py-2"
                data-bs-toggle="modal" data-bs-target="#productModal">
                + Add Product
            </button>


            <hr class="my-5">
            <!-- add end -->
            <h1 class="mt-4">Menu Products</h1>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->desc }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->category }}</td>
                        <td><img src="{{ asset('uploads/' . $p->image) }}" height="60"></td>
                        <td>
                            <form action="/editFromProduct/{{ $p->id }}" method="POST" class="w-100">
                                @csrf
                            
                                <button class="btn btn-sm btn-primary w-100">Edit</button>
                            </form>
                            <form action="/removeFromProduct/{{ $p->id }}" method="POST" class="w-100">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger w-100">Remove</button>
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    @endsection
</div>


<!-- Modal -->

<div id="productModal" class="modal fade" tabindex="-1">
    <div class="  modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white rounded-3">

            <!-- Close Button -->

            <div class="modal-body p-4">

                <button id="closeModal" type="button" class="  btn-close btn-close-white position-absolute end-0 mx-3 my-0"
                    data-bs-dismiss="modal" aria-label="Close"></button>


                <h2 class="fs-3 fw-bold mb-4 text-center">Add Product</h2>

                <!-- Form -->
                <form method="POST" action="/product_data_add" enctype="multipart/form-data">
                    @csrf

                    <!-- Product image -->
                    <div class="mb-3">
                        <label for="pimg" class="form-label">Product image</label>
                        <input type="file" id="pimg" name="pimg" required class="form-control">
                    </div>

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="pname" class="form-label">Product Name</label>
                        <input type="text" id="pname" name="pname" required class="form-control" placeholder="Product Name">
                    </div>

                    <!-- Product Description -->
                    <div class="mb-3">
                        <label for="pdesc" class="form-label">Product Description</label>
                        <input type="text" id="pdesc" name="pdesc" required class="form-control" placeholder="Product Desc">
                    </div>

                    <!-- Product price -->
                    <div class="mb-4">
                        <label for="pprice" class="form-label">Product price</label>
                        <input type="text" id="pprice" name="pprice" required class="form-control" placeholder="Product price">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="pcategory" class="form-label">Product Category</label>
                        <input type="text" id="pcategory" name="pcategory" required class="form-control" placeholder="burger, pizza, pasta, fries">
                    </div>

                    <!-- Submit -->
                    <button type="submit" name="psubmit" class="btn btn-primary w-100 fw-semibold">
                        Add
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>