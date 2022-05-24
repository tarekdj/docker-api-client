<?php

namespace TestContainersPHP\Docker\ApiClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use TestContainersPHP\Docker\ApiClient\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class PortBindingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TestContainersPHP\\Docker\\ApiClient\\Model\\PortBinding';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TestContainersPHP\\Docker\\ApiClient\\Model\\PortBinding';
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
        $object = new \TestContainersPHP\Docker\ApiClient\Model\PortBinding();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('HostIp', $data) && $data['HostIp'] !== null) {
            $object->setHostIp($data['HostIp']);
        }
        elseif (\array_key_exists('HostIp', $data) && $data['HostIp'] === null) {
            $object->setHostIp(null);
        }
        if (\array_key_exists('HostPort', $data) && $data['HostPort'] !== null) {
            $object->setHostPort($data['HostPort']);
        }
        elseif (\array_key_exists('HostPort', $data) && $data['HostPort'] === null) {
            $object->setHostPort(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getHostIp()) {
            $data['HostIp'] = $object->getHostIp();
        }
        if (null !== $object->getHostPort()) {
            $data['HostPort'] = $object->getHostPort();
        }
        return $data;
    }
}