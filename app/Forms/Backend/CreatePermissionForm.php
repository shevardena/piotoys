<?php

namespace App\Forms\Backend;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class CreatePermissionForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('permissions.store'))
            ->method('POST')
            ->class('space-y-4');
    }

    public function fields(): array
    {
        return [
            Input::make('name')
                ->label('Name')
                ->rules('required', 'min:2', 'max:255')
                ->class('w-1/2')
                ->minLength(2)
                ->maxLength(255),
            Select::make('guard_name')
                ->label('Guard name')
                ->rules('required', 'min:2', 'max:255')
                ->class('w-1/2')
                ->options([
                    'admin' => 'admin',
                    'web' => 'web'
                ]),
            Submit::make()->label('Create'),
        ];
    }
}
