<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        return CategoryResource::collection($categories);
    }

    public function show($id)
    {
        return new CategoryResource(Category::find($id));
    }

    public function posts(request $request, $id, $salon_id=null, $tag_id=null)
    {
        $posts = Post::where('category_id', $id);

        $limit = $request->limit ?? 500;
        $offset = $request->offset ?? 0;
        
        if($salon_id) {
            $posts->whereHas('salons', 
            function($query) use($salon_id) {
                $query->where('salon_id', $salon_id);
            });
        }

        if($tag_id) {
            $posts->whereHas('tags', 
            function($query) use($tag_id) {
                $query->where('tag_id', $tag_id);
            });
        }

        $result = PostResource::collection($posts->offset($offset)->limit($limit)->get());
        return $result;
    }
}
