<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoteResource\Pages;
use App\Filament\Resources\VoteResource\RelationManagers;
use App\Models\Vote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class VoteResource extends Resource
{
    protected static ?string $model = Vote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('post_id')
                ->relationship('post', 'title') // Relación con Post
                ->required()
                ->label('Post asociado'),
            Select::make('user_id')
                ->relationship('user', 'name') // Relación con User
                ->required()
                ->label('Usuario'),
            Select::make('type')
                ->options([
                    'like' => 'Me gusta',
                    'dislike' => 'No me gusta',
                ])
                ->required()
                ->label('Tipo de voto'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('post.title')->label('Post Asociado')->sortable(),
            TextColumn::make('user.name')->label('Usuario')->sortable(),
            TextColumn::make('type')->label('Voto')->sortable(),
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
            'index' => Pages\ListVotes::route('/'),
            'create' => Pages\CreateVote::route('/create'),
            'edit' => Pages\EditVote::route('/{record}/edit'),
        ];
    }
}
