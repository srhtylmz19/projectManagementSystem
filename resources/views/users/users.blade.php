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

                                <h3  style="width:85% ;" class="box-title" >KULLANICI LİSTESİ</h3>

                                <a class="btn btn-app" style="width:10% ;" href="{{'users/add'}}">
                                    <i class="fa fa-edit" style="margin-top: 5px;color: green;"></i>
                                    <p style="font-weight: bold;color: green;">
                                        Yeni Ekle
                                    </p>
                                </a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tbody>


                                <tr>
                                    <th style="width: 25px">#</th>
                                    <th>Ad-Soyad</th>
                                    <th>Email</th>
                                    <th>Kayıt Tarihi</th>
                                    <th style="width: 120px">İşlemler</th>
                                    <th style="width: 100px">Proje Sayısı</th>
                                </tr>



                                @foreach($users as $user)
                                    <tr>
                                        <td style="width: 25px">{{$user->id}}.</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>

                                        <td >
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger">İşlem</button>
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>

                                                <ul class="dropdown-menu" role="menu" style="width: 100px">
                                                    <li><a href="{{'users/add_to_project'}}/{{$user->id}}">Proje Ekle</a></li>
                                                    <li><a href="{{url('users/edit')}}/{{$user->id}}">Düzenle</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="{{'/users/delete'}}/{{$user->id}}">Sil</a></li>
                                                </ul>
                                            </div>
                                        </td>

                                        <td><span class="badge bg-green" style="width: 50px;margin-left: 10px;margin-top: 7px">{{$user->project_count}}</span></td>

                                    </tr>
                                    @endforeach

                                <tr>
                                    <th style="width: 25px">#</th>
                                    <th>Ad-Soyad</th>
                                    <th>Email</th>
                                    <th>Kayıt Tarihi</th>

                                    <th style="width: 120px">İşlemler</th>
                                    <th style="width: 100px">Proje Sayısı</th>
                                </tr>


                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
