<?php

namespace App\Filament\Ujian\Auth;

use Filament\Auth\Pages\Login;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Validation\ValidationException;

class StudentLogin extends Login
{
    /**
     * Ganti form login bawaan (email + password) menjadi NISN + password.
     *
     * Akun siswa disimpan di tabel "users" (dibuat otomatis lewat form
     * Siswa di panel admin), dengan kolom "nisn" sebagai identitas login,
     * bukan tabel "students" terpisah.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNisnFormComponent(),
                $this->getPasswordFormComponent(),
            ]);
    }

    protected function getNisnFormComponent(): Component
    {
        return TextInput::make('nisn')
            ->label('NISN')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['inputmode' => 'numeric']);
    }

    /**
     * Kolom yang dipakai untuk mencari & memvalidasi akun saat login
     * adalah "nisn" (bukan "email" seperti bawaan Filament).
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'nisn' => $data['nisn'],
            'password' => $data['password'],
        ];
    }

    /**
     * Pesan error validasi default dari Filament merujuk ke field "email"
     * (data.email). Karena form ini pakai "nisn", pesan gagal login juga
     * perlu diarahkan ke field "nisn" supaya muncul di tempat yang tepat.
     */
    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.nisn' => __('filament-panels::auth/pages/login.messages.failed'),
        ]);
    }
}
