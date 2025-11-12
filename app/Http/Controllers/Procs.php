<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pay;
use App\Models\Role;
use App\Models\Genre;

class Procs extends Controller
{
    public function creatPay():View
    {
        return view('pay.create');
    }
    public function editPay($pay):View
    {
        $payModel = Pay::findOrFail($pay);
        return view('pay.edit', compact('payModel'));
    }

    public function MajPay(Request $request, $pay)
    {
        $payModel = Pay::findOrFail($pay);
        $payModel->update($request->only(['code','nom', 'commentaire']));
        return redirect()->route('pays')->with('success', 'Pays mis à jour avec succès');
    }

    public function SuppPay($pay)
    {
        $payModel = Pay::findOrFail($pay);
        $payModel->delete();
        return redirect()->route('pays')->with('success', 'Pays supprimé avec succès');
    }
    public function editRole($role):View
    {
        $roleModel = Role::findOrFail($role);
        return view('role.edit', compact('roleModel'));
    }
    public function MajRole(Request $request, $role)
    {
        $roleModel = Role::findOrFail($role);
        $roleModel->update($request->only(['code','nom', 'commentaire']));
        return redirect()->route('roles')->with('success', 'Rôle mis à jour avec succès');
    }
    public function SuppRole($role)
    {
        $roleModel = Role::findOrFail($role);
        $roleModel->delete();
        return redirect()->route('roles')->with('success', 'Rôle supprimé avec succès');
    }
    public function editGenre($genre):View
    {
        $genreModel = Genre::findOrFail($genre);
        return view('genre.edit', compact('genreModel'));
    }
    public function MajGenre(Request $request, $genre)
    {
        $genreModel =Genre::findOrFail($genre);
        $genreModel->update($request->only(['code','nom', 'commentaire']));
        return redirect()->route('genre')->with('success', 'Genre mis à jour avec succès');
    }
    public function SuppGenre($genre)
    {
        $genreModel =Genre::findOrFail($genre);
        $genreModel->delete();
        return redirect()->route('genre')->with('success', 'Genre supprimé avec succès');   
    }
}