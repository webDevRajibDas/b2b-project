<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait PdfUrlGenerator {
    public function generateHpdfUrl()
    {
        return url('/h.php?p=' . strtoupper(Str::random(8)));
    }
}
