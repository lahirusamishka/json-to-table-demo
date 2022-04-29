<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Project;
use Livewire\Component;

class Home extends Component
{
    public $headers = ['Name', 'products', 'Created at', 'QRT', 'Status'];
    public $name;
    public $projects = [];
    public $searchText;

    public function __construct()
    {

        // $data = Project::findOrFail(1);
        // foreach ($data->comments as $key => $value) {
        //     # code...
        //     dd($value->replies[0]['replay']);
        // }

                // $data = Project::findOrFail(1);
        // foreach ($data->projectStatuses as $key => $value) {
            # code...
            // dd($data->projectStatuses);
        // }

        // $data = Comment::findOrFail(1);
        // dd($data->replies[0]['replay']);

        // $gigsData = Project::where('user_id', 1)->get();
        // foreach ($gigsData as $value) {
        //     array_push($this->gigs,$value->getAttributes());
        // }
    }

    public function doSomething()
    {
        dd(2);
    }

    public function like()
    {
        dd(11);
    }

    public function render()
    {
        return view('livewire.home');
    }
}
