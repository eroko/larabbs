<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function show(Category $category,Topic $topic,Request $request,User $user)
    {
        $topics=Topic::with('category','user')
            ->where('category_id',$category->id)
            ->with('user','category')
            ->paginate(20);

        $active_users = $user->getActiveUsers();

        return view('topics.index',compact('topics','category','active_users'));
    }
}
