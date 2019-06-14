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

                                <h3  style="width:85% ;" class="box-title" >KULLANICI DÜZENLE</h3>



                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <form action="{{url('/users/update')}}" method="post">

                                {{csrf_field()}}

                                <div class="box-body">

                                    <input type="hidden" value="{{$user->id}}" name="user_id">

                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" value="{{$user->name}}" name="name" class="form-control" required placeholder="Kullanıcı Adı">
                                    </div>
                                    <br>


                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email"  value="{{$user->email}}" name="email" class="form-control" required placeholder="E-mail">
                                    </div>
                                    <br>


                                    <button class="btn btn-success" style="width: 100%" type="submit">
                                        <i class="fa fa-save"></i> GÜNCELLE
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
