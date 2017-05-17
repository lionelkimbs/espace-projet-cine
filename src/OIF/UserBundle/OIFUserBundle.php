<?php

namespace OIF\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OIFUserBundle extends Bundle{
    public function getParent(){
        return 'FOSUserBundle';
    }
}

