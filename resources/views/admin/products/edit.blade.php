<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-box {
            max-width: 700px;
            margin: auto;
        }
        .size-box {
            display: inline-block;
            padding: 6px 12px;
            margin: 4px;
            border: 2px solid #ccc;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }
        .size-box input[type="checkbox"] {
            display: none;
        }
        .size-box.selected {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
        .preview-img {
            position: relative;
            display: inline-block;
            margin: 4px 8px 4px 0;
        }
        .preview-img img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .delete-btn {
            position: absolute;
            top: -6px;
            right: -6px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 0 6px;
            font-size: 12px;
            line-height: 1;
            cursor: pointer;
            z-index: 10;
        }
        .card-body {
            position: relative;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card shadow container-box">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Product</h4>
        </div>
        <div class="card-body">
            <form id="editForm" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Price (₹)</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label>Available Sizes</label>
                    <div id="sizeOptions">
                        @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <label class="size-box {{ in_array($size, $product->available_sizes) ? 'selected' : '' }}">
                                <input type="checkbox" name="available_sizes[]" value="{{ $size }}" {{ in_array($size, $product->available_sizes) ? 'checked' : '' }}>
                                {{ $size }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label>Add More Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <div class="mb-3">
                    <label>Existing Images</label><br>
                    <div id="image-container">
                        @foreach($product->images as $image)
                            <div class="preview-img" id="img-{{ $image->id }}">
                                <img src="{{ asset('storage/' . $image->image_path) }}">
                                <button type="button" class="delete-btn" onclick="deleteImage('{{ $image->id }}')" title="Delete image">&times;</button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    // Toggle selected class on size box click
    document.querySelectorAll('.size-box').forEach(label => {
        const input = label.querySelector('input[type="checkbox"]');
        label.addEventListener('click', function (e) {
            if (e.target === label || e.target === input) {
                input.checked = !input.checked;
                label.classList.toggle('selected', input.checked);
                e.preventDefault();
            }
        });
    });

    // AJAX delete image
    function deleteImage(imageId) {
        if (!confirm('Are you sure you want to delete this image?')) return;

        fetch(`/admin/product-images/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                document.getElementById(`img-${imageId}`).remove();
            } else {
                alert('Failed to delete image.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong.');
        });
    }
</script>

</body>
</html>
