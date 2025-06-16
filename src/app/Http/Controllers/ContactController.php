<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function showForm()
    {
        $categories = Category::all();
        return view('contact.form', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email',
            'tel' => 'required',
            'address' => 'required',
            'building' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'detail' => 'required|max:1000',
        ]);

        // カテゴリー名取得
        $category = Category::find($validated['category_id']);
        $validated['category_name'] = $category ? $category->content : '';

        // フルネームとして name を作成
        $validated['name'] = $validated['last_name'] . ' ' . $validated['first_name'];

        return view('contact.confirm', ['data' => $validated]);
    }

    public function submit(Request $request)
    {
        // 🔽 ここで送られてきた値を確認（デバッグ用）
        dd($request->all());

        $validated = $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email',
            'tel' => 'required',
            'address' => 'required',
            'building' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'detail' => 'required|max:1000',
        ]);

        // データベースに保存
        try {
            Contact::create($validated);
            return redirect()->route('contact.thanks')->with('success', 'お問い合わせを送信しました。');
        } catch (\Exception $e) {
            return back()->withErrors('送信中にエラーが発生しました。もう一度お試しください。');
        }
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}