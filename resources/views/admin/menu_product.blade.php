@extends('admin.sidebar')

@section('admin')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
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
                            <button class="btn btn-primary editBtn" data-id="{{ $p->id }}">
                                Edit
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    @endsection
</div>