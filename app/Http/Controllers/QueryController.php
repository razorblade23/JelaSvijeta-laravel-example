<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Tag;

class QueryController extends Controller
{
    public function index(Request $request) {
        $mealsQuery = Meal::query();
        $categoryQuery = Category::query();
        $ingredientQuery = Ingredient::query();
        $tagQuery = Tag::query();

        if ($request->get('per_page')) {
            return $mealsQuery->paginate((int)$request->get('per_page'))->withPath('query');
        }

        if ($request->get('category')) {
            if ($request->get('category') == 'NULL') {
                $mealsQuery->where('category_id', null);
            }
            elseif ($request->get('category') == '!NULL') {
                $mealsQuery->where('category_id', '!=', null);
            }
            else {
                $mealsQuery->where('category_id', $request->get('category'));
            }
        }


        if ($request->get('tags')) {
            $tags = explode(',', $request->get('tags'));
            foreach ($tags as $tag) {
                $mealsQuery->where('tag_id', (int)$tag);
            }
        }

        if ($request->get('with')) {
            $withArgs = explode(',', $request->get('with'));
            foreach ($withArgs as $with) {
                if ($with == 'ingredients') {
                    $ingredientQuery->where('id', (int)$tag)->get();
                }
                if ($with == 'category') {

                }
                if ($with == 'tags') {

                }
                $mealsQuery->where('tag_id', (int)$tag);
            }

        }

        if ($request->get('lang')) {

        }

        if ($request->get('diff_time')) {

        }

        return $mealsQuery->get();
        }
}
