@extends('admin.main')

@section('content')
<main>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Admin</li>
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/product">Product</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="mb-0"> 
                        Add content here
                    </p>
                </div>
            </div>
            <div style="height: 100vh"></div>
            <div class="card mb-4">
                <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
            </div>
        </div>
    </main>
</main>
@endsection