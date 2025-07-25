@extends('layouts.master')

@section('styles')
<style>
.swal2-actions button {
    font-size: 15px !important;
    padding: 10px !important;
    min-width: 70px;
    border-radius: 0.375rem !important;
}
.swal2-confirm {
    box-shadow: none !important;
    border-radius: 0.25rem !important;
}
.swal2-cancel {
    font-size: 1.1rem !important;
    padding: 0.65rem 1.2rem !important;
    min-width: 90px;
    border-radius: 0.3rem !important;
}
.swal2-popup {
    font-size: 1.1rem !important;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Add Sticker Product</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Stickers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Sticker</li>
                </ol>
            </nav>
        </div>
    </div>
<div class=" d-flex justify-content-end mb-2">
    <a href="{{ route('category.list') }}" class="btn btn-primary">Categories</a>
</div>
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">Add Sticker Product</div>
            </div>
            <div class="card-body">
                <form action="{{ route('sticker.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-xl-6 col-md-6 mb-3">
            <label class="form-label">Sticker Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter sticker name" required>
        </div>
        <div class="col-xl-6 col-md-6 mb-3">
            <label class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
        </div>
        <!-- <div class="col-xl-4 col-md-6 mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Auto-generated if left empty">
        </div> -->
        <div class="col-xl-6 col-md-6 mb-3">
            <label class="form-label">Sticker Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="col-xl-6 col-md-6 mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" name="background_image" class="form-control">
        </div>
        <div class="col-12 mb-4">
            <label class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control" placeholder="Write a description..." required></textarea>
        </div>

        <div class="col-12 mb-3">
            <label class="form-label">Sticker Sizes</label>
            <div id="sizesWrapper">
                <div class="border p-3 mb-3 size-group">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-2">
                            <label>Width (in)</label>
                            <input type="number" name="sizes[0][width]" class="form-control" placeholder="Width" required>
                        </div>
                        <div class="col-md-2">
                            <label>Height (in)</label>
                            <input type="number" name="sizes[0][height]" class="form-control" placeholder="Height" required>
                        </div>
                        <div class="col-md-3">
                            <label>Label (optional)</label>
                            <input type="text" name="sizes[0][label]" class="form-control" placeholder="Size label">
                        </div>
                        <div class="col-md-5">
                            <div class="price-tier-group row g-1">
                                <div class="col-md-5">
                                    <input type="number" name="sizes[0][prices][0][quantity]" placeholder="Qty" class="form-control" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="number" step="0.01" name="sizes[0][prices][0][price]" placeholder="Price" class="form-control" required>
                                </div>
                            </div>
                            <button type="button" onclick="addPriceTier(this, 0)" class="btn btn-sm btn-outline-primary mt-2">+ Add Price</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" onclick="addSizeInput()" class="btn btn-sm btn-primary">+ Add Another Size</button>
        </div>

        <div class="col-12 text-end mt-4">
            <button type="submit" class="btn btn-primary btn-wave">Save Sticker</button>
        </div>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
@endif
@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
    });
@endif
</script>

<script>
let sizeIndex = 1;
function addSizeInput() {
    const wrapper = document.getElementById('sizesWrapper');
    const div = document.createElement('div');
    div.classList.add('border', 'p-3', 'mb-3', 'size-group');
    div.innerHTML = `
        <div class="row g-2 align-items-end">
            <div class="col-md-2">
                <label>Width (in)</label>
                <input type="number" name="sizes[${sizeIndex}][width]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label>Height (in)</label>
                <input type="number" name="sizes[${sizeIndex}][height]" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Label (optional)</label>
                <input type="text" name="sizes[${sizeIndex}][label]" class="form-control">
            </div>
            <div class="col-md-5">
                <div class="price-tier-group row g-1">
                    <div class="col-md-5">
                        <input type="number" name="sizes[${sizeIndex}][prices][0][quantity]" placeholder="Qty" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <input type="number" step="0.01" name="sizes[${sizeIndex}][prices][0][price]" placeholder="Price" class="form-control" required>
                    </div>
                </div>
                <button type="button" onclick="addPriceTier(this, ${sizeIndex})" class="btn btn-sm btn-outline-primary mt-2">+ Add Price</button>
            </div>
        </div>
    `;
    wrapper.appendChild(div);
    sizeIndex++;
}

function addPriceTier(button, sizeIdx) {
    const parent = button.closest('.size-group').querySelector('.price-tier-group');
    const tierCount = parent.querySelectorAll('input').length / 2;
    const group = document.createElement('div');
    group.classList.add('row', 'g-1', 'mt-2');
    group.innerHTML = `
        <div class="col-md-5">
            <input type="number" name="sizes[${sizeIdx}][prices][${tierCount}][quantity]" placeholder="Qty" class="form-control" required>
        </div>
        <div class="col-md-5">
            <input type="number" step="0.01" name="sizes[${sizeIdx}][prices][${tierCount}][price]" placeholder="Price" class="form-control" required>
        </div>
    `;
    parent.appendChild(group);
}
</script>

<script>
document.querySelector('input[name="title"]').addEventListener('input', function () {
    const title = this.value;
    const slug = slugify(title);
    document.querySelector('input[name="slug"]').value = slug;
});

function slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text
}
</script>

@endsection