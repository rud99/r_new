<?php

namespace App\Http\Controllers;

use App\Services\ImageServices;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $images;

    public function __construct(ImageServices $imageServices)
    {
        $this->images = $imageServices;
    }

    public function index()
    {
        $images = $this->images->all();
        return view('welcome', ['imagesInView' => $images]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $filename = $request->file('image');
        $title = $request->input('title');
        $this->images->add($filename, $title);

        return redirect('/');
    }

    public function show($id)
    {
        $myImage = $this->images->one($id);
        $this->images->updateViews($id);

        return view('show', ['imageInView' => $myImage]);
    }

    public function edit($id)
    {
        $image = $this->images->one($id);
        return view('edit', ['imageInView' => $image]);
    }

    public function update(Request $request, $id)
    {
        $this->images->update($id, $request);

        return redirect('/');
    }

    public function delete($id)
    {
        $this->images->delete($id);

        return redirect('/');
    }
}
