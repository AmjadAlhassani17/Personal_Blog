<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AritcleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('home.index', compact('articles'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Display a listing of the resource.
     */
    public function profileAboutme()
    {
        return view('home.profileAboutme');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('home.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'full_text'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $desPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($desPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $article = Article::create([
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'image' => $input['image'],
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
        ]);


        $tagsInput = $request->input('tags');
        $tagsArray = explode(',', $tagsInput);

        foreach ($tagsArray as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $article->tags()->attach($tag->id);
        }

        return redirect()->route('home.index')->with('success', 'Articles added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $home)
    {
        return view('home.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $home)
    {
        $categories = Category::all();
        return view('home.edit', compact(['home' , 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $home)
    {
        $request->validate([
            'title'=>'required',
            'full_text'=>'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $desPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($desPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $home->update($input);

        $tagsInput = $request->input('tags');
        $tagsArray = explode(',', $tagsInput);

        $home->tags()->detach();

        foreach ($tagsArray as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $home->tags()->attach($tag->id);
        }

        return redirect()->route('home.index')->with('success', 'Article updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $home)
    {
        try {
            $home->delete();
            return redirect()->route('home.index')->with('success', 'Article deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('home.index')->with('error', 'Error deleting the article: ' . $e->getMessage());
        }
    }
}
