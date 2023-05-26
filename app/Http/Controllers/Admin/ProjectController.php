<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();

        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validation($request);

        $formData = $request->all();




        $newProject = new Project();

        if ($request->hasFile('thumb_preview')) {

            $path = Storage::put('post_images', $request->thumb_preview);

            $formData['thumb_preview'] = $path;
        }

        $newProject->fill($formData);


        $newProject->slug = Str::slug($formData['name'], '-');

        $newProject->save();

        if (array_key_exists('technologies', $formData)) {
            $newProject->technologies()->attach($formData['technologies']);
        }

        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function show(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.show', compact('project', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * 
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);
        dd($request);

        $formData = $request->all();

        if ($request->hasFile('thumb_preview')) {

            if ($project->thumb_preview) {

                Storage::delete($project->thumb_preview);
            }
            $path = Storage::put('post_images', $request->thumb_preview);

            $formData['thumb_preview'] = $path;
        }


        $project->update($formData);

        $project->save();

        if (array_key_exists('technologies', $formData)) {
            $project->technologies()->sync($formData['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
    private function validation($request)
    {

        $formData = $request->all();

        $validator = FacadesValidator::make($formData, [
            'name' => 'required',
            'thumb_preview' => 'nullable|image|max:4096',
            'description' => 'required',
            'link_repo' => 'required',
            'type_id' => 'nullable|exists:types,id',
        ], [
            'name.required' => 'Questo campo non può rimanere vuoto',
            'thumb_preview.max' => "La dimensione del file è troppo grande",
            'thumb_preview.image' => "Il file deve essere di tipo immagine",
            'description.required' => 'Questo campo non può rimanere vuoto',
            'link_repo.required' => 'Questo campo non può rimanere vuoto',
            'type_id.exists' => 'Il type deve essere presente nel nostro sito',

        ])->validate();

        return $validator;
    }
}
