<?php

namespace App\Filament\Resources\RoomCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;

class RoomCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->label('Description')
                    ->columnSpanFull()
            ]);
    }
}
