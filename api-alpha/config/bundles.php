<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],
    lepiaf\SapientBundle\SapientBundle::class => ['prod', 'dev' => true],
];
