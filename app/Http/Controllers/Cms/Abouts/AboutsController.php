<?php

namespace App\Http\Controllers\Cms\Abouts;

use Illuminate\Http\Request;

use App\Http\Controllers\Cms\BaseController;

use App\Models\About as PageModel;

use View;

use File;

use App\Models\Cms\SearchIndex;

class AboutsController extends BaseController
{

    public function __construct(PageModel $model)
    {
        $this->middleware('auth');
        $this->pageUrl = 'abouts';
        $this->pageName = 'Hakkında';
        $this->pageItem = 'Hakkında';
        $this->urlColumn = 'title_tr';
        $this->model = $model;
        $this->fields = $model::$fields;
        $this->hasPublish=false;
        $this->hasUrl=false;
        $this->imageFields = $model::$imageFields;
        $this->docFields = $model::$docFields;
        $this->dateFields = $model::$dateFields;
        $this->urlFields = $model::$urlFields;
        $this->booleanFields = $model::$booleanFields;
        View::share(array(
            'pageUrl' => $this->pageUrl,
            'pageName' => $this->pageName,
            'pageItem' => $this->pageItem,
        ));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        checkPermissionFor('edit_content');
        $records=PageModel::all();
        return view('cms.'.$this->pageUrl.'.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(PageModel $record)
    {
        //
        checkPermissionFor('edit_content');
        
        return view('cms.'.$this->pageUrl.'.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, PageModel $record)
    {
        //

        checkPermissionFor('edit_content');
        $this->validate($request, PageModel::$updaterules);
        $searchIndex = SearchIndex::where('keyword', $record->{$this->urlColumn})->first();
        if($searchIndex){ $searchIndex->delete(); }
        if($this->hasPublish){
            (($request->publish) ? $record->publish = true : $record->publish = false);
        }
        if($this->hasUrl){
            foreach($this->urlFields as $urlField){
                $record->{$urlField['name']} = parent::seo_friendly_url($request->{$urlField['map']});
            }
        }
        /** Regular Inputs **/
        foreach($this->fields as $field){
            $record->$field = $request->get($field);
        }

        /** Date Inputs **/
        if($this->dateFields){
            foreach($this->dateFields as $dateField){
                parent::handleDateInput($record, $request->get($dateField), $dateField);
            }
        }
        /** Boolean Inputs **/
        if($this->booleanFields){
            foreach($this->booleanFields as $booleanField){
                (($request->get($booleanField)) ? $record->$booleanField = true : $record->$booleanField = false);
            }
        }

        /** File Inputs **/
        if($this->docFields){
            foreach($this->docFields as $docField){
                parent::handleFileUpload($record, $this->urlColumn, $request->file($docField), $docField);
            }
        }

        /** Image Inputs **/
        if($this->imageFields){
            foreach($this->imageFields as $imageField){
                parent::handleImageCropUpload(
                    $record,
                    $imageField['naming'],
                    $imageField['diff'],
                    $request->get($imageField['name']),
                    $imageField['name'],
                    $imageField['width'],
                    $imageField['height'],

                    round($request->get($imageField['name'].'_w')), round($request->get($imageField['name'].'_h')), round($request->get($imageField['name'].'_x')), round($request->get($imageField['name'].'_y'))
                );
            }
        }
        $record->save();
        SearchIndex::create([
            "keyword" => $record->{$this->urlColumn},
            "folder" => $this->pageUrl,
            "key" => $record->id
        ]);
        session()->flash('success', $this->pageItem.' güncellendi.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(PageModel $record)
    {

        //
        checkPermissionFor('delete_content');
        if(parent::handleDestroy($this->model, $record, $this->urlColumn, true, false)){

            session()->flash('success', $this->pageItem.' silindi.');
        }else{
            session()->flash('danger', 'Böyle bir kayıt yok.');
        }
        
        return redirect()->route('cms.'.$this->pageUrl.'.index');
    }

    public function deleteFile(Request $request, PageModel $record)
    {
        checkPermissionFor('delete_content');
        $field = $request->field;
        File::delete(public_path($record->$field ));
        $record->$field  = "";
        $record->save();
        session()->flash('success', 'Öğe silindi.');
        return redirect()->back();
    }
}
