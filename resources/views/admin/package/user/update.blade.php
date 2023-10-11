@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data User</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Update Data User</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.update', $User->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                            <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $User->id }}" readonly>
                        </div>
                        <br>
                            <div class="input-group">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                                <input class="form-control" name="nama" placeholder="Nama" type="text" value="{{ $User->nama }}">
                            </div>
                        <br>
                            <div class="">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>
                                <label class="fancy-radio">
                                    <input name="level" value="admin" type="radio" {{$User->level == 'admin'? 'checked' : ''}}>
                                    <span><i></i>Admin</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="level" value="customer" type="radio" {{$User->level == 'customer'? 'checked' : ''}}>
                                    <span><i></i>Customer</span>
                                </label>
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                                <input class="form-control" name="username" placeholder="Username" type="text" value="{{ $User->username }}">
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <input class="form-control" name="password" placeholder="Password" type="password" value="{{ $User->password }}" readonly>
                            </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-block" onclick="kembaliuser();">Cancel</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function kembaliuser() {
                            window.location.href = "/admin/user";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection