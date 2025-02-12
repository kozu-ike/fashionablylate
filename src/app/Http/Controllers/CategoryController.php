<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function destroy($id)
    {
        // 特定のカテゴリを取得
        $category = Category::findOrFail($id);

        // カテゴリを削除
        $category->delete();

        // 削除後、一覧ページなどにリダイレクト
        return redirect()->route('categories.index')->with('success', 'カテゴリーが削除されました');
    }
}
