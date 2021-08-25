<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\SalonResource;
use App\Models\Salon;

class SalonApiController extends Controller
{
    public function posts($id)
    {
        $salon = Salon::find($id);
        $posts = $salon->posts()->with('author', 'category', 'images', 'videos')->orderBy('id', 'desc')->paginate();
        return PostResource::collection($posts);
    }
}
