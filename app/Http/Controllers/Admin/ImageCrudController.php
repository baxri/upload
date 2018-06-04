<?php

namespace App\Http\Controllers\Admin;

use App\Upload;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImageRequest as StoreRequest;
use App\Http\Requests\ImageRequest as UpdateRequest;

class ImageCrudController extends CrudController
{
    public function setup()
    {
        $parent_id = Request()->parent_id;

        $upload = Upload::find($parent_id);

        $this->crud->setModel(Upload::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/upload/' . $parent_id . '/images');
        $this->crud->setEntityNameStrings('image', 'images');

        $this->crud->addColumn([
            'name' => 'filename', // The db column name
            'label' => "IMAGE", // Table column heading
            'type' => 'image',
            'prefix' => 'uploads/'.$upload->bundle.'/',
            // optional width/height if 25px is not ok with you
             'height' => '50px',
             'width' => '50px',
        ]);

        $this->crud->addColumn([
            'label' => 'ID',
            'name' => 'id',
//            'type' => 'model_function',
//            'function_name' => 'getAmountView',
        ]);

        $this->crud->addColumn([
            'label' => 'BUNDLE',
            'name' => 'bundle',
//            'type' => 'model_function',
//            'function_name' => 'getAmountView',
        ]);



        $this->crud->addColumn([
            'label' => 'DEVICE',
            'name' => 'device',
//            'type' => 'model_function',
//            'function_name' => 'getAmountView',
        ]);

        $this->crud->addColumn([
            'label' => 'UPLOADED AT',
            'name' => 'created_at',
//            'type' => 'model_function',
//            'function_name' => 'getAmountView',
        ]);

        $this->crud->addClause('where', 'parent_id', $parent_id);

        $this->crud->removeButton('create');
        $this->crud->removeButton('update');
        $this->crud->removeButton('delete');

        $this->crud->enableAjaxTable();
    }

    public function index()
    {
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst($this->crud->entity_name_plural);

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package

        return view($this->crud->getListView(), $this->data);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
