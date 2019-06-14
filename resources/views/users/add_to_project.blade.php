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

                                <h3  style="width:85% ;" class="box-title" >KULLANICIYI PROJEYE EKLE</h3>



                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <form action="{{url('/users/add_user_to_project')}}" method="post">

                                {{csrf_field()}}

                                <div class="box-body">

                                    <input type="hidden" value="{{$user_id}}" name="user_id">

                                    <div class="form-group">
                                        <label>Kullanıcıyı eklemek istediğiniz projeyi seçiniz..</label>
                                        <select class="form-control" name="project_id">

                                            @foreach($projects as $project)
                                                <option name="project_id" value="{{$project->id}}">{{$project->title}}</option>
                                                @endforeach

                                        </select>
                                    </div>

                                    <button class="btn btn-success" style="width: 100%" type="submit">
                                        <i class="fa fa-save"></i> EKLE
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
