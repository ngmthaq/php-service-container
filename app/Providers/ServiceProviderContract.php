<?php

namespace App\Providers;

interface  ServiceProviderContract
{
    /**
     * Run when provider is bootstrapping
     * 
     * @return void
     */
    public function boostrap(): void;
}
