@extends('layouts.application')

@section('title','記事内容')

@section('content')
  <div>
    <a href="/articles/create">新規作成</a>
    <a href="/logout">ログアウト</a>
  </div>
  @foreach ($articles as $article)
  <h4>{{$article->title}}</h4>
  <p>{{$article->body}}</p>
  <a href="/articles/{{$article->id}}">詳細を表示</a>
  <a href="/articles/{{$article->id}}/edit">編集する</a>
  <form action="/articles/{{$article->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">
    <input type="submit" name="" value="削除する">
  </form>
  <hr>
  @endforeach
@endsection