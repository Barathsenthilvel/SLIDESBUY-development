<?php

namespace App\Helpers;

use App\Models\Storeconfiguration;
use App\Models\Currency;

class CurrencyHelper
{
    /**
     * Get the current currency symbol from store configuration
     *
     * @return string
     */
    public static function getCurrencySymbol()
    {
        $storeConfig = Storeconfiguration::where('status', '1')->orderBy('id', 'ASC')->first();

        if ($storeConfig && $storeConfig->default_currency) {
            $currency = Currency::find($storeConfig->default_currency);
            if ($currency) {
                return $currency->currency_symbol;
            }
        }

        // Default fallback to rupee symbol
        return '₹';
    }

    /**
     * Get the current currency object from store configuration
     *
     * @return Currency|null
     */
    public static function getCurrentCurrency()
    {
        $storeConfig = Storeconfiguration::where('status', '1')->orderBy('id', 'ASC')->first();

        if ($storeConfig && $storeConfig->default_currency) {
            return Currency::find($storeConfig->default_currency);
        }

        return null;
    }

    /**
     * Format price with current currency symbol
     *
     * @param float $price
     * @param int $decimals
     * @return string
     */
    public static function formatPrice($price, $decimals = 2)
    {
        return self::getCurrencySymbol() . number_format($price, $decimals);
    }
}

