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
class PluginConfigInterfaceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigInterface';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigInterface';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\PluginConfigInterface();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Types', $data) && $data['Types'] !== null) {
            $values = array();
            foreach ($data['Types'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Tarekdj\\Docker\\ApiClient\\Model\\PluginInterfaceType', 'json', $context);
            }
            $object->setTypes($values);
        }
        elseif (\array_key_exists('Types', $data) && $data['Types'] === null) {
            $object->setTypes(null);
        }
        if (\array_key_exists('Socket', $data) && $data['Socket'] !== null) {
            $object->setSocket($data['Socket']);
        }
        elseif (\array_key_exists('Socket', $data) && $data['Socket'] === null) {
            $object->setSocket(null);
        }
        if (\array_key_exists('ProtocolScheme', $data) && $data['ProtocolScheme'] !== null) {
            $object->setProtocolScheme($data['ProtocolScheme']);
        }
        elseif (\array_key_exists('ProtocolScheme', $data) && $data['ProtocolScheme'] === null) {
            $object->setProtocolScheme(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $values = array();
        foreach ($object->getTypes() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $data['Types'] = $values;
        $data['Socket'] = $object->getSocket();
        if (null !== $object->getProtocolScheme()) {
            $data['ProtocolScheme'] = $object->getProtocolScheme();
        }
        return $data;
    }
}