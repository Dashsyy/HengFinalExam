@extends('admin.main')
@section('content')
<main>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create Proudct</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Admin</a></li>
                <li class="breadcrumb-item "><a href="http://127.0.0.1:8000/product">Product</a></li>
                <li class="breadcrumb-item "></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    @if(Session::has('product_create'))
                    <p>{!! session('product_create')!!}</p>
                    @endif
                    <div>
                    {!! Form::open(array('url'=>'/product', 'files'=>'true')) !!}
                        {!! Form::label('name', 'Name: ') !!}
                        {!! Form::text('name', '',array('class'=>'form-control')) !!}
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        <br>
                        {!! Form::label('description', 'Description: ') !!}
                        {!! Form::textarea('description', '',array('class'=>'form-control')) !!}
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        

                        {!! Form::label('price', 'Price: ') !!}
                        {!! Form::number('price', '',array('class'=>'form-control')) !!}
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        <br>

                        {!! Form::label('photo', 'Photo: ') !!}
                        {!! Form::file('photo', null,array('class'=>'form-control')) !!}
                        <span class="text-danger">{{ $errors->first('photo') }}</span>

                        <br>
                        {!! Form::submit('Create',array('class'=> 'secondary-cart-btn')) !!}
                        {!! Form::close() !!}

                    </div>
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