<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * HaruReview
         * 今はAllで取ってきていますが、記事の一覧を表示する場合はpaginationを使用するのが多いと思いますので、次回実装時にはぜひ実装してみてください！
         * 今回は要望としてなかったと認識してますが、もし次回実装する場合は石田さんからpaginateはどうします？と聞いてくれると嬉しいです！
         *
         * また、これは必要じゃないパターンも多いですが、検索等要望があったときにどう実装するかも考えてみてください。
         */
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * HaruReview
         * 今、'articles.create'と'articles.edit'でviewが分かれていますが、ほとんど同じ見た目と構成なので、同じViewファイルが使えないか検討してみてください。
         * 共通できる部分と、共通できない部分を分けて考えて、できる部分はどうするか、できない部分はどうするかと考えてみるのが良いかと思います。
         */
        return view('articles.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * HaruReview
         * 次回実装時には簡単なバリデーションも実装してみてください。バリデーションがわからない場合は別途調べてみてください！
         */

        // モデルからインスタンス作成
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        // 保存
        $article->save();

        /**
         * HaruReview
         * 保存が成功したときに、保存に成功しましたと表示して、失敗したときに、失敗理由等が表示できる仕組みをつけるとより良いかと思います。
         * (例)
         * redirect('/articles')->with('success', '投稿しました！')
         * redirect('/articles')->with('error', '投稿失敗しました。管理者にお問い合わせください')
         */

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ["article" => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return redirect("/articles/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');
    }
}
