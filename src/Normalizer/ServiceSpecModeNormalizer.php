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
class ServiceSpecModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecMode';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecMode';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\ServiceSpecMode();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Replicated', $data) && $data['Replicated'] !== null) {
            $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecModeReplicated', 'json', $context));
        }
        elseif (\array_key_exists('Replicated', $data) && $data['Replicated'] === null) {
            $object->setReplicated(null);
        }
        if (\array_key_exists('Global', $data) && $data['Global'] !== null) {
            $object->setGlobal($data['Global']);
        }
        elseif (\array_key_exists('Global', $data) && $data['Global'] === null) {
            $object->setGlobal(null);
        }
        if (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] !== null) {
            $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecModeReplicatedJob', 'json', $context));
        }
        elseif (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] === null) {
            $object->setReplicatedJob(null);
        }
        if (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] !== null) {
            $object->setGlobalJob($data['GlobalJob']);
        }
        elseif (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] === null) {
            $object->setGlobalJob(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getReplicated()) {
            $data['Replicated'] = $this->normalizer->normalize($object->getReplicated(), 'json', $context);
        }
        if (null !== $object->getGlobal()) {
            $data['Global'] = $object->getGlobal();
        }
        if (null !== $object->getReplicatedJob()) {
            $data['ReplicatedJob'] = $this->normalizer->normalize($object->getReplicatedJob(), 'json', $context);
        }
        if (null !== $object->getGlobalJob()) {
            $data['GlobalJob'] = $object->getGlobalJob();
        }
        return $data;
    }
}