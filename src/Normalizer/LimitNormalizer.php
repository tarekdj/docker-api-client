<?php

namespace Tarekdj\Docker\ApiClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class LimitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\Limit';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\Limit';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Tarekdj\Docker\ApiClient\Model\Limit();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NanoCPUs', $data) && $data['NanoCPUs'] !== null) {
            $object->setNanoCPUs($data['NanoCPUs']);
        }
        elseif (\array_key_exists('NanoCPUs', $data) && $data['NanoCPUs'] === null) {
            $object->setNanoCPUs(null);
        }
        if (\array_key_exists('MemoryBytes', $data) && $data['MemoryBytes'] !== null) {
            $object->setMemoryBytes($data['MemoryBytes']);
        }
        elseif (\array_key_exists('MemoryBytes', $data) && $data['MemoryBytes'] === null) {
            $object->setMemoryBytes(null);
        }
        if (\array_key_exists('Pids', $data) && $data['Pids'] !== null) {
            $object->setPids($data['Pids']);
        }
        elseif (\array_key_exists('Pids', $data) && $data['Pids'] === null) {
            $object->setPids(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getNanoCPUs()) {
            $data['NanoCPUs'] = $object->getNanoCPUs();
        }
        if (null !== $object->getMemoryBytes()) {
            $data['MemoryBytes'] = $object->getMemoryBytes();
        }
        if (null !== $object->getPids()) {
            $data['Pids'] = $object->getPids();
        }
        return $data;
    }
}