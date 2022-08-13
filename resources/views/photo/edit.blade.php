<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
        <ul class="nav nav-tabs">
            <il class="nav-item">
                <a href="{{ route('photo.index') }}" class="nav-link active">写真一覧</a>
            </il>
            <il class="nav-item">
                <a href="{{ route('photo.create') }}" class="nav-link">写真アップロード</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('players') }}" class="nav-link">選手登録</a>
            </il>
        </ul>
</div>


@canany(['isAdmin','isReadandTag']) <!-- roleがAdminとReadandTagのユーザーは以下を表示する -->
<div class="container">
    <div class="row text-center">
        <div class="col">
            <img src="/storage/uploads/{{ $photo->path }}"  class=" img-fluid"/>
            <p>{{ $photo->date }}</p>
            <iframe id="iframe" name="iframe" style="display: none;"></iframe>  <!-- ボタンを押しても画面遷移しない 参考：https://qiita.com/tokuppee15/items/3344b6e708fcbd4b89fd -->
            <form action="{{ route('photo.update',$photo->id)}}" method="POST" target="iframe">  <!-- targenの指定でボタン押しても画面遷移しない -->
                    @csrf
                    @method('PUT')
                <p>
                    @foreach ($playerList as $player)
                    <label class="checkbox">
                        <input type="checkbox" name="players[]" value="{{$player->id}}" @if(in_array($player->id,$players)) checked @endif>
                        {{ $player->nickname }}
                    </label>
                    @endforeach
                    <!-- <input type="submit" value="タグを編集する"> -->
                    <button id="submit-button" type="submit" class="btn btn-info" onclick='alert("タグを編集しました")'>タグを編集する</button>
                </p>
            </form>
        </div>
    </div>
</div>

@else
<div class="container">
    <div class="row text-center">
        <h1>この権限では許可されていません。ログインしてください。</h1>
    </div>
</div>
@endcan


@can('isAdmin') <!-- roleがAdminのユーザーのみ以下を表示する -->
<div class="container text-end">
    <div class="row">
        <div class="col">
        <h3>この写真を削除する</h3>
        <form action="{{ route('photo.destroy', $photo->id)}}" method="POST">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか")'>削除</button>
        </form>
        </div>
    </div>
</div>
@endcan









@endsection