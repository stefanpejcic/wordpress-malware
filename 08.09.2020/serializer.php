<?php

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;

$visitor = new JsonSerializationVisitor(
    new SerializedNameAnnotationStrategy(
        new IdenticalPropertyNamingStrategy()
    )
);

$visitor->setOptions(JSON_UNESCAPED_SLASHES);

$serializer = SerializerBuilder::create()
    ->setSerializationVisitor('json', $visitor)
    ->build();
