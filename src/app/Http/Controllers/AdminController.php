<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 一覧表示 (ページネーション)
    public function index()
    {
        $contacts = Contact::paginate(7);
        return view('admin.admin', compact('contacts'));
    }

    // 検索処理
    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->has('name_or_email') && $request->name_or_email != '') {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name_or_email . '%')
                    ->orWhere('email', 'like', '%' . $request->name_or_email . '%');
            });
        }

        if ($request->has('gender') && $request->gender != '性別') {
            $query->where('gender', $request->gender);
        }

        if ($request->has('detail') && $request->detail != 'お問い合わせの種類') {
            $query->where('detail', $request->detail);
        }

        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);
        return view('admin.admin', compact('contacts'));
    }

    // 詳細ページ表示
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.details', compact('contact'));
    }

    // 削除処理
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.adminphp artisan route:cache')->with('success', 'お問い合わせが削除されました。');
    }

    // エクスポート処理
    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->has('name') && $request->name != '') {
            $query->where('last_name', 'like', '%' . $request->name . '%')
                ->orWhere('first_name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email') && $request->email != '') {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('gender') && $request->gender != '性別') {
            $query->where('gender', $request->gender);
        }

        if ($request->has('detail') && $request->detail != 'お問い合わせの種類') {
            $query->where('detail', $request->detail);
        }

        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();
        return Excel::download(new ContactsExport($contacts), 'contacts_' . now()->format('Ymd_His') . '.xlsx');
    }
}
