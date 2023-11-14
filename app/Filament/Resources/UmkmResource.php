<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Filament\Resources\UmkmResource\RelationManagers;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_usaha')->required(),
                Select::make('pemilik_umkm_id')
                ->required()
                ->relationship('pemilik_umkm','nama'),
                Select::make('jenis')
                ->required()
                ->options([
                    'Perdagangan' => 'Perdagangan',
                    'Jasa' => 'Jasa',
                    'Industri Kreatif' => 'Industri Kreatif'
                ]),
                MarkdownEditor::make('alamat')->required(),
                TextInput::make('no_telpon')->required(),
                TextInput::make('media_promosi')
                ->required()
                ->placeholder('Nama instagram Anda (menggunakan @)'),
                TextInput::make('produk_unggulan')->required(),
                FileUpload::make('gambar')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_usaha'),
                TextColumn::make('pemilik_umkm.nama'),
                TextColumn::make('jenis'),
                TextColumn::make('alamat'),
                TextColumn::make('no_telpon'),
                TextColumn::make('media_promosi'),
                TextColumn::make('produk_unggulan'),
                ImageColumn::make('gambar')
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
            'index' => Pages\ListUmkms::route('/'),
            // 'create' => Pages\CreateUmkm::route('/create'),
            // 'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }    
}
