<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    case SCHEDULED   = 'scheduled';
    case RESCHEDULED = 'rescheduled';
    case COMPLETED   = 'completed';
    case CANCELLED   = 'cancelled';

    public function label(): string
    {
        return static::getLabel($this);
    }

    public static function getLabel(self $status): string
    {
        return match ($status) {
            self::SCHEDULED   => 'Scheduled',
            self::RESCHEDULED => 'Rescheduled',
            self::COMPLETED   => 'Completed',
            self::CANCELLED   => 'Cancelled',
        };
    }
}