<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainingRequest;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index()
    {
      $trainings_en = Training::orderBy('created_at', 'desc')->where('language', 'en')->paginate(6, ['*'], 'en');
      $trainings_pa = Training::orderBy('created_at', 'desc')->where('language', 'ps')->paginate(6, ['*'], 'ps');
      $trainings_fa = Training::orderBy('created_at', 'desc')->where('language', 'fa')->paginate(6, ['*'], 'fa');
      return view('back.training.index', compact(['trainings_en', 'trainings_pa', 'trainings_fa']));
    }

    public function create()
    {
      return view('back.training.create');
    }
    
    public function store(TrainingRequest $request)
    {
      $training_data = $request->validated();
      $imagePath = $request->file('image')->store('public/images/training');
      $image = basename($imagePath);
      $training_data['image'] = $image;
      Training::create($training_data);
      return redirect(route('admin.training.index'));
    }

    public function edit(Training $training)
    {
      return view('back.training.edit', compact('training'));
    }

    public function update(TrainingRequest $request, Training $training)
    {
      $training_data = $request->validated();
      if ($request->hasFile('image')){
        $preImage = Training::find($training['id'])['image'];
        Storage::delete('public/images/training/' . $preImage);
        $imagePath = $request->file('image')->store('public/images/training');
        $image = basename($imagePath);
        $training_data['image'] = $image;
      }
      Training::where('id', $training['id'])->update($training_data);
      return redirect(route('admin.training.index'));
    }

    public function destroy(Training $training)
    {
      $preImage = Training::find($training['id'])['image'];
      Storage::delete('public/images/training/' . $preImage);
      $training->delete();
      return back();
    }
}
