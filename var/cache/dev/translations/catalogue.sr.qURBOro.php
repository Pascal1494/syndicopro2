<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sr', array (
  'VerifyEmailBundle' => 
  array (
    '%count% year|%count% years' => '%count% godina|%count% godine',
    '%count% month|%count% months' => '%count% mesec|%count% meseca',
    '%count% day|%count% days' => '%count% dan|%count% dana',
    '%count% hour|%count% hours' => '%count% sat|%count% sata',
    '%count% minute|%count% minutes' => '%count% minut|%count% minuta',
  ),
));

$catalogue_fr = new MessageCatalogue('-fr', array (
));
$catalogue->addFallbackCatalogue($catalogue_fr);

return $catalogue;
