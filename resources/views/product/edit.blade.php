@extends('admin.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('product_update'))
                <p>{!! session('product_update') !!}</p>
                @endif
                <a class="btn btn-primary" href="{!! url('product') !!}">Goto list</a>
                <br>

                
                {!! Form::model($product , array('route' => array('product.update', $product->id), 'method'=>'PUT','files'=>'true')) !!}

                <br>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
                <br>
                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('description') }}</span>
                <br>
                {!! Form::label('price', 'Price:') !!}
                {!! Form::number('price',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('price') }}</span>
                <br>
                {!! Form::label('photo', 'Photo:') !!}
                {!! Form::file('photo',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('photo') }}</span>
                <br>
                <br>
                {!! Form::submit('Update record', array('class'=>'secondary-cart-btn')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection