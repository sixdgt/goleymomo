<?php


namespace App\Http\Controllers\Sifaris\Nibedan;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

abstract class NibedanAbstractController extends Controller
{
    function set_values_in_fields($request,$model,$view)
    {

        $table_fields=Schema::getColumnListing($model->getTable());
        foreach ($table_fields as $table_field)
        {
            foreach ($view['form_sections'] as $form_section)
            {
                if(array_key_exists('cols',$form_section['flex-div']))
                {

                    foreach($form_section['flex-div']['cols'] as $col)
                    {
                        foreach ($col['rows'] as $row)
                        {
                            foreach ($row['fields'] as $field)
                            {
                                if($field['field_type']=='input' || $field['field_type']=='select'){
                                    if($table_field==$field['name'])
                                    {
                                        $model->$table_field=$request->$table_field;
                                    }
                                }
                            }
                        }
                    }


                }
                else
                {
                    foreach ($form_section['flex-div']['rows'] as $row)
                    {
                        foreach ($row['fields'] as $field)
                        {
                            if($field['field_type']=='input' || $field['field_type']=='select'){
                                if($table_field==$field['name'])
                                {
                                    $model->$table_field=$request->$table_field;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $model;
    }
}