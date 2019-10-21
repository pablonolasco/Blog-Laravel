@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <h1 class="text-center text-muted">{{__("Respuestas al debate :name",['name'=>$post->title])}}</h1>
            @forelse($replices as $reply)
                <div class="panel panel-default">
                    <div class="panel-heading">

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
        </div>
    </div>
@endsection