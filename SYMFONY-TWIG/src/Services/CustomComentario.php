<?php

namespace App\Serializer;

use App\Entity\COMENTARIOS;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class CustomComentario implements ContextAwareNormalizerInterface
{
    public function normalize($object, string $format = null, array $context = [])
    {
       
        $data = [
            "contenido" => $object->getContenido(),
            "user" => $object->getUserId(),
            "fecha" => $object->getCreatedAt()
        ];

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof COMENTARIOS;
    }
}