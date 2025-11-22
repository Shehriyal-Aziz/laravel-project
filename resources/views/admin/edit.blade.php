<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-2xl">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Card Header -->
            <div class="bg-blue-600 text-white px-6 py-4">
                <h4 class="text-xl font-semibold m-0">Edit Product</h4>
            </div>
            
            <!-- Card Body -->
            <div class="p-6">
                <form action="/product_save/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    

                    <!-- Product Image -->
                    <div class="mb-4">
                        <label for="pimg" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Image
                        </label>
                        <input 
                            type="file" 
                            id="pimg" 
                            name="pimg"
                            accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-gray-300 rounded-lg"
                        >
                    </div>

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label for="pname" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Name
                        </label>
                        <input 
                            type="text" 
                            id="pname" 
                            name="pname"
                            value="{{ $product->name }}"
                            placeholder="Product Name"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                    </div>

                    <!-- Product Description -->
                    <div class="mb-4">
                        <label for="pdesc" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Description
                        </label>
                        <input 
                            type="text" 
                            id="pdesc" 
                            name="pdesc"
                            value="{{ $product->desc }}"
                            placeholder="Product Description"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                    </div>

                    <!-- Product Price -->
                    <div class="mb-4">
                        <label for="pprice" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Price
                        </label>
                        <input 
                            type="text" 
                            id="pprice" 
                            name="pprice"
                            value="{{ $product->price }}"
                            placeholder="Product Price"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                    </div>

                    <!-- Product Category -->
                    <div class="mb-6">
                        <label for="pcategory" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Category
                        </label>
                        <input 
                            type="text" 
                            id="pcategory" 
                            name="pcategory"
                            value="{{ $product->category }}"
                            placeholder="burger, pizza, pasta, fries"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors shadow-sm"
                    >
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>