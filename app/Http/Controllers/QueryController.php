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
            // This is working OK
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
            // This is working OK
        }


        if ($request->get('tags')) {
            $tags = explode(',', $request->get('tags'));
            foreach ($tags as $tag) {
                $mealsQuery->where('tag_id', (int)$tag);
                // This is working for 1 tag but not for more, not sure why
            }
        }

        if ($request->get('with')) {
            $withArgs = explode(',', $request->get('with'));
            foreach ($withArgs as $with) {
                if ($with == 'ingredients') {
                    // Need to think this thru
                }
                if ($with == 'category') {
                    // Need to think this thru
                }
                if ($with == 'tags') {
                    // Need to think this thru
                }
                $mealsQuery->where('tag_id', (int)$tag);
            }

        }

        if ($request->get('lang')) {
            // Need to think this thru and populate (seed) database with translations
        }

        if ($request->get('diff_time')) {
            // Need to think this thru
        }

        return $mealsQuery->get();
        }
}
