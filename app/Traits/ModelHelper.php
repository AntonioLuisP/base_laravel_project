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

    //uppercase helper
    public function setUpperCaseItensModel($data)
    {
        if (is_null($this->itensUpperCase)) {
            return $data;
        }

        $itensUpperCase = $this->itensUpperCase;

        foreach ($itensUpperCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtoupper(mb_strtolower($data[$item]));
            }
        }

        return $data;
    }

    //lowercase helper
    public function setLowerCaseItensModel($data)
    {
        if (is_null($this->itensLowerCase)) {
            return $data;
        }

        $itensLowerCase = $this->itensLowerCase;

        foreach ($itensLowerCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtolower(mb_strtoupper($data[$item]));
            }
        }

        return $data;
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
