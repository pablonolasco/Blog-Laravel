@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center text-muted">{{__("Respuestas al debate :name",['name'=>$post->title])}}</h1>


            <h4>{{__('Autor del debate')}}: {{$post->owner->name}}</h4>
            <a href="{{route('detalle-foro',$post->forum->id)}}" class="btn btn-info pull-right">
                {{__('Volver al foro :name',['name'=>$post->forum->name])}}
            </a>
            <div class="clearfix"></div>
            <br>
            @forelse($replices as $reply)
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-reply">

                      <p>{{__('Respuesta de')}}: {{$reply->author->name}}</p>

                    </div>

                    <div class="panel-body">
                        {{$reply->reply}}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    {{__('No hay ningúna respuesta en este momento')}}
                </div>
            @endforelse
            @if($replices->count())
                {{ $replices->links() }}
            @endif
            @Logged()
            {{$foros->name}}
            @include('partials.partial-errors')
            <form method="POST" action="/repuesta/save">
                {{ csrf_field() }}
                <input type="hidden" name="forum_id" value="{{$post->id}}">
             
                <div class="form-group">
                    <label for="respuesta" class="col-md-12 control-label">{{__('respuesta')}}</label>
                <textarea name="respuesta" class="form-control" id="name">{{old('respuesta')}}</textarea>
                </div>
                <button type="submit" name="addRes" id="addRes" class="btn btn-primary">{{__("Añadir Respuesta")}}</button>
                </form>
            @else
            @include('partials.login_link',["message"=>__("Inicia sesion para crear responder")]);
            @endLogged
        </div>
    </div>
@endsection