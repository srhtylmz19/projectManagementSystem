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

                                <h3  style="width:85% ;" class="box-title" >PROJE EKLE</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <form action="{{url('/projects/save')}}" method="post">

                                {{csrf_field()}}

                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon">*</span>
                                        <input type="text" name="title" class="form-control" required placeholder="Proje Adı">
                                    </div>
                                    <br>


                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file"></i></span>
                                        <textarea name="description" id="" class="form-control" placeholder="Proje Açıklaması"></textarea>
                                    </div>
                                    <br>

                                    <p>Proje teslim tarihi:</p>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="date" name="deadline" class="form-control" required placeholder="proje bitiş tarihi">
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="number" name="cost" class="form-control" required placeholder="Proje Maaliyeti">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label>Projenin ait olduğu kullanıcıyı seçiniz..</label>
                                        <select class="form-control" name="user_id">

                                            @foreach($users as $user)
                                                <option name="user_id" value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>


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
