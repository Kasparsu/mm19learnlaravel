<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image'];

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getIsLikedAttribute(){
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

    /**
     * @param UploadedFile $image
     */
    public function setImageAttribute($image){
        $path = $image->store('public');
        $this->image_path = Storage::url($path);
    }

    public function getExcerptAttribute(){
        $parts = explode("\n\n",$this->body);
        if(strlen($parts[0])<300) {
            return $parts[0];
        } else {
            $sentences = explode(".", $parts[0]);
            $excerpt = '';
            $length = count($sentences) < 5 ? count($sentences) : 5;
            for($i=0;$i<$length;$i++){
                $excerpt.= $sentences[$i] . ".";
            }
            return $excerpt;
        }
    }
}
