<?php

declare(strict_types=1);

namespace jwwisniewski\Jigsaw\Core\Traits;

use Illuminate\Support\Arr;

trait MultiLangSupport
{
    private function getLocale(): string
    {
        return request()->get('editLang', config('jigsaw.defaultClientLocale'));
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if ($value === null || $value === '' || ! in_array($key, $this->multiLang, true)) {
            return $value;
        }

        return Arr::get($value, $this->getLocale(), null);
    }

    public function setAttribute($key, $value)
    {
        if (! in_array($key, $this->multiLang, true)) {
            return parent::setAttribute($key, $value);
        }

        $allValues = parent::getAttribute($key);

        $allValues[$this->getLocale()] = $value;

        return parent::setAttribute($key, $allValues);
    }

    public function attributesToArray(): array
    {
        $attributes = parent::attributesToArray();

        if (empty($attributes)) {
            return $attributes;
        }

        foreach ($attributes as $key => $value) {
            if ($value === null || $value === '' || ! in_array($key, $this->multiLang, true)) {
                continue;
            }

            $attributes[$key] = Arr::get($value, $this->getLocale(), null);
        }

        return $attributes;
    }
}
