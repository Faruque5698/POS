@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="float: left">ADD USER</h4>
                            <a href="" class="btn btn-dark" style="float: right"
                               data-toggle="modal" data-target="#addProduct" >
                                <i class="fa fa-plus"></i>Add new product</a>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Alert Stock</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->quanity}}</td>
                                        <td>
                                           @if($product->alert_stock <= $product->quantity)
                                               <span class="badge badge-danger">Low Stock > {{$product->alert_stock}}</span>

                                            @else
                                                <span class="badge badge-success">High Stock > {{$product->alert_stock}}</span>
                                            @endif
                                        </td>
{{--                                        <td>{{$user->is_admin == 1 ? 'Admin' : 'Cashier'}}</td>--}}
                                        <td>
                                            <div class="btn-group">

                                                <a href="" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#editProduct{{$product->id}}">
                                                    <i class="fa fa-edit"></i>Edit</a>
                                                <a href="{{route('productDelete',['id'=>$product->id])}}"class="btn btn-sm btn-danger"  onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</a>

                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editProduct{{$product->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="staticBackdropLabel">Edit Product</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('/product/Update')}}" method="post">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="">Product Name</label>
                                                            <input type="text" name="product_name" id="" value="{{ $product->product_name }}" class="form-control">
                                                            <input type="hidden" name="id" id="" value="{{ $product->id }}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Description</label>
                                                            <textarea name="description" id="" class="form-control">{{ $product->description }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Brand</label>
                                                            <input type="text" name="brand" id="" value="{{ $product->brand}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Price</label>
                                                            <input type="number" name="price" id="" value="{{ $product->price }}" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Quantity</label>
                                                            <input type="number" name="quanity" id="" value="{{ $product->quanity }}" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Alert Stock</label>
                                                            <input type="text" name="alert_stock" id="" value="{{$product->alert_stock}}" class="form-control">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary btn-block">Update Product</button>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header"><h4>Search Product</h4>

                        </div>
                        <div class="card-body">
                            ...............
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="addProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/product/store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="" class="form-control @error('product_name') is-invalid @enderror">
                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" name="brand" id="" class="form-control @error('brand') is-invalid @enderror">
                            @error('brand')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" name="quanity" id="" class="form-control @error('quantity') is-invalid @enderror">
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alert Stock</label>
                            <input type="text" name="alert_stock" id="" value="100" class="form-control @error('alert_stock') is-invalid @enderror" >
                            @error('alert_stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save Product</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>



    <style>
        .modal .right .modal-dialog{
            /*position: absolute;*/
            top: 0;
            right: 0;
            margin-right: 15vh;
        }
        .modal.fade:not(.in).right.modal-dialog{
            -webkit-transform: translate3d(25%,0,0);
            transform: translate3d(25%,0,0);
        }
@endsection
