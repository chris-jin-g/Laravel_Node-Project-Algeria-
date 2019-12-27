@extends('admin.layout.base')

@section('title', 'Alterar Senha do Motorista')

@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-block bg-white">
                        <h5 style="margin-bottom: 2em;">Alteração de Senha</h5>
                        <form class="form-horizontal"  action="{{ route('admin.provider.password',['id'=>$provider->id]) }}" method="POST" role="form">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Senha:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Repetir Senha:</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Atualizar Senha</button>
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
