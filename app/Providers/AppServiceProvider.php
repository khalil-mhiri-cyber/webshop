<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Money\Money;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Factories\CartFactory;
use App\Actions\Webshop\MigrateSessionCart;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

public function boot(): void
{
    Model::unguard();
    Cashier::calculateTaxes();
    Fortify::authenticateUsing(function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        (new MigrateSessionCart)->migrate(CartFactory::make(), $user?->cart ?: $user->cart()->create());

        return $user;
    }
});
    $currencies = new ISOCurrencies();
    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
    $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);
    Blade::stringable(function (Money $value) use ($moneyFormatter): string {
        return $moneyFormatter->format($value);
    });
}

}
