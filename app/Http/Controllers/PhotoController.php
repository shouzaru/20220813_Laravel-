<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Player;
use Illuminate\Support\Str;
use Validator;
use Auth;
use Illuminate\Support\Facades\Storage;  //画像ファイル削除機能のため追加
use Image; // intervention/imageライブラリの読み込み
use Carbon\Carbon;  //日付を扱うCarbonライブラリ

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        $players = Player::all();
        return view('photo.index', compact('players', 'photos'));
    }

    public static function nenchou()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2018-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $photo_nenchou=Photo::whereBetween('date', [$nenchou, $ichinen])->get();
        return view('photo.nenchou', compact('players', 'photos', 'photo_nenchou'));  //修正
    }

    public static function ichinen()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2018-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $photo_ichinen=Photo::whereBetween('date', [$ichinen, $ninen])->get();
        return view('photo.ichinen', compact('players', 'photos', 'photo_ichinen'));  //修正
    }

    public static function ninen()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2019-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $photo_ninen=Photo::whereBetween('date', [$ninen, $sannen])->get();
        return view('photo.ninen', compact('players', 'photos', 'photo_ninen'));  //修正
    }

    public static function sannen()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2019-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $photo_sannen=Photo::whereBetween('date', [$sannen, $yonen])->get();
        return view('photo.sannen', compact('players', 'photos', 'photo_sannen'));  //修正
    }

    public static function yonen()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2019-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $photo_yonen=Photo::whereBetween('date', [$yonen, $gonen])->get();
        return view('photo.yonen', compact('players', 'photos', 'photo_yonen'));  //修正
    }

    public static function gonen()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2019-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $photo_gonen=Photo::whereBetween('date', [$gonen, $rokunen])->get();
        return view('photo.gonen', compact('players', 'photos', 'photo_gonen'));  //修正
    }

    public static function rokunen()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        //  データベースから各学年ののデータを取り出す
        $nenchou = new Carbon('2019-04-01');
        $ichinen = new Carbon('2020-04-01');
        $ninen = new Carbon('2021-04-01');
        $sannen = new Carbon('2022-04-01');
        $yonen = new Carbon('2023-04-01');
        $gonen = new Carbon('2024-04-01');
        $rokunen = new Carbon('2025-04-01');
        $rokunenowari = new Carbon('2026-04-01');
        $photo_rokunen=Photo::whereBetween('date', [$rokunen, $rokunenowari])->get();
        return view('photo.rokunen', compact('players', 'photos', 'photo_rokunen'));  //修正
    }

    public static function taggingAll()
    {
        $photos = Photo::all();
        $players = Player::all();  //追加
        return view('photo.taggingAll', compact('players', 'photos'));  //修正
    }

    public static function taggingNone()
    {
        $photos = Photo::all();
        $players = Player::all();  
        
        // タグがついていない写真だけを抽出して送る

        return view('photo.taggingNone', compact('players', 'photos')); 
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::all();
        $photos = Photo::all();  //追加
        // return view('photo.create', compact('players'));
        return view('photo.create', compact('players', 'photos'));  //修正
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = Photo::create($request->all());
        $photo->players()->attach(request()->players);
        return redirect()->route('photo.index')->with('success', '新規登録完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $photos = Photo::all(); //追加
        $photo = Photo::find($id);

        // $photos = Photo::all();
        $players = $photo->players->pluck('id')->toArray();
        $playerList = Player::all();
        return view('photo.edit', compact('photo', 'players', 'playerList'));
        // return view('photo.edit', compact('photo', 'photos', 'players', 'playerList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        $photo->players()->sync(request()->players);
        return back()->with('success', '編集完了しました');
        // return redirect()->route('photo.index')->with('success', '削除完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $photo = Photo::find($id);
        // アップロード済みの写真のパスを取得
        $path = $photo->path;
        // $target_path = public_path('/uploads/');
        // $npath = $target_path . $path;
        // dd($npath);
        
        // ファイルが登録されていれば削除
        if ($path !== '') {
          Storage::disk('public')->delete('uploads/' . $path);
        }

        $photo->delete();
        $photo->players()->detach();
        return redirect()->route('photo.index')->with('success', '削除完了しました');
    }

        // 画像アップロード処理
    public function upload(Request $request){

        //複数の画像ファイル取得
        $files = $request->file('photo');  //修正
        // dd($files);

        // バリデーション 
            //  $validator = $request->validate( [
            //      'photo' => 'required|file|image|max:20480', 
            //  ]);

            //画像ファイルのexifデータ取得、撮影日取得
            if ( !empty($files) ){
            foreach($files as $file){
             
                $exifdata=exif_read_data($file, 0, true);
                $dateTimeOriginal = isset($exifdata["EXIF"]['DateTimeOriginal']) ? $exifdata["EXIF"]['DateTimeOriginal'] : "";
                // dd($dateTimeOriginal);

                $img = Image::make($file); //追加
                $img->orientate();         // スマホアップ画像に対応
                $img->resize(
                    2048,  //LINEアルバムの設定に合わせて横2048pixlに設定
                    null,
                    function ($constraint) {
                        // 縦横比を保持したままにする
                        $constraint->aspectRatio();
                        // 小さい画像は大きくしない
                        $constraint->upsize();
                    }
                );

                
                $ext = $file->guessExtension(); // ファイルの拡張子取得
                // $fileName = Str::random(32).'.'.$ext; //ファイル名を生成
                $fileName = $dateTimeOriginal.'.'.$ext; //ファイル名を生成
                // $fileName = Str::random(32).'.webp'; //.webpに拡張子を変更して容量を減らす
                $pathFileName = "app/public/uploads/" . $fileName; //保存先のパス名
                $save_path = storage_path($pathFileName); //保存先

                while(file_exists($save_path)){
                    $randomstr = Str::random(3); //ファイル名を生成
                    $fileName = $dateTimeOriginal . '_' . $randomstr .'.'.$ext;
                    $pathFileName = "app/public/uploads/" . $fileName;
                    $save_path = storage_path($pathFileName); //保存先
                }

                $img->save($save_path); //保存

             

                    //ファイルを cms/storage/app/public/uploadsに、$fileNameで保存。 storeAs('ディスク内のディレクトリー', 'ファイル名', 'ディスク');
                    // $file->storeAs('uploads', $fileName , 'public');


            
                    // 画像のファイル名を任意のDBに保存
                    $photo = Photo::create([
                        "path" => $fileName,
                        "date" => $dateTimeOriginal,
                    ]);

                    $photo->players()->attach(request()->players); //追加 photoとplayerのリレーション
            
            }}
            return redirect('photo');
        }

         
}
