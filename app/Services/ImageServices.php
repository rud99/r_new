<?php
/**
 * Created by PhpStorm.
 * User: Miha
 * Date: 05.11.2018
 * Time: 10:13
 */

namespace App\Services;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageServices
{
    public function all()
    {
        $images = DB::table('images')->select('*')->get();
        $myImages = $images->all();

        return $myImages;
    }

    public function add($image, $title)
    {
        $filename = $image->store('uploads');
        DB::table('images')->insert(['image' => $filename, 'title' => $title]);

        return true;
    }

    public function one($id)
    {
        $image = DB::table('images')->select('*')->where('id', $id)->first();
        $myImage = $image;

        return $myImage;
    }

    public function update($id, $newImage)
    {
        $newIm = $newImage->image;
        $newTitle = $newImage->title;
        $updArr =[];
        if ($newIm) {
            $image = $this->one($id);
            Storage::delete($image->image);
            $filename = $newIm->store('uploads');
            $updArr = ['image' => $filename];
        }
        $updArr = array_merge($updArr,['title' => $newTitle,'updated_at' => date("Y-m-d H:i:s")]);
        DB::table('images')->where('id', $id)->update($updArr);
    }

    public function delete($id)
    {
        $image = $this->one($id);
        Storage::delete($image->image);
        DB::table('images')->where('id', $id)->delete();
    }

    /**
     * Обновляем поле views при просмотре картинки
     * @param $id
     */
    public function updateViews($id)
    {
        $viewsCount = DB::table('images')->select('views')->where('id', $id)->first();
        DB::table('images')->where('id', $id)->update(['views' => $viewsCount->views+1]);
    }
}