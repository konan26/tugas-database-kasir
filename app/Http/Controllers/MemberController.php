<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'diskon' => 'required|integer|min:0|max:100',
        ]);

        Member::create($request->all());

        return redirect()->route('admin.members.index')
            ->with('success', 'Member berhasil ditambahkan');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'diskon' => 'required|integer|min:0|max:100',
        ]);

        $member->update($request->all());

        return redirect()->route('admin.members.index')
            ->with('success', 'Member berhasil diperbarui');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('admin.members.index')
            ->with('success', 'Member berhasil dihapus');
    }
}
