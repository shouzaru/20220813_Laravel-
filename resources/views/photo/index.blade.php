@extends('layouts.app')
@section('content')
<!-- Lazysizesを実装する -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js"></script>

@canany(['isAdmin','isReadandTag','isReadOnly']) <!-- いずれかの権限でログインした人だけに許可 -->
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

<!-- チーム全体写真（学年別） -->
<div class="container mt-2 mb-2">
    <h3>チーム全体写真（学年別）</h3>
        <ul class="nav nav-tabs">
            <il class="nav-item">
                <a href="{{ route('photo.index') }}" class="nav-link active">最新</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.rokunen') }}" class="nav-link">6年生</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.gonen') }}" class="nav-link">5年生</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.yonen') }}" class="nav-link">4年生</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.sannen') }}" class="nav-link">3年生</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.ninen') }}" class="nav-link">2年生</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.ichinen') }}" class="nav-link">1年生</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.nenchou') }}" class="nav-link">未就学</a>
            </il>
        </ul>
</div>

<!-- 写真へのタグ付け -->
<div class="container mt-2 mb-2">
    <h3>写真へのタグ付け</h3>
        <ul class="nav nav-tabs">
            <il class="nav-item">
                <a href="{{ url('photo.taggingAll') }}" class="nav-link">タグ付け（全て）</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('photo.taggingNone') }}" class="nav-link">タグ付け（未編集）</a>
            </il>
        </ul>
</div>

<!-- 各選手の写真へのリンク -->
<div class="container mt-2 mb-2">
    <h3>各選手の写真</h3>
        <ul class="nav nav-tabs">
            @foreach ($players->sortBy('number')  as $player)
            <il class="nav-item">
                <a href="{{ route('player.show',$player->id)}}" class="nav-link">{{ $player->nickname }}#{{ $player->number }}</a>
            </il>
            @endforeach
        </ul>
</div>






<div class="container">
    <div class="row text-center">
    <h3>最新</h3>
        <div class="col">            
            @foreach($photos->sortByDesc('date') as $photo)
            <!-- LightBoxを実装 -->
            <!-- <a href="/storage/uploads/{{ $photo->path }}" data-lightbox="group"><img src="/storage/uploads/{{ $photo->path }}" alt="IMage" loading="lazy" class="col-lg-3 col-md-4 rounded m-1 img-fluid"></a> -->
            <!-- lazysisesで遅延ロードを実装 -->
            <a href="{{ route('photo.edit',$photo->id)}}"><img data-src="/storage/uploads/{{ $photo->path }}" alt="IMage" class="lazyload col-lg-3 col-md-4 rounded m-1 img-fluid"></a>

            
            @endforeach            
        </div>
    </div>
</div>

@else
<div class="container">
    <div class="row text-center">
        <h1>ログインしてください。</h1>
    </div>
</div>
@endcan
@endsection
