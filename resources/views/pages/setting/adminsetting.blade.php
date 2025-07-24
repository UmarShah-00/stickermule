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
        <h1 class="page-title fw-semibold fs-18 mb-0">Setting</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
            </nav>
        </div>
    </div>
    <div>
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Setting</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.update') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="mb-3 col-xl-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" disabled>
                            </div>
                        
                            <div class="mb-3 col-xl-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" disabled>
                            </div>
                        
                            <div class="mb-3 col-xl-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="password" class="form-label">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                    
                            <div class="mb-3 col-xl-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="d-flex justify-content-end me-md-3">
                                <button class="btn btn-primary btn-wave">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection


@section('scripts')
<!-- SweetAlert2 CDN -->
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
 

@endsection
