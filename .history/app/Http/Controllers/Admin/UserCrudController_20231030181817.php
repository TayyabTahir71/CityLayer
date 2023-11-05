<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Mail\AboMail;
use App\Models\Infosperso;
use Illuminate\Support\Facades\Mail;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \App\Http\Controllers\Admin\Operations\EmailOperation;
    
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    function getFieldsData()
    {
        $this->crud->addColumn([
            'label' => 'Image URL',
            'type' => 'text',
            'name' => 'avatar',
            'prefix' => asset('storage/uploads/avatar').'/',

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
        CRUD::column('id')->label('User ID');
        CRUD::column('name')->label('User name');
        CRUD::column('email');

        CRUD::column('infosperso.age')->label('Age')->type('text');

        CRUD::column('infosperso.gender')->label('Gender')->type('text');
        CRUD::column('infosperso.profession')->label('Education')->type('text');
        CRUD::column('preferences')->label('Tags')->type('text');
        CRUD::column('TotalPlacesMapped')->label('Number of place')->type('text');
        CRUD::column('TotalObservationMapped')->label('Number of observation')->type('text');
        CRUD::column('score')->label('Level')->type('text');

        // Badges list names
        // Badges list url
        // Signup Date

       
        
        //get score from infosperso class where user_id = id

 
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
        $this->crud->setValidation([
            'name' => 'required|min:2',
        ]);
        CRUD::field('image')->label('avatar');
        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('password');
        $this->crud->addField([   // select_from_array
            'name'        => 'role',
            'label'       => "role",
            'type'        => 'select_from_array',
            'options'     => [
                'admin' => 'admin',
                'user' => 'user',
            ]]);
            CRUD::field('score')->type('number');
              
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
        $this->crud->setValidation([
            'name' => 'required|min:2',
        ]);
        CRUD::field('image')->label('avatar');
        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('score')->type('number');
        $this->crud->addField([   // select_from_array
            'name'        => 'role',
            'label'       => "role",
            'type'        => 'select_from_array',
            'options'     => [
                'admin' => 'admin',
                'user' => 'user',
            ]]);
    }
}
