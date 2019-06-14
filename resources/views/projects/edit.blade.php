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

                                <h3  style="width:85% ;" class="box-title" >PROJE DÜZENLE</h3>



                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <form action="{{url('/projects/update')}}" method="post">

                                {{csrf_field()}}

                                <div class="box-body">

                                    <input type="hidden" value="{{$project->id}}" name="project_id">

                                    <label>Projenin adı</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" value="{{$project->title}}" name="title" class="form-control" required placeholder="Projenin Adı">
                                    </div>
                                    <br>

                                    <label>Projenin açıklaması</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file"></i></span>
                                        <textarea name="description" id="" class="form-control" placeholder="Proje Açıklaması">{{$project->description}}</textarea>
                                    </div>
                                    <br>

                                    <p>Proje teslim tarihi</p>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="date" name="deadline" value="{{$project->deadline}}" class="form-control" required placeholder="proje bitiş tarihi">
                                    </div>
                                    <br>

                                    <label>Projenin maaliyeti</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="number" value="{{$project->cost}}" name="cost" class="form-control" required placeholder="Proje Maaliyeti">
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <label>Projenin sahibi</label>
                                        <select class="form-control" name="user_id">

                                            @foreach($users as $user)
                                                <option name="user_id" @if($user->id == $project->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <br>

                                    <label>Projenin Durumu </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="number" value="{{$project->percentage}}" name="percentage" class="form-control" required placeholder="Projenin Durumu">
                                    </div>


                                    <button class="btn btn-success" style="width: 100%;margin-top: 20px" type="submit">
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
