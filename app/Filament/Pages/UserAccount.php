<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccount extends Page
{
    protected static ?string $slug = 'my-account';

    protected static ?string $title = 'Mon compte';

    protected static string $view = 'filament.pages.user-account';

    public $data;

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()->schema([
                TextInput::make('first_name')
                    ->label('Prénom')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('last_name')
                    ->label('Nom')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255)
                    ->required(),
                FileUpload::make('avatar')
                    ->label('Avatar')
                    ->image()
                    ->maxSize(2048)
                    ->directory('user-avatar'),
                TextInput::make('password')
                    ->label('Nouveau mot de passe')
                    ->password()
                    ->dehydrateStateUsing(static fn (null|string $state): null|string => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(static fn (null|string $state): bool => filled($state))
                    ->confirmed()
                    ->maxLength(255),
                TextInput::make('password_confirmation')
                    ->label('Confirmation du nouveau mot de passe')
                    ->password()
                    ->dehydrateStateUsing(static fn (null|string $state): null|string => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(static fn (null|string $state): bool => filled($state))
                    ->maxLength(255),
            ])->columns(2),
        ];
    }

    public function mount()
    {
        $this->data = Auth::user();

        $this->form->fill([
            'first_name' => $this->data->first_name,
            'last_name' => $this->data->last_name,
            'email' => $this->data->email,
            'avatar' => $this->data->avatar,
        ]);
    }

    public function submit(): void
    {
        $state = $this->form->getState();

        $user = User::find(auth()->user()->id);

        $user->update($state);

        $this->notify('success', 'Enregistré');

        redirect()->route('filament.pages.dashboard');
    }
}
