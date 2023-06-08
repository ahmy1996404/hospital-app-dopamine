<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Article::query()->orderByDesc('created_at');

            $data = $data->get();

            return view('admin.article.index', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $edit = false;
            $categories = ArticleCategory::query()->orderByDesc('name')->get();
            return view('admin.article.form', compact('edit', 'categories'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['thumbnail_img', 'header_img']);
            if ($request->file('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/article/thumb'), $filename);
                $data['thumbnail_img'] = $filename;
            }
            if ($request->file('header_img')) {
                $file = $request->file('header_img');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/article'), $filename);
                $data['header_img'] = $filename;
            }
            $article = Article::query()->create($data);

            if ($article) {
                DB::commit();
                return redirect()->route('admin.article.index')->with('success', __('message.Done Save Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Article::query()->findOrFail($id);

            
            return view('admin.article.show', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $edit = true;
            $data = Article::query()->findOrFail($id);
            $categories = ArticleCategory::query()->orderByDesc('name')->get();
             
            return view('admin.article.form', compact('edit', 'data', 'categories' ));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['thumbnail_img', 'header_img']);
            $article = Article::query()->findOrFail($id);
            if ($request->file('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                @unlink(public_path('upload/article/thumb/') . $article->thumbnail_img);
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/article/thumb'), $filename);
                $data['thumbnail_img'] = $filename;
            }
            if ($request->file('header_img')) {
                $file = $request->file('header_img');
                @unlink(public_path('upload/article/') . $article->header_img);
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/article'), $filename);
                $data['header_img'] = $filename;
            }
            
            if ($article->update($data)) {
                DB::commit();
                return redirect()->route('admin.article.index')->with('success', __('message.Done Updated Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $article = Article::query()->findOrFail($id);

            if ($article->delete()) {
                DB::commit();
                return redirect()->route('admin.article.index')->with('success', __('message.Done Deleted Data Successfully'));
            }

            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
