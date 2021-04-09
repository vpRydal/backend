<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsCollection;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param Request $request
     *
     * @return NewsCollection
     */
    public function __invoke(Request $request)
    {
        $request->has('count')?$count=$request->get('count'):$count=5;
        return new NewsCollection(News::paginate($count));
    }

    public function get(News $news)
    {
       return $news;
    }
}
