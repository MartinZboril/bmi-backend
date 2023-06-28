<?php

namespace App\Observers;

use App\Models\BodyMassIndex;

class BodyMassIndexObserver
{
    public function creating(BodyMassIndex $bodyMassIndex)
    {
        // We also add the owner automatically
        if (auth()->check()) {
            $bodyMassIndex->user_id = auth()->id();
        }

        $bodyMassIndex->index = $bodyMassIndex->weight / pow($bodyMassIndex->height/100, 2);
    }

    public function updating(BodyMassIndex $bodyMassIndex)
    {
        $bodyMassIndex->index = $bodyMassIndex->weight / pow($bodyMassIndex->height/100, 2);
    }
}
