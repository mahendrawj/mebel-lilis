<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Company;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $com = $request->get('c');
        $company = Company::where('name_company', 'LIKE', '%'.$com.'%')->paginate(5);
        return view('company.index', compact('company', 'com'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
            'name_company' => 'required|unique:companies',
            'photo' => 'mimes:jpeg,png|max:10240',
            'content_company' => 'required|max:100000']);
            $data = $request->only('name_company','content_company');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->savePhoto($request->file('photo'));
            }
            $company = Company::create($data);
           \Flash::success($company->name_company, $company->content_company . ' Company has been saved.');
            return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $this->validate($request, [
            'name_company' => 'required|unique:companies,name_company,'.$company->id,
            'photo' => 'mimes:jpeg,png|max:10240',
            'content_company' => 'required|string|max:100000|unique:companies,content_company']);
            $data = $request->only('name_company', 'content_company');
            
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->savePhoto($request->file('photo'));
                if ($company->photo !== '') $this->deletePhoto($company->photo);
            }
        $company->update($request->all());
        \Flash::success( ' Company updated.');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->photo !=='') $this->deletePhoto($company->photo);
        $company->delete();
        \Flash::success('Company deleted.');
        return redirect()->route('company.index');
    }
    /**
     * Save PHOTO
     */
    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
    /**
     * Delete given photo
     * @param  string $filename
     * @return bool
     */
    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }
}
