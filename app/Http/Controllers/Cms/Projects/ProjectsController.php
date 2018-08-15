<?php

namespace App\Http\Controllers\Cms\Projects;

use Illuminate\Http\Request;

use App\Models\Project as PageModel;

use App\Http\Controllers\Cms\BaseController;

use View;

use File;

use App\Models\Cms\SearchIndex;

class ProjectsController extends BaseController
{
    public function __construct(PageModel $model)
    {
        $this->middleware('auth');
        $this->pageUrl = 'projects';
        $this->pageName = 'Project';
        $this->pageItem = 'Project';
        $this->urlColumn = 'title_tr';
        $this->hasUrl=false;
        $this->hasPublish=true;
        $this->model = $model;
        $this->fields = $model::$fields;
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

    public function sort()
    {
        checkPermissionFor('edit_content');
        $records = PageModel::all();
        return view('cms.'.$this->pageUrl.'.sort', compact('records'));
    }

    /**
     * Reorder records
     */
    public function sortRecords(){
        parent::handleSort($this->model);
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
        $records=PageModel::orderBy('position')->get();
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
        checkPermissionFor('create_content');
        return view('cms.'.$this->pageUrl.'.create');
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
        checkPermissionFor('create_content');
        $this->validate($request, PageModel::$rules);
        $record = new PageModel;

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
       
        $record->position=10;
        $record->save();
        SearchIndex::create([
            "keyword" => $record->{$this->urlColumn},
            "folder" => $this->pageUrl,
            "key" => $record->id
        ]);

        session()->flash('success', 'Yeni '.$this->pageItem.' oluşturuldu.');
        return redirect()->route('cms.'.$this->pageUrl.'.edit', ['record' => $record->id]);
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
