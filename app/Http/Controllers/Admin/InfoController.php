<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoRequest;
use App\Models\Info;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
  public function index() {
    $info = Info::where('id', 1)->first();
    return view('back.about.info.index', compact('info'));
  }

  public function update(InfoRequest $request, Info $info){
    $info_data = $request->validated();
    Info::where('id', 1)->update($info_data);
    return redirect(route('admin.info.index'));
  }
}
