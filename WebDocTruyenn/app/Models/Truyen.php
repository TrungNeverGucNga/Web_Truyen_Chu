<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'tentruyen', 'tomtat', 'kichhoat','hinhanh','danhmuc_id' ,'slug_truyen','tacgia','theloai_id',
    ];
    protected $table = 'truyen';
    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\DanhMucTruyen','danhmuc_id','id');
    }
    public function chapter(){
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    }
    public function theloaitruyen(){
        return $this->belongsTo('App\Models\TheloaiTruyen','theloai_id','id');
    }
    public function thuocnhieudanhmuctruyen(){
        return $this->belongsToMany(DanhmucTruyen::class,'thuocdanh','truyen_id','danhmuc_id');
    }
    public function thuocnhieutheloaitruyen(){
        return $this->belongsToMany(TheloaiTruyen::class,'thuocloai','truyen_id','theloai_id');
    }
}