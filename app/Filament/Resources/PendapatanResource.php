<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendapatanResource\Pages;
use App\Filament\Resources\PendapatanResource\RelationManagers;
use App\Models\Pendapatan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendapatanResource extends Resource
{
    protected static ?string $model = Pendapatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('umkm_id')
                ->required()
                ->relationship('umkm','nama_usaha'),
                TextInput::make('pendapatan')
                ->required()
                ->numeric()
                ->placeholder('Rata-rata dalam perbulan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('umkm.nama_usaha'),
                TextColumn::make('pendapatan')
                ->numeric(
                    decimalPlaces: 0,
                    decimalSeparator: '.',
                    thousandsSeparator: ',',
                )
                ->description('(rata-rata perbulan)'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPendapatans::route('/'),
            // 'create' => Pages\CreatePendapatan::route('/create'),
            // 'edit' => Pages\EditPendapatan::route('/{record}/edit'),
        ];
    }    
}
