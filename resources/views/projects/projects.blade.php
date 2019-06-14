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
                            <h3  style="width:85% ;" class="box-title" >PROJE LİSTESİ</h3>

                            <a class="btn btn-app" style="width:10% ;" href="{{'projects/add'}}">
                                <i class="fa fa-edit" style="margin-top: 5px;color: green;"></i>
                                <p style="font-weight: bold;color: green;">
                                    Yeni Ekle
                                </p>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed" style="justify-content: center;vertical-align: center;">
                                <tbody>

                                <tr>
                                    <th style="width: 25px">#</th>
                                    <th style="width: 150px">Başlık</th>
                                    <th style="width: 250px;">Açıklama</th>
                                    <th>Sahibi</th>
                                    <th>Son Tarih</th>
                                    <th>Maaliyeti</th>
                                    <th>Proje Bitti mi?</th>
                                    <th style="width: 120px">İşlemler</th>
                                    <th style="width: 200px">Proje Durum</th>
                                </tr>


                                @foreach($projects as $project)
                                    <tr style="height: 50px;justify-content: center;align-items: center">
                                        <td style="width: 25px">{{$project->id}}.</td>
                                        <td >{{$project->title}}</td>
                                        <td style="width: 250px;">{{$project->description}}</td>
                                        <td>{{$project->user->name}}</td>
                                        <td>{{$project->daysLeft}} gün</td>
                                        <td>{{$project->cost}}₺</td>

                                        <td>
                                            @if($project->is_done) <button type="button" class="btn btn-block btn-success ">
                                                <i class="fa fa-plus-square-o">  Bitti </i>
                                            </button>
                                            @else
                                                <button type="button" class="btn btn-block btn-warning">
                                                    <i class="fa fa-plus-square-o">  Bitmedi </i>
                                                </button>
                                            @endif
                                        </td>

                                        <td >
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger">İşlem</button>
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>

                                                <ul class="dropdown-menu" role="menu" style="width: 100px">
                                                    <li><a href="{{'/projects/edit'}}/{{$project->id}}">Düzenle</a></li>
                                                    @if($project->is_done)
                                                        <li><a href="{{'/projects/cancel'}}/{{$project->id}}">Geri Al</a></li>
                                                       @else
                                                        <li><a href="{{'/projects/make_done'}}/{{$project->id}}">Tamamla</a></li>
                                                        @endif
                                                    <li class="divider"></li>
                                                    <li><a href="{{'/projects/delete'}}/{{$project->id}}">Sil</a></li>
                                                </ul>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-blue" style="width: {{$project->percentage}}%">
                                                    %{{$project->percentage}}
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                    @endforeach


                                <tr>
                                    <th style="width: 25px">#</th>
                                    <th>Başlık</th>
                                    <th style="width: 250px;">Açıklama</th>
                                    <th>Sahibi</th>
                                    <th>Son Tarih</th>
                                    <th>Maaliyeti</th>
                                    <th>Proje Bitti mi?</th>
                                    <th style="width: 120px">İşlemler</th>
                                    <th style="width: 200px">Proje Durum</th>

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
