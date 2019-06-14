@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset">
                <div class="panel panel-default">



                    <div class="box">

                        <div class="box-header" style="margin: 20px;flex-direction: row;">

                                <h3  style="width:85% ;" class="box-title" >KULLANICI EKLE</h3>



                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <form action="{{url('/users/save')}}" method="post">

                                {{csrf_field()}}

                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" name="name" class="form-control" required placeholder="Kullanıcı Adı">
                                    </div>
                                    <br>


                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" required placeholder="E-mail">
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control" required placeholder="Şifre">
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="password_confirmation" class="form-control" required placeholder="Şifre Tekrar">
                                    </div>
                                    <br>


                                    <button class="btn btn-success" style="width: 100%" type="submit">
                                        <i class="fa fa-save"></i> Kayıt
                                    </button>



                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
