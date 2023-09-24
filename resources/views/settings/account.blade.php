@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Account Profile</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid"> 
    <div class="row p-4">
        <!-- Add User Table -->
        <div class="col-md-4">
            <div class="card card-dark">
                <div class="card-header">
                <div class="card-title">
                    <div class="card-label"><h5>Create User</h5></div>
                </div>
                </div>
                <div class="card-body register-card-body">
                @error('name')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                @error('username')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                @error('email')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                @error('password')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                @error('password_confirmation')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                @error('role')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                @error('barangay_id')
                    <div class="text-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                @enderror
                <!-- Validation Errors -->
                
                
                    <form class="p-4" method="POST" action="{{ route('store.user') }}" onsubmit="btn.disabled = true; return true;">
                    @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Full name" name="name" :value="old('name')" onkeydown="return /[a-z . ]/i.test(event.key)" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username" :value="old('username')" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" :value="old('email')" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span> 
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="form-group col-md-4">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option value=""></option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group col-md-7 ml-3">
                                <label>Barangay</label>
                                <select class="form-control" name="barangay_id">
                                    <option></option>
                                    @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-5" style="float:right;" name="btn">Register</button>      
                    </form>
                </div>
            </div>
        </div>
        <!-- /.Add User Table -->
        <div class="col-md-8">
        <!-- /.card -->
        <div class="card card-dark">
            <div class="card-header">
            <h5>Accounts</h5>
            </div>
            <!-- /.card-header --> 
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th width="15%">Name</th>
                <th width="15%">Username</th> 
                <th width="10%">Email</th>
                <th width="10%">Barangay</th>
                <th width="8%">Action</th>
                </tr> 
                </thead> 
                <tbody>
                
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td> 
                    <td>{{ $user->email }}</td>      
                    <td>{{ $user->barangays->brgy_name }}</td>
                    <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#change-modal{{ $user->id }}"><i class="fa fa-key"></i></button>
                        <!-- Update Modal -->
                        <div class="modal fade" id="change-modal{{ $user->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title">User Update</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 35px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ url('change/' .$user->id) }}" >
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <p class="text-danger" id="PasswordErr"></p>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-7">
                                                    <label for="password">Password:</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" autocomplete="new-password">

                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="password_confirmation">Retype Password</label>
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype password" name="password_confirmation" id="password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="submitbtn">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update-modal{{ $user->id }}"><i class="fa fa-edit"></i></button>
                        <!-- Update Modal -->
                        <div class="modal fade" id="update-modal{{ $user->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h4 class="modal-title">User Update</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 35px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ url('update/' .$user->id) }}" onsubmit="btn.disabled = true; return true;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-7">
                                                    <label>Name:</label>
                                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" onkeydown="return /[a-z . ]/i.test(event.key)">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label>Username</label>
                                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <label>Email:</label>
                                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Role</label>
                                                    <select class="form-control" name="role">
                                                        <option value="Admin" {{ $user->role == 'admin' ? 'selected' : 'admin' }}>Admin</option>
                                                        <option value="User" {{ $user->role == 'user' ? 'selected' : 'user' }}>User</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <label>Barangay</label>
                                                    <select class="form-control" name="barangay_id">
                                                    @foreach ($barangays as $barangay)
                                                        <option value="{{ $barangay->id }}" {{ $barangay->id == $user->barangay_id ? 'selected' : '' }}>
                                                            {{ $barangay->barangay_name }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="btn">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-danger{{$user->id}}">
                            <i class="nav-icon fas fa-trash"></i>
                        </button>
                        <div class="modal fade" id="modal-danger{{$user->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Account</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('delete/'.$user->id) }}">
                                        <div class="modal-body" id="modal-danger">
                                            <p>Are you sure you want to delete this Account?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>          
                </tr>
                @endforeach
                </tbody>
            </table>

            </div>
            
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
