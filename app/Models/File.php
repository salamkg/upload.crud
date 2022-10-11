<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file'];

    public function remove()
    {
        Storage::delete('uploads/' . $this->file);
        $this->delete();
    }

    public function getFile()
    {
        return '/uploads/' . $this->file;
    }

}
