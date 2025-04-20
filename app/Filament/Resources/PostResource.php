<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\BadgeColumn;



class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            RichEditor::make('content')
                ->required(),

            TextInput::make('social_link')
                ->label('Enlace externo')
                ->url()
                ->maxLength(255)
                ->nullable(),

            FileUpload::make('featured_image')
                ->image()
                ->directory('posts')
                ->nullable(),

            Select::make('status')
                ->options([
                    'draft' => 'Borrador',
                    'scheduled' => 'Programado',
                    'published' => 'Publicado',
                ])
                ->required(),

            DatePicker::make('publication_date')
                ->label('Fecha de Publicación')
                ->nullable(),

            Select::make('categories')
                ->relationship('categories', 'name')
                ->multiple()
                ->searchable(),

            Select::make('tags')
                ->relationship('tags', 'name')
                ->multiple()
                ->searchable(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')->sortable()->searchable(),

            BadgeColumn::make('status')
                ->colors([
                    'draft' => 'gray',
                    'scheduled' => 'yellow',
                    'published' => 'green',
                ]),

            ImageColumn::make('featured_image')->rounded(),

            TextColumn::make('categories.name')
                ->label('Categorías')
                ->sortable()
                ->searchable(),

            TextColumn::make('tags.name')
                ->label('Etiquetas')
                ->sortable()
                ->searchable(),

            TextColumn::make('publication_date')->dateTime(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
