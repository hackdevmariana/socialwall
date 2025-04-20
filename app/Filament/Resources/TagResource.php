<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Filament\Resources\TagResource\RelationManagers;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\BadgeColumn;


class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected $casts = [
        'is_category' => 'boolean',
    ];


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('Nombre'),

            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('Slug'),

            TextInput::make('description')->label('Descripción')->nullable(),

            Toggle::make('is_category')
                ->label('¿Es Categoría?')
                ->default(false),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('Nombre'),
                TextColumn::make('slug')->sortable()->searchable()->label('Slug'),
                TextColumn::make('description')->limit(50)->label('Descripción'),

                TextColumn::make('is_category')
                    ->label('Tipo')
                    ->badge()
                    ->colors([
                        'true' => 'green',
                        'false' => 'gray',
                    ])
                    ->formatStateUsing(fn($state) => $state ? 'Categoría' : 'Etiqueta'),
            ])
            ->filters([
                SelectFilter::make('is_category')
                    ->label('Filtrar por tipo')
                    ->options([
                        '1' => 'Categorías',
                        '0' => 'Etiquetas',
                    ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
