@extends('layouts.app')
@section('content')
<!-- Lazysizesを実装する -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js"></script>

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
        <ul class="nav nav-tabs">
            <il class="nav-item">
                <a href="{{ route('photo.index') }}" class="nav-link">写真一覧</a>
            </il>
            <il class="nav-item">
                <a href="{{ route('photo.create') }}" class="nav-link">写真アップロード</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('players') }}" class="nav-link">選手登録</a>
            </il>
        </ul>
</div>

@canany(['isAdmin','isReadandTag','ReadOnly']) <!-- いずれかの権限でログインした人だけに許可 -->



<div class="container">
    <div class="row text-center">
        <h1>{{ $player->nickname }}の写真一覧</h1>
        <div class="col">            
        @foreach ($player->photos->sortByDesc('date') as $photo)
            <!-- lazysisesで遅延ロードを実装 -->
            <a href="{{ route('photo.edit',$photo->id)}}"><img data-src="/storage/uploads/{{ $photo->path }}" alt="IMage" class="lazyload col-lg-3 col-md-4 rounded m-1 img-fluid"></a>
            @endforeach            
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
@endsection


