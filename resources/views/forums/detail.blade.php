@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1 class="text-center text-muted">
                {{__("Posts del foro :name",['name'=> $foros->name])}}
            </h1>

            <a href="/" class="btn btn-info pull-right">
                {{ __('Volver al listado de foros')}}
            </a>
            <div class="clearfix"></div>
            <br>
            @forelse($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-post">
                        <a href="{{route('post-detalle',$post->slug)}}">{{$post->title}}</a>
                        {{--nombre de usuario--}}
                        <span class="pull-right">{{__('Owner')}}:{{$post->owner->name}}</span>
                    </div>

                    <div class="panel-body">
                        {{$post->description}}
                        @if($post->attachment)
                            <img src="{{url($post->pathAttachment())}}" class="img-responsive img-rounded img-thumbnail"/>
                        @endif

                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    {{__('No hay ningún foro en este momento')}}
                </div>
            @endforelse
            @if($posts->count())
              {{ $posts->links() }}
            @endif
           {{--verifica si esta logeado--}}
            @Logged()
            {{$foros->name}}
            @include('partials.partial-errors')
                <form method="POST" action="/posts/save">
                {{ csrf_field() }}
                <input type="hidden" name="forum_id" value="{{$foros->id}}">
                <div class="form-group">
                  <label for="title" class="col-md-12 control-label">{{__('Titulo')}}</label>
                <input type="text" class="form-control" name="title" id="" aria-describedby="title" placeholder="Titulo" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-12 control-label">{{__('Descripcion')}}</label>
                <textarea name="description" class="form-control" id="name">{{old('description')}}</textarea>
                </div>
                <button type="submit" name="addPost" id="addPosdt" class="btn btn-primary">{{__("Añadir Post")}}</button>
                </form>
            @else
                @include('partials.login_link',["message"=>__("Inicia sesion para crear un post")]);
            @endLogged()
        </div>
    </div>
@endsection