<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PlanForm extends Form
{
    public function buildForm()
    {
        $url = request()->route('plan');
        $this->add('name', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|min:3|max:100|unique:plans,name,{$url},url,deleted_at,NULL"
        ]);

        $this->add('description', Field::TEXT, [
            'label' => 'Descrição',
            'rules' => 'nullable|min:3|max:100'
        ]);

        $this->add('price', Field::NUMBER, [
            'label' => 'Preço',
            'rules' => 'required|numeric|min:0|max:999999'
        ]);
    }
}
