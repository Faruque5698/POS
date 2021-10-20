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
                                data-toggle="modal" data-target="#addUser" >
                                 <i class="fa fa-plus"></i>Add new users</a>

                         </div>
                         <div class="card-body">
                             <table class="table table-bordered table-left">
                                 <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Name</th>
                                     <th>Email</th>
{{--                                     <th>Phone</th>--}}
                                     <th>Role</th>
                                     <th>Action</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 @php($i=1)
                                 @foreach($users as $user)
                                 <tr>
                                     <td>{{$i++}}</td>
                                     <td>{{$user->name}}</td>
                                     <td>{{$user->email}}</td>
{{--                                     <td>{{$user->phone}}</td>--}}
                                     <td>{{$user->is_admin == 1 ? 'Admin' : 'Cashier'}}</td>
                                     <td>
                                         <div class="btn-group">

                                             <a href="" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#editUser{{$user->id}}">
                                                 <i class="fa fa-edit"></i>Edit</a>
                                             <a href="{{route('userDelete',['id'=>$user->id])}}"class="btn btn-sm btn-danger"  onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</a>

                                         </div>
                                     </td>
                                 </tr>
                                 <div class="modal fade" id="editUser{{$user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div>
                                             <div class="modal-body">
                                                 <form action="{{url('/users/Update')}}" method="post">
                                                     @csrf

                                                     <div class="form-group">
                                                         <label for="">Name</label>
                                                         <input type="text" name="name" id="" value="{{ $user->name }}" class="form-control">
                                                         <input type="hidden" name="id" id="" value="{{ $user->id }}" class="form-control">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="">Email</label>
                                                         <input type="email" name="email" id="" value="{{ $user->email }}" class="form-control">
                                                     </div>
{{--                                                     <div class="form-group">--}}
{{--                                                         <label for="">phone</label>--}}
{{--                                                         <input type="number" name="phone" id="" value="{{ $user->phone}}" class="form-control">--}}
{{--                                                     </div>--}}
                                                     <div class="form-group">
                                                         <label for="">Password</label>
                                                         <input type="password" name="password" id="" value="{{ $user->password }}" class="form-control" disabled>
                                                     </div>
{{--                                                     <div class="form-group">--}}
{{--                                                         <label for="">Confirm Password</label>--}}
{{--                                                         <input type="password" name="confirm_password" id="" class="form-control">--}}
{{--                                                     </div>--}}
                                                     <div class="form-group">
                                                         <label for="">Role</label>
                                                         <select name="is_admin" id="" class="form-control">
                                                             <option value="1" {{$user->is_admin==1?'Selected':''}}>Admin</option>
                                                             <option value="2" {{$user->is_admin==2?'Selected':''}}>Cashier</option>
                                                         </select>
                                                     </div>
                                                     <div class="modal-footer">
                                                         <button class="btn btn-primary btn-block">Update User</button>
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
                         <div class="card-header"><h4>Search user</h4>

                         </div>
                         <div class="card-body">
                             ...............
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>

     <div class="modal fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form action="{{url('/users/store')}}" method="post">
                         @csrf
                         <div class="form-group">
                             <label for="">Name</label>
                             <input type="text" name="name" id="" class="form-control">
                         </div>
                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="email" name="email" id="" class="form-control">
                         </div>
                         <div class="form-group">
                             <label for="">phone</label>
                             <input type="number" name="phone" id="" class="form-control">
                         </div>
                         <div class="form-group">
                             <label for="">Password</label>
                             <input type="password" name="password" id="" class="form-control">
                         </div>
                         <div class="form-group">
                             <label for="">Confirm Password</label>
                             <input type="password" name="confirm_password" id="" class="form-control">
                         </div>
                         <div class="form-group">
                             <label for="">Role</label>
                             <select name="is_admin" id="" class="form-control">
                                 <option value="1">Admin</option>
                                 <option value="2">Cashier</option>
                             </select>
                         </div>
                         <div class="modal-footer">
                             <button class="btn btn-primary btn-block">Save User</button>
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
