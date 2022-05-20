<?php

namespace App\Traits;

use Carbon\Carbon;

trait ModelHelper
{
    //Text Helpers
    public function formatText($text, $max_text_size = 30)
    {
        if (strlen($text) > $MAX_TEXT_SIZE) {
            return substr($text, 0, $MAX_TEXT_SIZE) . '...';
        }
        return $text;
    }

    public function formatName($max_text_size = 30)
    {
        return $this->formatText($this->name, $max_text_size);
    }

    //Date Helpers
    public function parseTimestamp($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function createdAt()
    {
        return $this->parseTimestamp($this->created_at);
    }

    public function updatedAt()
    {
        return $this->parseTimestamp($this->updated_at);
    }

    public function deletedAt()
    {
        return $this->parseTimestamp($this->deleted_at);
    }

}
