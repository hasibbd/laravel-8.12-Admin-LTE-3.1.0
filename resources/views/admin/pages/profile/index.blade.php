@extends('admin.app.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline pro_info">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../../dist/img/user4-128x128.jpg"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                <p class="text-muted text-center">{{auth()->user()->email}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Role</b> <a class="float-right">
                                            @switch(auth()->user()->role)
                                                @case(1) Admin @break
                                                @case(2) User @break
                                            @endswitch
                                        </a>
                                    </li>
                                </ul>

                                <a href="{{url('logout')}}" class="btn btn-primary btn-block"><b>Logout</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Information</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal pro_info2" id="profile_info_change">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                    <input type="name" value="{{auth()->user()->name}}" class="form-control" name="name" id="name" placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" value="{{auth()->user()->email}}" class="form-control" name="email" id="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Keep blank if password not need to change">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-4 col-form-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="c_password" class="form-control" id="c_password" placeholder="Keep blank if password not need to change">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
