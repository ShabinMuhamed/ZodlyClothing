<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
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
            display: inline-block;
            margin: 4px;
        }

        .preview-img img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card shadow container-box">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Add New Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Price (₹)</label>
                    <input type="number" name="price" class="form-control" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label>Available Sizes</label>
                    <div id="sizeOptions">
                        @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <label class="size-box">
                                <input type="checkbox" name="available_sizes[]" value="{{ $size }}">
                                {{ $size }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label>Product Images</label>
                    <input type="file" name="images[]" class="form-control" multiple onchange="previewImages(event)">
                </div>

                <div class="mb-3">
                    <label>Preview</label>
                    <div id="preview-container"></div>
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    // Size box toggle
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

    // Preview uploaded images
    function previewImages(event) {
        const previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = '';

        const files = event.target.files;
        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const div = document.createElement('div');
                div.classList.add('preview-img');
                div.innerHTML = `<img src="${e.target.result}" alt="Image">`;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }
</script>

</body>
</html>
