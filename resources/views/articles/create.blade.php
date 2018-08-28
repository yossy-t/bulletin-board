@extends('layouts.application')

@section('title', '新規作成')

@section('content')
  <form action="/articles" method="post">
  {{ csrf_field() }}
  <div>
  <lavel for="title">タイトル</lavel>
  <input type="text" name="title" placeholder="記事タイトルを入れる">
  </div>
  <div>
    <lavel for="body">内容</lavel>
    <textarea name="body" cols="80" rows="8" placeholder="記事の内容を入れる"></textarea>
  </div>
  <div>
    <input type="submit" value="送信">
  </div>
  </form>
@endsection