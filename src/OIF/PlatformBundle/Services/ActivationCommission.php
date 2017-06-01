<?php

namespace OIF\PlatformBundle\Services;

class ActivationCommission{
    public function desactivate($commission){
        $em = $this->container->get('doctrine');
    }
}