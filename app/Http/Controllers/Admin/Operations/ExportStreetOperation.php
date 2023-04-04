<?php

namespace App\Http\Controllers\Admin\Operations;

use App\Models\Street;
use Illuminate\Support\Facades\Route;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait ExportStreetOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupExportRoutes($segment, $routeName, $controller)
    {
        Route::get($segment . '/export', [
            'as' => $routeName . '.export',
            'uses' => $controller . '@export',
            'operation' => 'export',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupExportDefaults()
    {
        CRUD::allowAccess('export');

        CRUD::operation('export', function () {
            CRUD::loadDefaultOperationSettingsFromConfig();
        });

        CRUD::operation('list', function () {
            CRUD::addButton('top', 'export', 'view', 'crud::buttons.export');
            // CRUD::addButton('line', 'export', 'view', 'crud::buttons.export');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
   
    public function export()
    {
        $data = Street::all()->toArray();

        $header_row = ['id', 'user_id', 'uuid', 'feeling text', 'feeling image', 'what to change', 'image what to change', 'latitude', 'longitude', 'tags', 'opinions', 'feeling score', 'change score', 'confort score', 'enjoyable score', 'protection score', 'place to rest', 'to rest text', 'movement score', 'movement text', 'activities score', 'activities text', 'orientation score', 'orientation text', 'weather score', 'weather text', 'facilities score', 'facilities text', 'noise score', 'noise text', 'beauty score', 'beauty text', 'seasonality score', 'seasonality text', 'plants score', 'plants text', 'talking score', 'talking text' , 'sunlight score', 'sunlight text', 'shade score', 'shade text', 'interesting score', 'interesting text', 'protection score', 'protection text', 'polluants score', 'polluants text', 'night score', 'night text', 'hazard score', 'dangerous score', 'dangerous text', 'protection score', 'protection text', 'space usage', 'time spending', 'spend time score', 'spend time text', 'meeting score', 'meeting text', 'events score', 'events text', 'multifunctional score', 'multifunctional text', 'usage details', 'likes', 'dislikes', 'starred', 'bof', 'weird', 'ohh', 'wtf']; // Add header row data here

        array_unshift($data, $header_row); // Add header row to beginning of data array

        $handle = fopen('Street.csv', 'w');

        collect($data)->each(fn($row) => fputcsv($handle, $row));

        fclose($handle);

        return response()->download('Street.csv');
        return redirect()->back();
    }
}
