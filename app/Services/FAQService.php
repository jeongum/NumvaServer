<?php

namespace App\Services;

/**
 * Class FAQService
 * @package App\Services
 */

use App\Models\FAQ;

class FAQService
{
    public function getAll(){
        $faqs = FAQ::all();
        return $faqs;
    }
    public function get($id){
        $faq = FAQ::find($id);
        return $faq;
    }
}
