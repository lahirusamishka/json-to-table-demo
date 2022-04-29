<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($request){
        return view('livewire.project-detail');
    }
    public function store($request){
        dd(2);
    }
    public function delete($request){
        dd(3);
    }
    public function update($request){
        dd(4);
    }
}
