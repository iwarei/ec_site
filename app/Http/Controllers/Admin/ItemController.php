<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(Request $request) 
    {
        $items = Item::query()->get();

        return view('admin.item.index', compact('items'));
    }

    public function create(Request $request) 
    {
        // 外部キー制約があるため一旦適当なカテゴリID で作成
        $category = Category::query()
            ->where('parent_id', '<>', 0)
            ->first();

        // カテゴリが存在しない場合アラート表示
        if (!isset($category)) {
            return redirect(route('admin.category.index'))
                ->with('danger', 'カテゴリを登録してからアイテム登録を行ってください。');
        }

        // 親カテゴリを取得
        $parent_categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        return view('admin.item.create', compact('parent_categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' =>  ['required', 'integer', 'exists:App\Models\Category,id'],
            'images' => ['required', 'json'],
            'description' => ['required', 'string'],
            'price' => ['integer'],
        ]);

        $images = json_decode($request->input('images'));
        
        DB::beginTransaction();

        try {
            // 商品情報を登録
            $item = new Item();

            $item->fill($request->all())
                ->save();

            // 画像を登録する
            foreach ($images as $i => $image) {
                $image = Image::make($image)
                ->widen(config('const.IMAGE_MAX_WIDTH'), function($constraint) {
                    $constraint->upsize();
                })
                ->orientate()
                ->encode(config('const.IMAGE_EXTENSION'), config('const.IMAGE_QUALITY'));
            
                //ファイル名を生成
                $filename =  str()->uuid() . '.' . config('const.IMAGE_EXTENSION');
                $path = 'public/items/' . $item->id . '/' .  $filename;

                if (!Storage::put($path, (string) $image)) {
                    throw new \Exception('画像保存に失敗');
                }

                ItemImage::create([
                    'item_id' => $item->id,
                    'filename' => $filename,
                    'display_order' => $i + 1
                ]);
            }

            DB::commit();
        }
        catch (\Exception $e){
            DB::rollBack();
            Log::error($e);

            return redirect(route('admin.item.index'))->with('success', 'アイテム情報の登録中にエラーが発生しました。');
        }

        return redirect(route('admin.item.index'))->with('success', 'アイテム情報を登録しました。');
    }


    public function show(Item $item) 
    {
        return redirect(route('admin.item.edit', compact('item')));
    }

    public function edit(Request $request, Item $item)
    {
        // 親カテゴリを取得
        $parent_categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        return view('admin.item.edit', compact('item', 'parent_categories'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' =>  ['required', 'integer', 'exists:App\Models\Category,id'],
            'images' => ['required', 'json'],
            'description' => ['required', 'string'],
            'price' => ['integer'],
        ]);

        $images = json_decode($request->input('images'));
        
        DB::beginTransaction();

        try {
            // 商品情報を更新
            $item->fill($request->all())
                ->save();

            // 削除候補の画像
            $deleteImages = ItemImage::query()
                ->where('item_id', $item->id)
                ->get();

            // 画像を登録する
            foreach ($images as $i => $image) {
                preg_match('/\/([\w-]+\.jpg)$/', $image, $matches);

                if ($matches){
                    $find = ItemImage::query()
                        ->where('filename', $matches[1])
                        ->where('item_id', $item->id)
                        ->first();
                }
                    
                if (isset($find)) {
                    //存在する場合は順序を更新
                    $find->display_order = $i + 1;
                    $find->save();
                    
                        //削除候補から除く
                    foreach($deleteImages as $i => $img){
                        if($img->filename == $find->filename){
                            $deleteImages->forget($i);

                            break;
                        }
                    }

                }  
                else {
                    $image = Image::make($image)
                    ->widen(config('const.IMAGE_MAX_WIDTH'), function($constraint) {
                        $constraint->upsize();
                    })
                    ->orientate()
                    ->encode(config('const.IMAGE_EXTENSION'), config('const.IMAGE_QUALITY'));
                
                    //ファイル名を生成
                    $filename =  str()->uuid() . '.' . config('const.IMAGE_EXTENSION');
                    $path = 'public/items/' . $item->id . '/' .  $filename;
    
                    if (!Storage::put($path, (string) $image)) {
                        throw new \Exception('画像保存に失敗');
                    }
    
                    ItemImage::create([
                        'item_id' => $item->id,
                        'filename' => $filename,
                        'display_order' => $i + 1
                    ]);
                }
            }
            
            // DBの画像情報を物理削除
            foreach($deleteImages as $image){
                ItemImage::query()
                    ->where('id', $image->id)
                    ->delete();
                
                // ストレージ上からも削除
                Storage::delete($image->path);
            }

            DB::commit();
        }
        catch (\Exception $e){
            Log::erroe($e);
            DB::rollBack();

            return redirect(route('admin.item.index'))->with('success', 'アイテム情報の更新中にエラーが発生しました。');
        }

        return redirect(route('admin.item.index'))->with('success', 'アイテム情報を更新しました。');
    }


}
