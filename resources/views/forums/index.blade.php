@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          <h1 class="text-center text-muted">{{__("Foros")}}</h1>
            @forelse($forums as $forum)
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-forum">
                        <a href="forums/{{$forum->id }}">{{$forum->name}}</a>
                        <span class="pull-right">
                            {{__('Post')}}:{{$forum->post->count()}}
                            {{__('Respuestas')}}:{{$forum->replies->count()}}
                        </span>
                    </div>

                    <div class="panel-body">
                        {{$forum->description}}
                    </div>
                </div>
                @empty
                <div class="alert alert-danger">
                    {{__('No hay ningún foro en este momento')}}
                </div>
            @endforelse
            @if($forums->count())
                {{$forums->links()}}
            @endif
            <h2>{{__('Añadir un nuevo foro')}}</h2>
          @include('partials.partial-errors')
            <form method="POST" action="{{route('save-post')}}">

                {{csrf_field()}}
                <div class="form-group">
                <label for="name">{{__('Nombre')}}</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
           
                </div>
               
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">{{__('Descripcion')}}</label>
                <textarea class="form-control" id="descripcion" name="description" rows="3">{{old('description')}}</textarea>
                </div>
                <button type="submit" name="addForum" class="btn btn-default">{{__('Añadir foro')}}</button>
              </form>
        </div>
    </div>
@endsection