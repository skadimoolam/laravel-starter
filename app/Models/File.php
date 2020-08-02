<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class File extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function fileable() {
        return $this->morphTo();
    }

    public function getSrcAttribute()
    {
        return url("/uploads/{$this->id}.{$this->ext}");
    }

    static function upload(Request $request, string $selecter, $model, $title = null)
    {
        if ($request->has($selecter)) {
            if (gettype($request->file($selecter) == 'object')) {
                $file = new File();
                $file->ext = $request->file($selecter)->getClientOriginalExtension();
                $file->title = $title;
                $file->fileable_type = get_class($model);
                $file->fileable_id = $model->id;
                $file->save();

                if (!is_dir(public_path('uploads'))) mkdir(public_path('uploads'));
                $request->file($selecter)->move(public_path('uploads/'), $file->id . '.' . $file->ext);
            } else {
                foreach ($request->file($selecter) as $sFile) {
                    $file = new File();
                    $file->ext = $sFile->getClientOriginalExtension();
                    $file->title = $title;
                    $file->fileable_type = get_class($model);
                    $file->fileable_id = $model->id;
                    $file->save();

                    if (!is_dir(public_path('uploads'))) mkdir(public_path('uploads'));
                    $sFile->move(public_path('uploads/'), $file->id . '.' . $file->ext);
                }
            }
        }
    }

    public function scopeSearch($query, $q)
    {
        return $query
                ->where('title', 'LIKE', "%{$q}%")
                ->orWhere('fileable_type', 'LIKE', "%{$q}%")
                ->orWhere('fileable_id', 'LIKE', "%{$q}%")
                ->orWhere('ext', 'LIKE', "%{$q}%");
    }
}
