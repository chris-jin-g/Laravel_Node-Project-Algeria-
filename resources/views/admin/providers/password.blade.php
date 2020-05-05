@extends('admin.layout.base')

@section('title', 'Change password')

@section('content')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">Change password</h4>
                          <p class="card-category">Complete your profile</p>
                        </div>
                        <div class="card-body">
                        <form class="form-horizontal"  action="{{ route('admin.provider.password',['id'=>$provider->id]) }}" method="POST" role="form">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Password :</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Confirm password:</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
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

@endsection
