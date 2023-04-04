<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StreetRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StreetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StreetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  //  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \App\Http\Controllers\Admin\Operations\ExportStreetOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Street::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/street');
        CRUD::setEntityNameStrings('street', 'streets');
    }

    function getFieldsData()
    {
        $this->crud->addColumn([
            'name' => 'image0',
            'label' => 'Image Feeling',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => 'auto',

        ]);

    }
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setOperationSetting('lineButtonsAsDropdown', true);
        $this->getFieldsData();
        // CRUD::column('name')->label('uuid');
        CRUD::column('latitude');
        CRUD::column('longitude');
        CRUD::column('user_id');
        $this->crud->enableExportButtons();

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StreetRequest::class);
        CRUD::field('image0')->type('text')->label('Image Feeling');
        CRUD::field('image')->type('text')->label('to change');
        CRUD::field('user_id');
        CRUD::field('name');
        CRUD::field('latitude');
        CRUD::field('longitude');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
