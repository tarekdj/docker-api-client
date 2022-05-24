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
class ServiceJobStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TestContainersPHP\\Docker\\ApiClient\\Model\\ServiceJobStatus';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TestContainersPHP\\Docker\\ApiClient\\Model\\ServiceJobStatus';
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
        $object = new \TestContainersPHP\Docker\ApiClient\Model\ServiceJobStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('JobIteration', $data) && $data['JobIteration'] !== null) {
            $object->setJobIteration($this->denormalizer->denormalize($data['JobIteration'], 'TestContainersPHP\\Docker\\ApiClient\\Model\\ObjectVersion', 'json', $context));
        }
        elseif (\array_key_exists('JobIteration', $data) && $data['JobIteration'] === null) {
            $object->setJobIteration(null);
        }
        if (\array_key_exists('LastExecution', $data) && $data['LastExecution'] !== null) {
            $object->setLastExecution($data['LastExecution']);
        }
        elseif (\array_key_exists('LastExecution', $data) && $data['LastExecution'] === null) {
            $object->setLastExecution(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getJobIteration()) {
            $data['JobIteration'] = $this->normalizer->normalize($object->getJobIteration(), 'json', $context);
        }
        if (null !== $object->getLastExecution()) {
            $data['LastExecution'] = $object->getLastExecution();
        }
        return $data;
    }
}