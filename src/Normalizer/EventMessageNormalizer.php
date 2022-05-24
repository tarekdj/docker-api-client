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
class EventMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TestContainersPHP\\Docker\\ApiClient\\Model\\EventMessage';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TestContainersPHP\\Docker\\ApiClient\\Model\\EventMessage';
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
        $object = new \TestContainersPHP\Docker\ApiClient\Model\EventMessage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
            $object->setType($data['Type']);
        }
        elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('Action', $data) && $data['Action'] !== null) {
            $object->setAction($data['Action']);
        }
        elseif (\array_key_exists('Action', $data) && $data['Action'] === null) {
            $object->setAction(null);
        }
        if (\array_key_exists('Actor', $data) && $data['Actor'] !== null) {
            $object->setActor($this->denormalizer->denormalize($data['Actor'], 'TestContainersPHP\\Docker\\ApiClient\\Model\\EventActor', 'json', $context));
        }
        elseif (\array_key_exists('Actor', $data) && $data['Actor'] === null) {
            $object->setActor(null);
        }
        if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
            $object->setScope($data['scope']);
        }
        elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
            $object->setScope(null);
        }
        if (\array_key_exists('time', $data) && $data['time'] !== null) {
            $object->setTime($data['time']);
        }
        elseif (\array_key_exists('time', $data) && $data['time'] === null) {
            $object->setTime(null);
        }
        if (\array_key_exists('timeNano', $data) && $data['timeNano'] !== null) {
            $object->setTimeNano($data['timeNano']);
        }
        elseif (\array_key_exists('timeNano', $data) && $data['timeNano'] === null) {
            $object->setTimeNano(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }
        if (null !== $object->getAction()) {
            $data['Action'] = $object->getAction();
        }
        if (null !== $object->getActor()) {
            $data['Actor'] = $this->normalizer->normalize($object->getActor(), 'json', $context);
        }
        if (null !== $object->getScope()) {
            $data['scope'] = $object->getScope();
        }
        if (null !== $object->getTime()) {
            $data['time'] = $object->getTime();
        }
        if (null !== $object->getTimeNano()) {
            $data['timeNano'] = $object->getTimeNano();
        }
        return $data;
    }
}