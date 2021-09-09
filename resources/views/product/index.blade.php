@extends('admin.main')
@section('content')
<main>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Proudct</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin">Admin</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                <a class="btn btn-primary" href="product/create">Create Product</a>
                    @if(Session::has('product_delete'))
                    <p>{!! session('product_delete')!!}</p>
                    @endif
                    @if (count($products) > 0)
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>price</th>
                            <th>photo</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div>{!! $product->id !!}</div>
                                </td>
                                <td>
                                    <div>{!! $product->name !!}</div>
                                </td>
                                <td>
                                    <div>{!! $product->description !!}</div>
                                </td>
                                <td>
                                    <div>{!! $product->price !!}</div>
                                </td>
                                <td>
                                    <div>{!! Html::image("/img/products/".$product->photo, $product->title, array('width'=>'60')) !!}</div>
                                </td>
                                <td><a href="{!! url('product/' . $product->id . '/edit') !!}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a></td>
                                <td>
                                    {!! Form::open(array('url'=>'product/'. $product->id, 'method'=>'DELETE')) !!}
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger delete">Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <script>
                        $(".delete").click(function() {
                            var form = $(this).closest('form');
                            ConfirmDialog(form);
                            return false;
                        });

                        function ConfirmDialog(form) {
                            $('<div></div>').appendTo('body')
                                .html('<div><h6> are you sure ?</h6></div>')
                                .dialog({
                                    modal: true,
                                    title: 'Delete message',
                                    zIndex: 10000,
                                    autoOpen: true,
                                    width: 'auto',
                                    resizable: false,
                                    buttons: {
                                        Yes: function() {
                                            $(this).dialog('close');
                                            form.submit();
                                        },
                                        No: function() {

                                            $(this).dialog("close");
                                            return false;
                                        }
                                    },
                                    close: function(event, ui) {
                                        $(this).remove();
                                    }
                                });
                            return false;
                        }
                    </script>
                    @endif
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