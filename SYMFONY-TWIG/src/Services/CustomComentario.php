<?php

namespace App\Serializer;

use App\Entity\COMENTARIOS;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class CustomComentario implements ContextAwareNormalizerInterface
{
    public function normalize($object, string $format = null, array $context = [])
    {

        $respuestasData = [];

        // Obtener el comentario principal
        $comentarioPrincipal = $object->getComentariosComentarios();

        foreach ($object->getRespuestas() as $respuesta) {
            // Verificar si la respuesta actual es igual al comentario principal
            if ($respuesta === $comentarioPrincipal) {
                continue; // Omitir el comentario principal
            }

            // Construir la estructura de cada respuesta
            $respuestaData = [
                'id' => $respuesta->getId(),
                'contenido' => $respuesta->getContenido(),
                'usuario' => [
                    'nombre' => $respuesta->getUsuariosComentarios()->getNombre(),
                    'apellido' => $respuesta->getUsuariosComentarios()->getApellido(),
                ],
            ];

            $respuestasData[] = $respuestaData;
        }

        $Respuestas = [
            'Respuestas' => $respuestasData,
        ];

        return $Respuestas;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof COMENTARIOS;
    }
}