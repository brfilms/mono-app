<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Customer extends Model
{
    protected $table = "customers";
    public $timestamps = false;
    protected $fillable = ['name', 'phone', 'email', 'password', 'birthday', 'document', 'email_verified_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function document(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->formatCpf($value),
            set: fn (string $value) => preg_replace('/\D/', '', $value),
        );
    }

    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->formatPhone($value),
            set: fn (string $value) => preg_replace('/\D/', '', $value),
        );
    }

    private function formatCpf(string $value): string
    {
        if (strlen($value) !== 11) return $value;

        return sprintf(
            '%s.%s.%s-%s',
            substr($value, 0, 3),
            substr($value, 3, 3),
            substr($value, 6, 3),
            substr($value, 9, 2)
        );
    }

    private function formatPhone(string $value): string
    {
        $value = preg_replace('/\D/', '', $value);
        $length = strlen($value);

        if ($length === 11) {
            return sprintf(
                '(%s) %s-%s',
                substr($value, 0, 2),
                substr($value, 2, 5),
                substr($value, 7, 4)
            );
        }

        if ($length === 10) {
            return sprintf(
                '(%s) %s-%s',
                substr($value, 0, 2),
                substr($value, 2, 4),
                substr($value, 6, 4)
            );
        }

        return $value;
    }
}