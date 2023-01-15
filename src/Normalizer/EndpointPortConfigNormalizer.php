<?php

namespace Tarekdj\Docker\ApiClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\CheckArray;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class EndpointPortConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointPortConfig';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointPortConfig';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\EndpointPortConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('Protocol', $data) && $data['Protocol'] !== null) {
            $object->setProtocol($data['Protocol']);
        }
        elseif (\array_key_exists('Protocol', $data) && $data['Protocol'] === null) {
            $object->setProtocol(null);
        }
        if (\array_key_exists('TargetPort', $data) && $data['TargetPort'] !== null) {
            $object->setTargetPort($data['TargetPort']);
        }
        elseif (\array_key_exists('TargetPort', $data) && $data['TargetPort'] === null) {
            $object->setTargetPort(null);
        }
        if (\array_key_exists('PublishedPort', $data) && $data['PublishedPort'] !== null) {
            $object->setPublishedPort($data['PublishedPort']);
        }
        elseif (\array_key_exists('PublishedPort', $data) && $data['PublishedPort'] === null) {
            $object->setPublishedPort(null);
        }
        if (\array_key_exists('PublishMode', $data) && $data['PublishMode'] !== null) {
            $object->setPublishMode($data['PublishMode']);
        }
        elseif (\array_key_exists('PublishMode', $data) && $data['PublishMode'] === null) {
            $object->setPublishMode(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('protocol') && null !== $object->getProtocol()) {
            $data['Protocol'] = $object->getProtocol();
        }
        if ($object->isInitialized('targetPort') && null !== $object->getTargetPort()) {
            $data['TargetPort'] = $object->getTargetPort();
        }
        if ($object->isInitialized('publishedPort') && null !== $object->getPublishedPort()) {
            $data['PublishedPort'] = $object->getPublishedPort();
        }
        if ($object->isInitialized('publishMode') && null !== $object->getPublishMode()) {
            $data['PublishMode'] = $object->getPublishMode();
        }
        return $data;
    }
}